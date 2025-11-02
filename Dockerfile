# Use official PHP 8.2 image with Apache
FROM php:8.2-apache

# Install required PHP extensions and system tools
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libonig-dev libxml2-dev zip curl \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath gd

# Enable Apache rewrite module (for Laravel routing)
RUN a2enmod rewrite

# Set the working directory
WORKDIR /var/www/html

# Copy composer from official composer image
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Set Laravel folder permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Set environment variables
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV APP_URL=https://yourapp.onrender.com

# Expose port 80 for Apache
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]
