FROM php:7.1.2-fpm-alpine

# Application Directory
WORKDIR /var/www/html

# Adding required files and directories
COPY composer.json composer.lock /var/www/html/
COPY ./web /var/www/html/web
COPY ./src /var/www/html/src
COPY ./app /var/www/html/app

# Install packages
RUN apk update && \
    apk add curl git nginx supervisor autoconf alpine-sdk && \
    pecl install apcu && \
    apk del autoconf alpine-sdk && \
    pecl clear-cache && \
    curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer && \
    composer self-update && \
    cd /var/www/html && \
    composer install --working-dir=/var/www/html --no-interaction --no-progress

# Configure nginx
COPY docker-config/nginx.conf /etc/nginx/nginx.conf

# Configure fpm pool
COPY docker-config/www.conf /usr/local/etc/php-fpm.d/www.conf
COPY docker-config/apcu.ini /usr/local/etc/php/conf.d/apcu.ini

# Configure supervisord
COPY docker-config/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

EXPOSE 80
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]