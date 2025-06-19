FROM php:8.2-cli

# Cài các extension Laravel cần
RUN apt-get update && apt-get install -y \
    git unzip curl libpng-dev libonig-dev libxml2-dev zip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Cài Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Thiết lập thư mục làm việc
WORKDIR /var/www

# Copy toàn bộ source code vào container
COPY . .

# Cấp quyền cho thư mục Laravel cần ghi
RUN chmod -R 775 storage bootstrap/cache

# Cài đặt & cache cấu hình & migrate database
RUN composer install --no-dev --optimize-autoloader \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache \
    && php artisan migrate --force

# Mở port 8080
EXPOSE 8080

# Chạy server Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
