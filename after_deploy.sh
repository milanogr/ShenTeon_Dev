#!/bin/bash

#echo "Aggiorno i vendor...";
#php composer.phar update --prefer-dist --optimize-autoloader

#echo "Eseguo cache:clear --dev...";
#php app/console cache:clear

#echo "Eseguo cache:clear --prod...";
#php app/console cache:clear --env=prod --no-debug
#echo "Cancellazione cache...";
#rm -rf /var/www/vhosts/shenteon.com/app/cache/*

echo "Eseguo cache:clear --prod...";
php app/console cache:clear --env=prod --no-debug

#echo "Riscaldo la cache...";
#php app/console cache:warmup --env=prod --no-debug

#echo "Aggiorno il database...";
#php app/console doctrine:schema:update --force

#echo "Assetic:dump --dev";
#php app/console assetic:dump

#echo "Assetic:dump --prod";
#php app/console assets:install --symlink
#php app/console assetic:dump --env=prod --no-debug

#echo "Elimino le sessioni";
#rm -rf app/Sessions/*

#echo "Apache Restart in corso...";
#apachectl graceful

echo "restart php-fpm";
service php5-fpm restart