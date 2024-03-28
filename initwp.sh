#!/bin/sh

cd public
composer install
cd wp
ln -s ../wp-config.php wp-config.php
ln -s ../wp-content wp-content
