FROM php:7.2.12

WORKDIR /tmp
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_NO_INTERACTION 1

RUN apt-get update -y
RUN apt-get install -y git unzip
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer
RUN composer self-update
RUN composer global require hirak/prestissimo

VOLUME ["/data"]
WORKDIR /var/www/html

ENTRYPOINT ["composer"]
