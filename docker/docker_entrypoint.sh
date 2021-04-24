#!/bin/bash

EXPECTED_CHECKSUM="$(/usr/bin/php -r 'copy("https://composer.github.io/installer.sig", "php://stdout");')"
/usr/bin/php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
ACTUAL_CHECKSUM="$(/usr/bin/php -r "echo hash_file('sha384', 'composer-setup.php');")"
if [ "$EXPECTED_CHECKSUM" != "$ACTUAL_CHECKSUM" ]
then
    >&2 echo 'ERROR: Invalid installer checksum'
    rm composer-setup.php
    exit 1
fi
/usr/bin/php composer-setup.php --install-dir="/usr/bin" --filename="composer"
rm composer-setup.php

/usr/bin/composer install --no-interaction --working-dir /jiminny --optimize-autoloader --apcu-autoloader

/usr/bin/supervisord -c /etc/supervisord.conf -n
