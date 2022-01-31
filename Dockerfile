# Imagen de dockerhub
FROM php:8.0.2-apache-buster

RUN a2enmod rewrite

# Instalacion de laravel y sus dependencias
RUN apt-get update && apt-get install -y \
        zlib1g-dev \
        libicu-dev \
        libxml2-dev \
        libpq-dev \
        libzip-dev
        #&& docker-php-ext-install pdo pdo_mysql zip intl xmlrpc soap opcache \
        #&& docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd

RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql && docker-php-ext-install pdo_pgsql pgsql

RUN apt-get update -y

# Instalacion de node 8
RUN curl -sL https://deb.nodesource.com/setup_8.x | bash -- \
	&& apt-get install -y nodejs \
	&& apt-get autoremove -y

#Instalacion composer (Instalar composer manualmente dentro de un docker es un infierno, por lo cual, cogemos la carpeta composer de una imagen oficial y la copiamos a nuestro docker)
COPY --from=composer /usr/bin/composer /usr/bin/composer

#Quiza no son necesarios
COPY  docker/000-default.conf /etc/apache2/sites-available/000-default.conf

#Aqui va el archivo .env de laravel
#COPY  docker/.env /var/www/html/public/.env
#COPY  docker/php.ini /usr/local/etc/php/php.ini

ENV COMPOSER_ALLOW_SUPERUSER 1

#COPY  . /var/www/html/
#WORKDIR /var/www/html/

#Damos permisos al usuario y grupo www-data (propios de la version php:7.4-apache) en la carpeta donde vamos a copiar el proyecto
#RUN chown -R www-data:www-data /var/www/html  \
#    && composer install  && composer dumpautoload


