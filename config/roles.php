<?php

return [
    'role_hierarchy' => [
        'super_admin' => ['admin', 'user'],
        'admin' => ['user'],
        'user' => [],

        'tenant_super_admin' => ['tenant_sales_manager'],
        'tenant_sales_manager' => ['tenant_developer_admin'],
        'tenant_developer_admin' => ['tenant_developer'],
        'tenant_developer' => ['tenant_broker_admin', 'tenant_developer'],
        'tenant_broker_admin' => ['tenant_broker_admin'],
        'tenant_broker' => [],
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
