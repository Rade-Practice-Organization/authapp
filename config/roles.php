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
        'super_admin' => ['data:delete', 'data:create'],
        'admin' => ['data:update'],
        'user' => ['data:view'],

        'tenant_super_admin' => ['tenant:admin'],
        'tenant_sales_manager' => ['sales_manager:all'],
        'tenant_developer_admin' => ['developer:create', 'developer:delete'],
        'tenant_developer' => ['developer:view', 'developer:update'],
        'tenant_broker_admin' => ['broker:create', 'broker:delete'],
        'tenant_broker' => ['broker:view', 'broker:update'],
    ],
];
