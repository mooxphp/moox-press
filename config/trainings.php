<?php

return [
    'navigation_sort' => 2001,

    // Wire with one or more user models
    'user_models' => [
        'App Users' => \App\Models\User::class,
    ],

    // Disable manual action buttons in UI
    // and queue the provided jobs instead
    'create_trainings_action' => true,
    'collect_invitation_action' => true,
    'send_invitations_action' => true,
];
