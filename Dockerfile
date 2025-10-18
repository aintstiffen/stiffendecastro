## Multi-stage Dockerfile for Laravel + Vite
# Stage 1: build frontend with Node
FROM node:18-alpine AS node-builder
WORKDIR /app
COPY package*.json ./
RUN npm ci --silent
COPY resources resources
COPY vite.config.js .
COPY tailwind.config.js .
COPY postcss.config.js . || true
RUN npm run build

# Stage 2: composer install
FROM composer:2.6 AS composer
WORKDIR /app
COPY composer.json composer.lock* ./
RUN composer install --no-dev --prefer-dist --no-interaction --no-progress --no-scripts

# Stage 3: php-fpm + nginx
FROM php:8.2-fpm-alpine
RUN apk add --no-cache nginx supervisor bash icu-dev libzip-dev oniguruma-dev libpng-dev zlib-dev curl
RUN docker-php-ext-install pdo pdo_mysql intl mbstring zip bcmath

# Configure nginx
RUN mkdir -p /run/nginx /var/www/html/storage /var/www/html/bootstrap/cache
COPY --from=composer /app /tmp/composer

WORKDIR /var/www/html
COPY . /var/www/html

# Copy built assets from node stage (if built)
COPY --from=node-builder /app/dist /var/www/html/public/dist

# Permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public/dist || true

# Nginx config (simple)
RUN rm -f /etc/nginx/conf.d/default.conf
COPY .docker/nginx.conf /etc/nginx/conf.d/app.conf 2>/dev/null || true

EXPOSE 80

# Start supervisor to run php-fpm and nginx
COPY .docker/supervisord.conf /etc/supervisord.conf 2>/dev/null || true
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
