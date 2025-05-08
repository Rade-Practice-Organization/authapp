<?php

return [
    'role_hierarchy' => [
        'SUPER_ADMIN' => ['ADMIN', 'USER'],
        'ADMIN' => ['USER'],
        'USER' => [],

        'TENANT_SUPER_ADMIN' => ['TENANT_SALES_MANAGER'],
        'TENANT_SALES_MANAGER' => ['TENANT_DEVELOPER_ADMIN'],
        'TENANT_DEVELOPER_ADMIN' => ['TENANT_DEVELOPER'],
        'TENANT_DEVELOPER' => ['TENANT_BROKER_ADMIN'],
        'TENANT_BROKER_ADMIN' => ['TENANT_BROKER'],
        'TENANT_BROKER' => [],
    ],

    'abilities' => [
        'SUPER_ADMIN' => ['data:delete', 'data:create'],
        'ADMIN' => ['data:update'],
        'USER' => ['data:view'],

        'TENANT_SUPER_ADMIN' => ['tenant:admin'],
        'TENANT_SALES_MANAGER' => ['sales_manager:all'],
        'TENANT_DEVELOPER_ADMIN' => ['developer:create', 'developer:delete'],
        'TENANT_DEVELOPER' => ['developer:view', 'developer:update'],
        'TENANT_BROKER_ADMIN' => ['broker:create', 'broker:delete'],
        'TENANT_BROKER' => ['broker:view', 'broker:update'],
    ],
];
