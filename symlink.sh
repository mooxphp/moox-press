mkdir ./public/wp

ln -s ../../vendor/roots/wordpress-full/wp-admin ./public/wp/wp-admin
ln -s ../../vendor/roots/wordpress-full/wp-includes ./public/wp/wp-includes
ln -s ../../vendor/roots/wordpress-full/index.php ./public/wp/index.php
ln -s ../../vendor/roots/wordpress-full/wp-activate.php ./public/wp/wp-activate.php
ln -s ../../vendor/roots/wordpress-full/wp-blog-header.php ./public/wp/wp-blog-header.php
ln -s ../../vendor/roots/wordpress-full/wp-comments-post.php ./public/wp/wp-comments-post.php
ln -s ../../vendor/roots/wordpress-full/wp-config-sample.php ./public/wp/wp-config-sample.php
ln -s ../../vendor/roots/wordpress-full/wp-cron.php ./public/wp/wp-cron.php
ln -s ../../vendor/roots/wordpress-full/wp-links-opml.php ./public/wp/wp-links-opml.php
ln -s ../../vendor/roots/wordpress-full/wp-load.php ./public/wp/wp-load.php
ln -s ../../vendor/roots/wordpress-full/wp-login.php ./public/wp/wp-login.php
ln -s ../../vendor/roots/wordpress-full/wp-mail.php ./public/wp/wp-mail.php
ln -s ../../vendor/roots/wordpress-full/wp-settings.php ./public/wp/wp-settings.php
ln -s ../../vendor/roots/wordpress-full/wp-signup.php ./public/wp/wp-signup.php
ln -s ../../vendor/roots/wordpress-full/wp-trackback.php ./public/wp/wp-trackback.php
ln -s ../../vendor/roots/wordpress-full/xmlrpc.php ./public/wp/xmlrpc.php

mkdir -p ./public/wp/wp-content/themes
ln -s ../../../../vendor/roots/wordpress-full/wp-content/themes/twentytwentyfour ./public/wp/wp-content/themes/twentytwentyfour

mkdir ./public/wp/wp-content/plugins
ln -s ../../../../vendor/roots/wordpress-full/wp-content/plugins/hello.php ./public/wp/wp-content/plugins/hello.php
ln -s ../../../../vendor/roots/wordpress-full/wp-content/plugins/akismet ./public/wp/wp-content/plugins/akismet

mkdir ./storage/app/wp-uploads
ln -s ../../../storage/app/wp-uploads ./public/wp/wp-content/uploads

mkdir ./storage/app/wp-languages
ln -s ../../../storage/app/wp-languages ./public/wp/wp-content/languages
