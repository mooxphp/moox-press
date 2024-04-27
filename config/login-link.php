<?php

return [
    'navigation_sort' => 2001,
    'expiration_time' => 24, // hours
    'user_models' => [
        'App Users' => \App\Models\User::class,
        'Moox WpUsers' => \Moox\Press\Models\WpUser::class,
    ],
];
