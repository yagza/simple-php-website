FROM php:8.4-fpm-alpine3.20
COPY content includes template .htaccess index.php /usr/src/myapp
WORKDIR /usr/src/myapp
CMD [ "php", "-S", "localhost:8080" ]
