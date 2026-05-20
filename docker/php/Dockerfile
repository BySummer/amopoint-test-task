FROM php:8.3-fpm-alpine

RUN apk add --no-cache \
    git \
    curl \
    unzip \
    libpq-dev \
    nodejs \
    npm

RUN docker-php-ext-install \
    pdo \
    pdo_pgsql

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

CMD ["php-fpm"]