#!/bin/bash
set -e

cache() {
    php artisan optimize:clear
    php artisan optimize
    chmod -R 777 storage bootstrap/cache
}

firstRun() {
    php artisan key:generate
    php artisan storage:link >> /dev/null
}
migrate() {
    php artisan migrate
}
echo "Start container configuration..."
composer install
CONTAINER_FIRST_STARTUP="CONTAINER_FIRST_STARTUP"
if [ ! -e /$CONTAINER_FIRST_STARTUP ]; then
    echo 'Please wait 30 seconds...'
    sleep 30
    touch /$CONTAINER_FIRST_STARTUP
    firstRun
else
    echo "No startup action"
fi

cache
migrate

exec php-fpm
