#!/bin/bash

sudo rm -rf app/cache/*
sudo php app/console assets:install --symlink
sudo php app/console assetic:dump
sudo chmod -R 777 app/cache app/logs