FROM php:7.4-fpm

# Install required dependencies and PHP extensions
RUN apt-get update \
    && apt-get install -y git libicu-dev libzip-dev zlib1g-dev \
    && docker-php-ext-install intl pdo_mysql zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
