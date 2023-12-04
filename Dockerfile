# Use the official PHP image with Apache and PHP 8
FROM php:8.0-apache

# Install PDO MySQL extension
# RUN docker-php-ext-install pdo_mysql

# Install mysqli extension
RUN docker-php-ext-install mysqli

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy the local src directory to the container's working directory
COPY src/ /var/www/html/

# Set the working directory
WORKDIR /var/www/html
