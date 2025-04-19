<?php

return [
    'role_hierarchy' => [
        'super-admin' => ['admin', 'user'],
        'admin' => ['user'],
        'user' => [],
    ],

    'abilities' => [
        'super-admin' => ['data:update', 'data:delete', 'data:view', 'data:create'],
        'admin' => ['data:update', 'data:view'],
        'user' => ['data:view'],
    ],
];
