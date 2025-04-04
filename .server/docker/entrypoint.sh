#!/bin/bash

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

    echo "######################################"
    echo "Execute migrations ..."
    echo "######################################"
    php artisan migrate

    echo "######################################"
    echo "Execute fixtures load ..."
    echo "######################################"
    php artisan db:seed

php-fpm
