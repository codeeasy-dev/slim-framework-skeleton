FROM php:7.4-apache

# SETTING THE USER DATA
ARG USER=felipe
ARG UID=1000
ARG GID=1000
ARG PW=felipe
RUN useradd -m ${USER} --uid=${UID} && echo "${USER}:${PW}" | chpasswd

# CHANGING DIRECTORY PERMISSIONS
RUN chown ${UID}:${GID} /var/www/dependencies/

# INSTALLING THE COMPOSER
RUN apt-get update -y
RUN apt-get install dos2unix zip unzip wget -y
RUN wget -c -P /usr/bin https://getcomposer.org/download/2.0.8/composer.phar
RUN mv /usr/bin/composer.phar /usr/bin/composer
RUN chown root:root /usr/bin/composer
RUN chmod 755 /usr/bin/composer

# SETTING THE APACHE
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN a2enmod rewrite headers

# SETTING PHP.INI
RUN cp "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

# INSTALLING THE COMPOSER DEPENDENCIES
RUN mkdir /var/www/dependencies
COPY --chown=${UID}:${GID} composer.* /var/www/html/
RUN composer install
RUN chown ${UID}:${GID} -R ./vendor/
RUN mv ./vendor /var/www/dependencies/

# CHANGING THE DEFAULT USER
USER ${UID}:${GID}
