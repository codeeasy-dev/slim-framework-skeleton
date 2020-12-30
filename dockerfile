FROM php:7.4

ARG USER=demo
ARG UID=1000
ARG GID=1000
ARG PW=demo

RUN apt-get update -y && \
    apt-get install dos2unix zip unzip wget -y && \
    wget -c -P /usr/bin https://getcomposer.org/download/2.0.8/composer.phar && \
    mv /usr/bin/composer.phar /usr/bin/composer && \
    chown root:root /usr/bin/composer && \
    chmod 755 /usr/bin/composer

RUN useradd -m ${USER} --uid=${UID} && echo "${USER}:${PW}" | chpasswd

USER ${UID}:${GID}
WORKDIR /home/${USER}
