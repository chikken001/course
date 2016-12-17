#!/bin/bash

sudo chmod -R 755 /var/www/c/
sudo chown -R www-data:www-data /var/www/course
sudo setfacl -Rm u:chikken:rwx /var/www/course/
sudo setfacl -dRm u:chikken:rwx /var/www/course/
sudo chmod -R 777 app/cache app/logs app/sessions web/uploads