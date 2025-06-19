#!/usr/bin/env bash
set -o errexit

composer install --no-dev --optimize-autoloader
php artisan migrate --force
npm install && npm run build