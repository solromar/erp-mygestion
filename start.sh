#!/bin/bash

rm -rf ./.git;
git init;
mv ./.env.local.bk ./.env.local;

echo "Ingresa el nombre del ERP:"
read new_text
sed -i "s/erp-base/$new_text/g" ./src/Model/AbstractApi.php
sed -i "s/erp-base/$new_text/g" ./.lando.yml

lando start; 
lando composer install;