# FROM php:8.4-cli

# WORKDIR /app

# RUN apt-get update && apt-get install -y \
#     git curl zip unzip libzip-dev \
#     libonig-dev libxml2-dev nodejs npm \
#     && docker-php-ext-install pdo pdo_mysql mbstring zip xml

# COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# COPY . .

# RUN composer install --optimize-autoloader --no-dev --no-interaction
# RUN npm install && npm run build

# RUN php artisan config:cache
# RUN php artisan route:cache

# EXPOSE 8000
# CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]






FROM richarvey/nginx-php-fpm:3.1.6

COPY . .

# Config de l'image
ENV SKIP_COMPOSER=0
ENV WEBROOT=/var/www/html/public
ENV PHP_ERRORS_STDERR=1
ENV RUN_SCRIPTS=1
ENV REAL_IP_HEADER=1

# Config Laravel
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr

# Autorise Composer à tourner en root dans le conteneur
ENV COMPOSER_ALLOW_SUPERUSER=1

CMD ["/start.sh"]


