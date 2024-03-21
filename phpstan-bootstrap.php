<?php

// Needed by Stan, because we are using a class from WordPress without autoloading using Composer
// This class is used in the WordPressUserProvider class to hash and check passwords
require_once __DIR__.'/public/wp/wp-includes/class-phpass.php';
