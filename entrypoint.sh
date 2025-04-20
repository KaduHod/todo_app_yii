#!/bin/bash

# Start PHP-FPM
php-fpm &

# Start Nginx (no foreground)
nginx -g "daemon off;"

