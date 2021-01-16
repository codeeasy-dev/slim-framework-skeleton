if [ ! -d "vendor/" ]; then
    if [ ! -d "../dependencies/vendor/" ]; then
        cd ../dependencies
        composer install
        cd ../project
    fi
    cp -r ../dependencies/vendor ./
fi

apache2-foreground
