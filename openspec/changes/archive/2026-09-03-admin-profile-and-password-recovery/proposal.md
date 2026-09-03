## Why

The Carento CMS administrative panel currently provides only a static login form without self-service account management or recovery mechanisms. If an administrator forgets their password, they cannot initiate a reset from the login screen. Furthermore, logged-in administrators have no dedicated interface to update their profile details (name, email) or modify their account password securely.

With the Mailpit SMTP service configured and verified for transactional email delivery, introducing an automated password recovery workflow alongside an authenticated profile and password modification interface will provide a secure, modern, and self-sufficient administrative experience.

## What Changes

- **Password Recovery Workflow (`->passwordReset()`)**:
  - Enable the "Forgot your password?" recovery flow on `/admin/login`.
  - Provide the request form at `/admin/password-reset/request` where administrators can request a secure reset link.
  - Deliver password reset notification emails via the configured SMTP mailer.
  - Provide the password reset form at `/admin/password-reset/reset/{token}` where users set and confirm their new password.
- **User Profile Modification (`->profile(...)`)**:
  - Add an "Edit Profile" action to the admin top-right user menu.
  - Allow authenticated administrators to update their personal information (Name and Email address).
- **Secure Password Modification**:
  - Include password modification fields on the profile page allowing administrators to set a new password.
  - Enforce current password verification before allowing the password to be updated.
  - Re-hash the new password and preserve the active session.
- **Spanish Localization**:
  - Localize all authentication screens, recovery emails, profile forms, validation messages, and flash notifications into Spanish.

## Capabilities

### New Capabilities
- `admin-profile-and-password-recovery`: Self-service administrative user profile editing, password modification with current password verification, and email-based password recovery.

### Modified Capabilities
<!-- No requirement changes to existing capabilities -->

## Impact

- **Filament Admin Provider**: Updates `app/Providers/Filament/AdminPanelProvider.php` to enable `passwordReset()` and `profile()`.
- **Custom Edit Profile Page**: Adds `app/Filament/Pages/Auth/EditProfile.php` with custom validation and current password verification.
- **Localization**: Adds Spanish translations for all profile and password recovery keys in `lang/es.json`.
- **Mail**: Utilizes verified SMTP configuration to deliver reset links.
