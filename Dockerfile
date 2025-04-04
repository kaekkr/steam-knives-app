FROM node:20 AS frontend

WORKDIR /app

COPY package.json pnpm-lock.yaml ./
RUN corepack enable && corepack prepare pnpm@latest --activate
RUN pnpm install

COPY resources ./resources
COPY vite.config.js ./
COPY tailwind.config.js ./
COPY postcss.config.js ./
COPY public ./public
RUN pnpm run build

FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
        libpq-dev git unzip libzip-dev libpng-dev libonig-dev curl \
        && docker-php-ext-install pdo pdo_pgsql mbstring zip exif pcntl bcmath

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

COPY --from=frontend /app/public/build ./public/build

RUN composer install --no-dev --optimize-autoloader
RUN php artisan config:cache

EXPOSE 8080
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8080
