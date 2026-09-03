<?php

namespace Tests\Feature;

use App\Filament\Pages\Auth\EditProfile;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use Tests\TestCase;

class AdminProfileAndPasswordRecoveryTest extends TestCase
{
    use RefreshDatabase;

    public function test_password_reset_request_page_renders_successfully(): void
    {
        $response = $this->get('/admin/password-reset/request');

        $response->assertStatus(200);
    }

    public function test_login_page_contains_forgot_password_link(): void
    {
        $response = $this->get('/admin/login');

        $response->assertStatus(200);
        $response->assertSee('/admin/password-reset/request');
    }

    public function test_user_can_request_password_reset_link(): void
    {
        $user = User::factory()->create([
            'email' => 'admin@carento.com',
        ]);

        Livewire::test(\Filament\Pages\Auth\PasswordReset\RequestPasswordReset::class)
            ->set('data.email', 'admin@carento.com')
            ->call('request')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('password_reset_tokens', [
            'email' => 'admin@carento.com',
        ]);
    }

    public function test_authenticated_admin_can_view_profile_page(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/admin/profile');

        $response->assertStatus(200);
    }

    public function test_admin_can_update_profile_information(): void
    {
        $user = User::factory()->create([
            'name' => 'Original Name',
            'email' => 'original@carento.com',
        ]);
        $this->actingAs($user);

        Livewire::test(EditProfile::class)
            ->set('data.name', 'Updated Dealership Admin')
            ->set('data.email', 'updated@carento.com')
            ->call('save')
            ->assertHasNoErrors();

        $user->refresh();
        $this->assertEquals('Updated Dealership Admin', $user->name);
        $this->assertEquals('updated@carento.com', $user->email);
    }

    public function test_admin_can_update_password_with_valid_current_password(): void
    {
        $user = User::factory()->create([
            'password' => Hash::make('OldPassword123!'),
        ]);
        $this->actingAs($user);

        Livewire::test(EditProfile::class)
            ->set('data.name', $user->name)
            ->set('data.email', $user->email)
            ->set('data.current_password', 'OldPassword123!')
            ->set('data.password', 'NewSecurePassword456!')
            ->set('data.passwordConfirmation', 'NewSecurePassword456!')
            ->call('save')
            ->assertHasNoErrors();

        $user->refresh();
        $this->assertTrue(Hash::check('NewSecurePassword456!', $user->password));
    }

    public function test_admin_cannot_update_password_with_incorrect_current_password(): void
    {
        $user = User::factory()->create([
            'password' => Hash::make('CorrectPassword123!'),
        ]);
        $this->actingAs($user);

        Livewire::test(EditProfile::class)
            ->set('data.name', $user->name)
            ->set('data.email', $user->email)
            ->set('data.current_password', 'WrongPassword!')
            ->set('data.password', 'NewPassword456!')
            ->set('data.passwordConfirmation', 'NewPassword456!')
            ->call('save')
            ->assertHasErrors(['data.current_password']);

        $user->refresh();
        $this->assertTrue(Hash::check('CorrectPassword123!', $user->password));
    }

    public function test_password_reset_success_notification_message_is_localized(): void
    {
        app()->setLocale('es');
        $this->assertNotEquals('passwords.reset', __('passwords.reset'));
        $this->assertEquals('¡Tu contraseña ha sido restablecida exitosamente!', __('passwords.reset'));

        app()->setLocale('en');
        $this->assertEquals('Your password has been reset.', __('passwords.reset'));
    }

    public function test_password_reset_email_is_localized_according_to_env(): void
    {
        app()->setLocale('es');
        $user = User::factory()->create();
        $notification = new \Filament\Notifications\Auth\ResetPassword('test-token');
        $notification->url = 'http://127.0.0.1:8000/admin/password-reset/reset?token=test-token';

        $mailEs = $notification->toMail($user);
        $this->assertEquals('Restablecer tu contraseña', $mailEs->subject);
        $this->assertEquals('Restablecer Contraseña', $mailEs->actionText);
        $this->assertStringContainsString('Estás recibiendo este correo electrónico', implode(' ', $mailEs->introLines));

        app()->setLocale('en');
        $mailEn = $notification->toMail($user);
        $this->assertEquals('Reset your password', $mailEn->subject);
        $this->assertEquals('Reset Password', $mailEn->actionText);
    }
}
