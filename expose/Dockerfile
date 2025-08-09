FROM php:7.4-apache

# Enable .htaccess usage dan (secara sengaja) biarkan directory listing bisa diaktifkan
RUN a2enmod rewrite && \
    sed -ri 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Copy app
COPY . /var/www/html/

# Ownership
RUN chown -R www-data:www-data /var/www/html

WORKDIR /var/www/html
