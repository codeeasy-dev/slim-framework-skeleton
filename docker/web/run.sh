if [ ! -d "vendor/" ]; then
    if [ ! -d "../dependencies/vendor/" ]; then
        cd ../dependencies
        composer install
        cd ../project
    fi
    cp -r ../dependencies/vendor ./
fi

php -S 0.0.0.0:8080 -t public
