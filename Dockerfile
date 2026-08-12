FROM dunglas/frankenphp:php8.4-alpine

# Install system dependencies
RUN apk add --no-cache \
    curl \
    zip \
    libzip-dev \
    freetype \
    libjpeg-turbo \
    libpng \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    libwebp-dev \
    oniguruma-dev \
    sqlite-dev \
    icu-dev \
    jpegoptim \
    optipng \
    pngquant \
    gifsicle \
    libwebp-tools \
    bash \
    nodejs \
    npm

# Configure and install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-configure intl \
    && docker-php-ext-install -j$(nproc) gd intl \
    && docker-php-ext-install pdo_sqlite mbstring zip exif pcntl \
    && docker-php-ext-enable pdo_sqlite intl

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy application files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --no-scripts --ignore-platform-reqs \
    && composer dump-autoload --optimize --no-scripts \
    && mkdir -p bootstrap/cache \
    && php artisan package:discover --ansi

# Install NPM dependencies and compile frontend assets
RUN npm install --ignore-scripts && npm run build && rm -rf node_modules

# Set permissions
RUN chown -R root:root /app \
    && chmod -R 775 /app/storage /app/bootstrap/cache /app/database

# Backup storage so start.sh can restore bundled files into the Dokploy volume
RUN cp -a /app/storage /app/storage_backup

ENV SERVER_NAME=":80"

COPY docker/start.sh /start.sh
RUN chmod +x /start.sh

EXPOSE 80

ENTRYPOINT ["/start.sh"]
