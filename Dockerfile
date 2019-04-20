FROM php:fpm-alpine as base

ARG WORKFOLDER

ENV WORKPATH ${WORKFOLDER}

WORKDIR ${WORKFOLDER}

COPY docker/php/conf/php.ini /usr/local/etc/php/php.ini

COPY . ./
