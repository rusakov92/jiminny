FROM alpine:edge

ARG ENV
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV PATH="${PATH}:/root/.composer/vendor/bin"

RUN apk --no-cache add php8 php8-fpm php8-json php8-curl \
    php8-zlib php8-xml php8-phar php8-intl php8-dom php8-xmlreader php8-ctype php8-session \
    php8-mbstring php8-gd php8-pecl-xdebug php8-iconv php8-xmlwriter php8-fileinfo \
    php8-simplexml php8-tokenizer php8-pecl-apcu php8-openssl \
    py3-setuptools nginx supervisor curl git bash vim

RUN ln -s /usr/bin/php8 /usr/bin/php
RUN rm /etc/nginx/conf.d/default.conf

COPY docker/nginx/nginx.conf /etc/nginx/nginx.conf
COPY docker/nginx/conf.d /etc/nginx/conf.d

COPY docker/php/php-fpm.d /etc/php8/php-fpm.d
COPY docker/php/php.ini /etc/php8/conf.d/custom.ini
COPY docker/php/conf.d /etc/php8/conf.d

COPY docker/supervisor/supervisord.conf /etc/supervisord.conf
COPY docker/supervisor/conf.d /etc/supervisor/conf.d

RUN mkdir /jiminny \
    && chown -R nobody.nobody /jiminny
