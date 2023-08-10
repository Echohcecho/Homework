FROM php:fpm-alpine
RUN docker-php-ext-install opcache
RUN docker-php-ext-install mysqli pdo pdo_mysql

COPY php/opcache.ini /usr/local/etc/php/conf.d/opcache.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer require vlucas/phpdotenv

COPY ./public/ /app/public
COPY ./src/ /app/src
