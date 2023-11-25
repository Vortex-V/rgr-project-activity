FROM php:8.2-fpm

MAINTAINER V Aleksandrov

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
    libmemcached-dev \
    libpq-dev \
    libjpeg-dev \
    libpng-dev \
    libxml2-dev \
    libfreetype6-dev \
    libreadline-dev \
    libgmp-dev

RUN docker-php-ext-install  \
        pdo_pgsql \
        pcntl \
        exif \
        xml \
        intl \
        gmp

# Xdebug
RUN pecl channel-update pecl.php.net \
    && pecl install -o -f xdebug-3.2.2

ADD php/php.ini /usr/local/etc/php/conf.d

#RUN curl -sL https://deb.nodesource.com/setup_18.x| bash -
#RUN apt-get install -y nodejs

RUN apt-get -y autoremove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

#COPY ./docker/php/www.conf /usr/local/etc/php/

RUN usermod -u 1000 www-data

ENV PHP_INI_SCAN_DIR /usr/local/etc/php/local-conf.d:

WORKDIR /app

EXPOSE 9000
CMD ["php-fpm"]
