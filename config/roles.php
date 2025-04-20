<?php

return [
    'role_hierarchy' => [
        'super-admin' => ['admin', 'user'],
        'admin' => ['user'],
        'user' => [],

        'tenant_super-admin' => ['tenant_sales_manager'],
        'tenant_sales_manager' => ['tenant_developer_admin'],
        'tenant_developer_admin' => ['tenant_developer'],
        'tenant_developer' => ['tenant_broker_admin', 'tenant_developer'],
        'tenant_broker_admin' => ['tenant_broker_admin'],
        'tenant_broker' => [],
    ],

    'abilities' => [
        'super-admin' => ['data:update', 'data:delete', 'data:view', 'data:create'],
        'admin' => ['data:update', 'data:view'],
        'user' => ['data:view'],

        'tenant_super-admin' => ['tenant:admin'],
        'tenant_sales_manager' => ['sales_manager:all'],
        'tenant_developer_admin' => ['developer:create', 'developer:delete'],
        'tenant_developer' => ['developer:view', 'developer:update'],
        'tenant_broker_admin' => ['broker:create', 'broker:delete'],
        'tenant_broker' => ['broker:view', 'broker:update'],
    ],
];
