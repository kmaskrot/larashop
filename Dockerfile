ARG PHP_VERSION

FROM php:${PHP_VERSION}

RUN apt-get update \
    && apt-get install -y \
        libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

RUN apt-get install -y postgresql-client


# Installe Node.js
RUN apt-get install -y nodejs npm
RUN apt-get install nano

## Installe Yarn
#RUN npm install -g yarn
# Installer les dépendances nécessaires pour installer Composer
RUN apt-get install -y \
    curl \
    unzip \
    git

# Installer Composer
RUN  curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

CMD sleep infinity
