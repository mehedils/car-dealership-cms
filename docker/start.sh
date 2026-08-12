#!/bin/bash
set -e

echo "Caching configuration..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Ensuring database directory exists..."
mkdir -p /app/database/data
touch /app/database/data/database.sqlite
chmod 664 /app/database/data/database.sqlite

echo "Restoring bundled storage files into volume..."
cp -rn /app/storage_backup/* /app/storage/

echo "Creating storage symlinks..."
php artisan storage:link --force

echo "Running migrations..."
php artisan migrate --force || true

echo "Starting Web Server (Caddy/FrankenPHP)..."
exec frankenphp run --config /etc/caddy/Caddyfile --adapter caddyfile
