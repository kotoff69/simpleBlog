FROM php:7.2.9-fpm

RUN apt-get update && apt-get install -y libmcrypt-dev \
    mysql-client && docker-php-ext-install pdo_mysql \