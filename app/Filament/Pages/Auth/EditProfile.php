<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Components\Component;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Auth\EditProfile as BaseEditProfile;
use Illuminate\Validation\Rules\Password;

class EditProfile extends BaseEditProfile
{
    public static function getLabel(): string
    {
        return __('Profile');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('Profile Information'))
                    ->description(__('Update your account profile information and email address.'))
                    ->schema([
                        $this->getNameFormComponent(),
                        $this->getEmailFormComponent(),
                    ]),

                Section::make(__('Update Password'))
                    ->description(__('Ensure your account is using a long, random password to stay secure.'))
                    ->schema([
                        $this->getCurrentPasswordFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                    ]),
            ]);
    }

    protected function getCurrentPasswordFormComponent(): Component
    {
        return TextInput::make('current_password')
            ->label(__('Current Password'))
            ->password()
            ->revealable(filament()->arePasswordsRevealable())
            ->requiredWith('password')
            ->currentPassword()
            ->dehydrated(false);
    }

    protected function getPasswordFormComponent(): Component
    {
        return parent::getPasswordFormComponent()
            ->label(__('New Password'))
            ->rule(Password::default())
            ->requiredWith('current_password');
    }

    protected function getPasswordConfirmationFormComponent(): Component
    {
        return parent::getPasswordConfirmationFormComponent()
            ->label(__('Confirm New Password'));
    }
}
