FROM php:8.3-apache-bullseye

WORKDIR /var/www/html

# Install system dependencies
RUN apt update && \
    apt install -y git && \
    rm -rf /var/lib/apt/lists/*

# Install composer
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer
