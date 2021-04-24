#!/bin/bash

#/usr/bin/composer install --no-interaction --no-scripts --working-dir /jiminny --optimize-autoloader --apcu-autoloader

/usr/bin/supervisord -c /etc/supervisord.conf -n
