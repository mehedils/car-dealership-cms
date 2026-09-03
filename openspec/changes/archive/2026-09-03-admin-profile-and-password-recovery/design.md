## Context

The administrative panel currently lacks self-service profile updates and password recovery. Administrators cannot recover a forgotten password, nor can they update their email or change their password while logged in. The database already contains the standard `password_reset_tokens` table, and the `User` model implements `Notifiable`. Furthermore, the Mailpit SMTP service has been configured and tested for email delivery.

## Goals / Non-Goals

**Goals:**
- Enable email-based password recovery via Filament's native `->passwordReset()` on `AdminPanelProvider`.
- Provide a secure custom profile management page (`App\Filament\Pages\Auth\EditProfile`) registered via `->profile(...)`.
- Enforce **Current Password** verification whenever an authenticated user updates their password.
- Provide comprehensive Spanish localization for all profile, password recovery, validation, and notification strings.

**Non-Goals:**
- Public/customer frontend user registration (the website is a dealership showcase and lead generation system).
- Two-factor authentication (2FA) / WebAuthn (out of scope for this phase).

## Decisions

### Decision 1: Custom `EditProfile` Page with Current Password Verification
- **Rationale**: While Filament provides a basic profile page, its default behavior allows updating the password without confirming the old one. By creating `app/Filament/Pages/Auth/EditProfile.php` extending `Filament\Pages\Auth\EditProfile`, we can:
  - Keep the standard `getNameFormComponent()` and `getEmailFormComponent()`.
  - Add a `current_password` field that validates against the user's existing password hash via `current_password` rule.
  - Require `password` and `passwordConfirmation` fields only when `current_password` is provided.
  - Automatically hash and persist the new password using Laravel's password cast.
- **Alternatives considered**:
  - *Default Filament Profile*: Faster to enable, but lacks current password verification, presenting a security vulnerability on shared workstations.

### Decision 2: Filament Native Password Recovery (`->passwordReset()`)
- **Rationale**: Filament 3's `->passwordReset()` provides an integrated, fully accessible flow with two screens:
  1. `RequestPasswordReset`: Prompts for user email, generates token, dispatches notification via Mailpit SMTP.
  2. `ResetPassword`: Validates token and email, prompts for new password + confirmation, resets credentials.
- **Alternatives considered**:
  - *Custom standalone controllers/routes*: Unnecessary duplicate code; Filament's built-in reset integrates cleanly with the admin panel styling and security middleware.

### Decision 3: Centralized Spanish Translations in `lang/es.json`
- **Rationale**: Keeps the application's single-dictionary architecture intact. All Filament auth keys, button labels, and validation feedback will be localized to Spanish.

## Risks / Trade-offs

- **[Risk]** Current password check prevents password update if user forgets their current password while logged in.
  - **Mitigation**: The user can simply log out and use the "Forgot your password?" recovery flow, receiving a secure reset link to their verified email address.
- **[Risk]** SMTP service interruption could prevent password recovery emails.
  - **Mitigation**: Mailpit has been tested and confirmed responsive on port 1025. In production environments, standard transactional mailers (Resend, Mailgun, SES) can be slotted into `.env` without code changes.
