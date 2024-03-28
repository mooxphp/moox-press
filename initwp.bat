@echo off

cd public/wp
move wp-config.php ..\wp-config.php
move wp-content ..\wp-content
cd ..
composer install
move wp-config.php wp\wp-config.php
move wp-content wp\wp-content
cd ..
