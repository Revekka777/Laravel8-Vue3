FROM php:8-fpm-alpine

# ADD and set Group
RUN addgroup -g 1000 --system laravel
RUN adduser -G laravel --system -D -s /bin/sh -u 1000 laravel

# Create folder to run
RUN mkdir -p /var/www/html

# Set Profile
RUN chown laravel:laravel /var/www/html

# Work in the specific space
WORKDIR /var/www/html

# Install dependencies
RUN apk add --no-cache \
    freetype \
    libpng \
    libjpeg-turbo \
    freetype-dev \
    libpng-dev \
    libjpeg-turbo-dev\
    libpq-dev
#    postgresql-dev

RUN docker-php-ext-configure gd \
    --with-freetype \
    --with-jpeg

#RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql

RUN apk del --no-cache freetype-dev libpng-dev libjpeg-turbo-dev

RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

#RUN docker-php-ext-install pdo pdo_pgsql pgsql
