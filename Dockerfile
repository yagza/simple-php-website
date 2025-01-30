FROM php:8.4-fpm-alpine3.20
COPY content /usr/src/myapp/content
COPY includes /usr/src/myapp/includes
COPY template /usr/src/myapp/template 
COPY .htaccess index.php /usr/src/myapp
WORKDIR /usr/src/myapp
EXPOSE 8080
CMD [ "php", "-S", "0.0.0.0:8080" ]
