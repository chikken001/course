#!/bin/bash

## Remise à 0 de la base ##

php app/console doctrine:database:drop --force
php app/console doctrine:database:create
php app/console doctrine:schema:update --force

## Création des entités des fixtures ##

php app/console doctrine:fixtures:load