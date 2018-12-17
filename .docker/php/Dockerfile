FROM php:7.2-fpm

LABEL maintainer="NicolasFrey"

# Install some useful packages
RUN apt-get update
RUN apt-get install -y --no-install-recommends debconf apt-transport-https apt-utils \
    build-essential locales acl mailutils libpq-dev libicu-dev libxml2-dev zlib1g-dev

RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
RUN docker-php-ext-install pdo_pgsql pgsql
RUN docker-php-ext-install zip

### Config
COPY php.ini /etc/php/7.2/php.ini
COPY php-fpm-pool.conf /etc/php/7.2/pool.d/www.conf

RUN rm -rf /var/lib/apt/lists/* /tmp/*
RUN apt-get clean

RUN echo "en_US.UTF-8 UTF-8" > /etc/locale.gen && \
    echo "fr_FR.UTF-8 UTF-8" >> /etc/locale.gen && \
    locale-gen

WORKDIR /home/wwwroot/

EXPOSE 9000
CMD ["php-fpm"]