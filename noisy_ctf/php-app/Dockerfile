FROM php:8.2-fpm

# Install MySQL PDO extension
RUN docker-php-ext-install pdo_mysql

# create app dir and user flag file location
RUN mkdir -p /var/www/html && chown -R www-data:www-data /var/www/html 

# copy app files
COPY . /var/www/html


# expose fastcgi port for inter-container only (no host mapping)
EXPOSE 9000

CMD ["php-fpm"]

