# Use official PHP 8.2 with Apache
FROM php:8.2-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev && \
    docker-php-ext-install pdo_mysql zip && \
    a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy everything into the container
COPY . .

# Copy Composer from official image
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install Composer dependencies (including Laravel vendor folder)
RUN composer install --no-dev --optimize-autoloader

# Set permissions for Laravel writable directories
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Point Apache to serve from /public
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Enable .htaccess overrides
RUN echo '<Directory /var/www/html/public>\n\
    AllowOverride All\n\
</Directory>' > /etc/apache2/conf-available/allowoverride.conf && \
    a2enconf allowoverride

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
