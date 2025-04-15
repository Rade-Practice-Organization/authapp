#!/bin/bash

set -e

# Laravel required folders
mkdir -p /app/storage /app/bootstrap/cache

# Only run chown if both UID and GID are valid
if [[ -n "$APP_UID" && -n "$APP_GID" ]]; then
    chown -R "${APP_UID}:${APP_GID}" /app/storage /app/bootstrap/cache
else
    echo "⚠️ APP_UID or APP_GID not set. Skipping chown."
fi

# If the vendor directory does not exist or is empty, install dependencies
if [ ! -d "vendor" ] || [ -z "$(ls -A vendor)" ]; then
    echo "######################################"
    echo "Installing Composer dependencies..."
    echo "######################################"
    composer install --prefer-dist --no-scripts --no-interaction
    chmod -R a+rwx ./vendor
else
    echo "Composer vendor directory already exists and is not empty."
fi

#    echo "######################################"
#    echo "Execute migrations ..."
#    echo "######################################"
#    php artisan migrate
#
#    echo "######################################"
#    echo "Execute fixtures load ..."
#    echo "######################################"
#    php artisan db:seed

# Must be last to hand over to php-fpm or whatever CMD was passed
exec "$@"
