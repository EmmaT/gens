rm -f -R app/cache/dev
rm -f -R app/cache/prod
php app/console assets:install web
php app/console assetic:dump --env=prod --no-debug
