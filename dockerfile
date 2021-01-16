FROM php:7.4 AS php-slim-web

ARG USER=felipe
ARG UID=1000
ARG GID=1000
ARG PW=felipe

RUN apt-get update -y
RUN apt-get install dos2unix zip unzip wget -y
RUN wget -c -P /usr/bin https://getcomposer.org/download/2.0.8/composer.phar
RUN mv /usr/bin/composer.phar /usr/bin/composer
RUN chown root:root /usr/bin/composer
RUN chmod 755 /usr/bin/composer

RUN useradd -m ${USER} --uid=${UID} && echo "${USER}:${PW}" | chpasswd

WORKDIR /home/${USER}/project

RUN mkdir /home/${USER}/dependencies
RUN chown ${UID}:${GID} /home/${USER}/dependencies
COPY --chown=${UID}:${GID} composer.* /home/${USER}/project/
RUN composer install
RUN chown ${UID}:${GID} -R ./vendor/
RUN mv ./vendor ../dependencies/

USER ${UID}:${GID}
