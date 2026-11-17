# S. Kit Trading - Inventory Management and Online Storefront

Private portfolio snapshot of a personal project for an animal feed store.
This repository is separate from the deployed application and has no original Git history or deployment configuration.

## Technology
- PHP 8.2+, Laravel 12, Livewire 3, MySQL
- React, Vite, Tailwind CSS
- REST API, Postman, PHPUnit

## Features
- Products, categories, units, stock movements and stock counts
- Dashboard, reports and low-stock views
- Online-sales Excel import/export
- User roles and permissions
- Online product catalog and inquiry cart (not a payment checkout)

Shopee API integration is work in progress and requires approved credentials. It is not presented as a completed production integration.

## My contribution
I gathered requirements, used AI to assist with implementation, reviewed UI behavior, and manually tested the application and API with Postman. I reported the mobile landscape cart overlap issue and performed retesting and regression checks after the fix. This is not a claim that all code was written without assistance.

## Local setup
Use a NEW, isolated MySQL database, never the live shop database.
1. Install PHP 8.2+ with required extensions, Composer, Node.js and MySQL.
2. Run `composer install`.
3. Copy `.env.example` to `.env` and configure your local database credentials.
4. Run `php artisan key:generate` and `php artisan migrate --seed`.
5. Run `npm ci` and `npm run build` in the repository root.
6. In `storefront-app`, run `npm ci` and `npm run build`.
7. Copy the contents of `storefront-app/dist/assets` into `public/assets`, and copy `storefront-app/dist/index.html` to `public/shop.html`.
8. Run `php artisan storage:link` and `php artisan serve`.

Demo accounts: `owner@example.com`, `manager@example.com`, `warehouse@example.com`, `sales@example.com`. Their local-only password is `password`; do not deploy these accounts publicly.

## Privacy and limitations
- No `.env`, database exports, sessions, logs or original Git history are included.
- Demo identities replace seed user information; transaction fixtures are omitted.
- Product assets/catalog remain illustrative; no measured business improvement is claimed.
- Generated storefront bundles are excluded and must be rebuilt.
- Automated tests exist but this sanitized snapshot has not yet been run end-to-end in a clean database. Previously reported manual tests are not a claim that this copy has passed all tests.

## Tests
Use a separate test database and run `php artisan test`. Never run tests against live data.
