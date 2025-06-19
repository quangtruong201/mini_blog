FROM php:8.2-cli

# Cài các extension
RUN apt-get update && apt-get install -y \
    git unzip curl libpng-dev libonig-dev libxml2-dev zip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Cài Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Thiết lập thư mục làm việc
WORKDIR /var/www

# Copy toàn bộ project
COPY . .

# Cài đặt và build
RUN composer install --no-dev --optimize-autoloader \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Mở cổng ứng dụng
EXPOSE 8080

# Chạy Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
