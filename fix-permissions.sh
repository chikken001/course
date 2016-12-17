#!/bin/bash

sudo chmod -R 755 /var/www/efc/
sudo chown -R www-data:www-data /var/www/efc
sudo setfacl -Rm u:chikken:rwx /var/www/efc/
sudo setfacl -dRm u:chikken:rwx /var/www/efc/
sudo chmod -R 777 app/cache app/logs app/sessions web/uploads