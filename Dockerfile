FROM php:8.0-apache
RUN docker-php-ext-install mysqli pdo_mysql pdo


RUN apt-get update -y && apt-get install -y sendmail libpng-dev libjpeg-dev

RUN apt-get update && \
    apt-get install -y \
        zlib1g-dev

RUN docker-php-ext-install gd


RUN apt-get upgrade -y

# allow .htaccess with RewriteEngine
RUN a2enmod rewrite

# autorise .htaccess files
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf