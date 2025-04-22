<?php

namespace App\Http\Enums\Auth;

enum UserRolesEnum: string
{
    case SUPER_ADMIN = 'super_admin';
    case ADMIN = 'admin';
    case USER = 'user';
    case TENANT_SUPER_ADMIN = 'tenant_super_admin';
    case TENANT_SALES_MANAGER = 'tenant_sales_manager';
    case TENANT_DEVELOPER_ADMIN = 'tenant_developer_admin';
    case TENANT_DEVELOPER = 'tenant_developer';
    case TENANT_BROKER_ADMIN = 'tenant_broker_admin';
    case TENANT_BROKER = 'tenant_broker';

    public static function systemRoles(): array
    {
        return [
            self::SUPER_ADMIN,
            self::ADMIN,
            self::USER,
        ];
    }

    public static function tenantRoles(): array
    {
        return [
            self::TENANT_SUPER_ADMIN,
            self::TENANT_SALES_MANAGER,
            self::TENANT_DEVELOPER_ADMIN,
            self::TENANT_DEVELOPER,
            self::TENANT_BROKER_ADMIN,
            self::TENANT_BROKER,
        ];
    }
}
