FROM php:7.2.9-apache-stretch

# Install necessary dependencies
RUN apt-get update \
    && apt-get install -y git \
    && docker-php-ext-install pdo pdo_mysql

# Configure apache mod rewrite
RUN ln -s /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/rewrite.load