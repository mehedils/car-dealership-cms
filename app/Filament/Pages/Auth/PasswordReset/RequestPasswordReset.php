<?php

namespace App\Filament\Pages\Auth\PasswordReset;

use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use Exception;
use Filament\Facades\Filament;
use Filament\Models\Contracts\FilamentUser;
use Filament\Notifications\Auth\ResetPassword as ResetPasswordNotification;
use Filament\Notifications\Notification;
use Filament\Pages\Auth\PasswordReset\RequestPasswordReset as BaseRequestPasswordReset;
use Illuminate\Auth\Events\PasswordResetLinkSent;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Support\Facades\Password;

class RequestPasswordReset extends BaseRequestPasswordReset
{
    public function request(): void
    {
        try {
            $this->rateLimit(2);
        } catch (TooManyRequestsException $exception) {
            $this->getRateLimitedNotification($exception)?->send();

            return;
        }

        $data = $this->form->getState();

        try {
            $status = Password::broker(Filament::getAuthPasswordBroker())->sendResetLink(
                $this->getCredentialsFromFormData($data),
                function (CanResetPassword $user, string $token): void {
                    if (
                        ($user instanceof FilamentUser) &&
                        (! $user->canAccessPanel(Filament::getCurrentPanel()))
                    ) {
                        return;
                    }

                    if (! method_exists($user, 'notify')) {
                        $userClass = $user::class;

                        throw new Exception("Model [{$userClass}] does not have a [notify()] method.");
                    }

                    $notification = app(ResetPasswordNotification::class, ['token' => $token]);
                    $notification->url = Filament::getResetPasswordUrl($token, $user);

                    $user->notify($notification);

                    if (class_exists(PasswordResetLinkSent::class)) {
                        event(new PasswordResetLinkSent($user));
                    }
                },
            );
        } catch (\Throwable $e) {
            report($e);

            Notification::make()
                ->title(__('Error sending password reset email'))
                ->body(__('Could not connect to the mail server. Please check your SMTP configuration.'))
                ->danger()
                ->send();

            return;
        }

        if ($status !== Password::RESET_LINK_SENT) {
            $this->getFailureNotification($status)?->send();

            return;
        }

        $this->getSentNotification($status)?->send();

        $this->form->fill();
    }
}
