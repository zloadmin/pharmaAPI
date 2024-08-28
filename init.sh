#!/bin/bash
#php artisan cache:clear  \
php artisan config:clear \
&&  php artisan migrate  \
&& php artisan migrate:refresh  \
&& php artisan db:seed  \
&& php artisan scribe:generate