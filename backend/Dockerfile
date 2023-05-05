root:
# Set the base image to use
FROM php:8.2.5-apache

# Install required packages
RUN apt-get update \
    && apt-get install -y git curl unzip \
    && curl -sL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-install pdo_mysql \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && echo 'xdebug.mode=coverage' >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo 'xdebug.client_host=host.docker.internal' >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory
WORKDIR /var/www/html

# Copy the Laravel application files
COPY backend .

# Install Laravel dependencies
RUN composer install --no-interaction --no-progress --no-suggest

# Copy the Vue.js application files
COPY frontend /var/www/html/public

# Install Vue.js dependencies and build the production version
RUN cd /var/www/html/public \
    && npm install \
    && npm run production

# Expose the port
EXPOSE 8000

# Start the Apache server
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]