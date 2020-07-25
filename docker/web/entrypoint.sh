FILE = ${PWD}/composer.phar
DIRECTORY = ${PWD}/vendor

if [ ! -f "$FILE" ]; then
    wget -c https://getcomposer.org/composer-stable.phar
    mv composer-stable.phar composer.phar
fi

if [ ! -d "$DIRECTORY" ]; then
    php composer.phar install
fi

php -S 0.0.0.0:8080 -t public
