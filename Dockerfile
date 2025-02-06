FROM php:apache

# Instala las extensiones necesarias
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copia tus archivos al contenedor
COPY . /var/www/html/

# Exponer el puerto 80 para el servidor web
EXPOSE 80
