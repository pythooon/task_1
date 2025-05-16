FROM php:8.2-fpm

ARG APP_ENV=${APP_ENV}
ARG DB_HOST=${DB_HOST}
ARG DB_PORT=${DB_PORT}
ARG DB_DATABASE=${DB_DATABASE}
ARG DB_USERNAME=${DB_USERNAME}
ARG DB_PASSWORD=${DB_PASSWORD}

USER root
WORKDIR /var/www/api
RUN useradd -ms /bin/bash test
RUN groupmod -o -g 1000 test && usermod -o -u 1000 -g test test

RUN chmod -R ug+w /var/www
RUN mkdir /var/www/storage /var/www/storage/logs >> /dev/null 2>&1 && chmod -R 777 /var/www/storage/logs
RUN chown -R test:test /var/www

RUN apt-get update
RUN apt-get install -y openssl zip unzip git curl \
    libzip-dev libonig-dev libicu-dev autoconf pkg-config  \
    libssl-dev libpq-dev iputils-ping screen cron
RUN pecl install xdebug redis
RUN docker-php-ext-install bcmath mbstring intl opcache pdo sockets pdo_mysql
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ADD .docker/php.ini /usr/local/etc/php/conf.d/php.ini

EXPOSE 9000
