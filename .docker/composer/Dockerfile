FROM library/composer:1.7.3

LABEL maintainer="NicolasFrey"

# Add pgsql extension
RUN apk --no-cache add \
    postgresql-dev

RUN docker-php-ext-install pdo_pgsql