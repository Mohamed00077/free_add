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






FROM php:8.3-cli

# Installer les outils système et extensions PHP nécessaires
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libonig-dev \
    && docker-php-ext-install pdo_mysql mbstring zip gd \
    && rm -rf /var/lib/apt/lists/*

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction

COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

CMD ["docker-entrypoint.sh"]


