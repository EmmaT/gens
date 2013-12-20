php app/console doctrine:database:drop --force
php app/console doctrine:database:create
php app/console doctrine:schema:create
php app/console fos:user:create emma emma@emma.com 123qweASD --super-admin
php app/console doctrine:fixtures:load