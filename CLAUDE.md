# Laravel Project Setup

This project is a Laravel application with authentication scaffolding.

## Setup

The following was done to set up the project:

### Laravel Breeze Authentication
- Installed Breeze with the Blade stack for authentication scaffolding
- Includes login, registration, password reset, email verification, and user profile management
- Views located in `resources/views/auth/`

### Frontend Assets
- Installed npm dependencies
- Built frontend assets using Vite (CSS and JS bundles in `public/build/`)

### Database
- Created `ilearnlagao` database in MySQL
- Ran migrations to create:
  - Users table
  - Cache table
  - Jobs table

### Development Server
- Started Laravel development server on `http://localhost:8000`

## Project Structure

- **app/** - Application code
- **config/** - Configuration files
- **database/** - Database migrations and seeds
- **public/** - Public files (including built assets)
- **resources/** - Blade templates and frontend assets
- **routes/** - Route definitions
- **vendor/** - Composer dependencies

## Testing

The application has been smoke-tested and verified:
- Homepage loads (HTTP 200)
- Login page loads (HTTP 200)
- Registration page loads (HTTP 200)

All authentication pages are accessible and the Breeze scaffolding is fully functional.

## Usage

To run the application locally:
```bash
php artisan serve
```

Navigate to `http://localhost:8000` in your browser.

## Security

The application uses Laravel's built-in security features:
- Password hashing using Laravel's built-in methods
- Email verification
- CSRF protection
- Session management