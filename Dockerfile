FROM php:fpm-alpine as base

ARG WORKFOLDER

ENV WORKPATH ${WORKFOLDER}

WORKDIR ${WORKFOLDER}

RUN docker-php-ext-install pdo_mysql

COPY docker/php/conf/dev/php.ini /usr/local/etc/php/php.ini
