FROM php:8-fpm-buster

RUN apt-get update && apt-get install -y curl git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
