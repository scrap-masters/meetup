ARG PHP_VERSION=8.1.12

FROM php:${PHP_VERSION}-fpm-buster

ARG COMPOSER_VERSION=2.4.4

ENV COMPOSER_MEMORY_LIMIT=-1

ARG INSTALL_COMPOSER_DEV=false

RUN apt-get update && apt-get install -y \
     git zip bzip2 libpng-dev libpng-dev libicu-dev \
     vim libjpeg62-turbo-dev libfreetype6-dev libonig-dev \
     libpq-dev libxpm-dev libvpx-dev libbz2-dev zlib1g-dev libzip-dev gnumeric \
    && curl -sS https://getcomposer.org/installer | php -- --version="${COMPOSER_VERSION}" --install-dir=/usr/local/bin --filename=composer \
    && apt-get autoclean \
    && apt-get autoremove

RUN docker-php-ext-install intl bcmath mbstring bz2 gd zip pgsql pdo_pgsql opcache pcntl

RUN docker-php-ext-enable intl pcntl

RUN if [ ${INSTALL_XDEBUG} = true ]; then \
    pecl install xdebug-${XDEBUG_VERSION} \
    && docker-php-ext-enable xdebug \
;fi

RUN usermod -u 1000 www-data

WORKDIR /var/www

RUN apt-get remove -y git && apt-get autoremove -y && apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

EXPOSE 9000
CMD ["php-fpm"]
