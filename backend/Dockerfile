FROM php:8.2-fpm

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN apt-get update -y && apt-get install -y openssl zip unzip git curl libonig-dev libzip-dev

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install mysqli pdo_mysql pcntl

RUN docker-php-ext-configure pcntl --enable-pcntl

WORKDIR /app

COPY .env.example .env
COPY . .

RUN composer install
RUN php artisan key:generate

EXPOSE 8000

CMD bash -c "php artisan serve --host 0.0.0.0"
