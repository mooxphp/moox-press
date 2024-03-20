<p align="center">
    <br>
  	<img src="https://github.com/mooxphp/moox/raw/main/art/moox-logo.png" width="200" alt="Moox Logo">
    <br>
</p><br>


<p align="center">
    <a href="https://github.com/mooxphp/moox/actions/workflows/pest.yml"><img alt="PEST Tests" src="https://github.com/mooxphp/moox/actions/workflows/pest.yml/badge.svg"></a>
    <a href="https://github.com/mooxphp/moox/actions/workflows/pint.yml"><img alt="Laravel PINT PHP Code Style" src="https://github.com/mooxphp/moox/actions/workflows/pint.yml/badge.svg"></a>
    <a href="https://github.com/mooxphp/moox/actions/workflows/phpstan.yml"><img alt="PHPStan Level 5" src="https://github.com/mooxphp/moox/actions/workflows/phpstan.yml/badge.svg"></a>
</p>
<p align="center">
    <a href="https://www.tailwindcss.com"><img alt="TailwindCSS 3" src="https://img.shields.io/badge/TailwindCSS-v3-orange?logo=tailwindcss&color=06B6D4"></a>
    <a href="https://www.alpinejs.dev"><img alt="AlpineJS 3" src="https://img.shields.io/badge/AlpineJS-v3-orange?logo=alpine.js&color=8BC0D0"></a>
    <a href="https://www.laravel.com"><img alt="Laravel 11" src="https://img.shields.io/badge/Laravel-v11-orange?logo=Laravel&color=FF2D20"></a>
    <a href="https://www.laravel-livewire.com"><img alt="Laravel Livewire 2" src="https://img.shields.io/badge/Livewire-v3-orange?logo=livewire&color=4E56A6"></a>
</p>
<p align="center">
    <a href="https://app.codacy.com/gh/mooxphp/moox/dashboard"><img src="https://app.codacy.com/project/badge/Grade/2b912412bb6e4892b52688272dec1555" alt="Codacy Code Quality"></a>
    <a href="https://app.codacy.com/gh/mooxphp/moox/dashboard"><img src="https://app.codacy.com/project/badge/Coverage/2b912412bb6e4892b52688272dec1555" alt="Codacy Coverage"></a>
    <a href="https://codeclimate.com/github/mooxphp/moox/maintainability"><img src="https://api.codeclimate.com/v1/badges/567a02eb37ff53d02f5c/maintainability" alt="Code Climate Maintainability"></a>
    <a href="https://snyk.io/test/github/mooxphp/moox"><img alt="Snyk Security" src="https://snyk.io/test/github/mooxphp/moox/badge.svg"></a>
</p>
<p align="center">
    <a href="https://github.com/mooxphp/moox/issues/94"><img src="https://img.shields.io/badge/renovate-enabled-brightgreen.svg" alt="Renovate" /></a>
    <a href="https://hosted.weblate.org/engage/moox/"><img src="https://hosted.weblate.org/widgets/moox/-/svg-badge.svg" alt="Translation status" /></a>
    <a href="https://github.com/mooxphp/moox-app-components/blob/main/LICENSE.md"><img alt="License" src="https://img.shields.io/github/license/mooxphp/moox?color=blue&label=license"></a>
    <a href="https://mooxphp.slack.com/"><img alt="Slack" src="https://img.shields.io/badge/Slack-Moox-blue?logo=slack"></a>
    <br>
    <br>
</p>


# Moox Press Monorepo

Welcome to the Moox project. This is the Moox Press Monorepo. It is an installable Laravel App meant for development of our Filament Plugins aka Laravel Packages to connect with WordPress. We are in an early stage of development ...

## Packages

- Moox Press - early stage, do not try to use!

## Installation

The Laravel dev app in the root-folder of the Moox Monorepo is made for instant development with Laravel Valet, Laravel Sail or Laragon.

```bash
# Create a .env file and adjust to your needs
cp .env.example .env

# Install via Composer
composer install

# Migrate and seed
php artisan migrate:fresh --seed
## Option: instead of using the WordPress Installer to create the needed DB-tables, you can import the wp_full.sql file in project root to simulate a freshly installed WordPress.

# Symlink WordPress (creates all necessary folders and files, mostly as symlinks, mostly gitignored)
./symlink.sh

# Use Vite (for Laravel Sail on Windows: do it in Ubuntu, not inside the Sail container)
npm install
npm run dev
```

## 

