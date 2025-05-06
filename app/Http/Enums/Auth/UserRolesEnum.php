<?php

namespace App\Http\Enums\Auth;

enum UserRolesEnum: string
{
    case SUPER_ADMIN = 'SUPER_ADMIN';
    case ADMIN = 'ADMIN';
    case USER = 'USER';
    case TENANT_SUPER_ADMIN = 'TENANT_SUPER_ADMIN';
    case TENANT_SALES_MANAGER = 'TENANT_SALES_MANAGER';
    case TENANT_DEVELOPER_ADMIN = 'TENANT_DEVELOPER_ADMIN';
    case TENANT_DEVELOPER = 'TENANT_DEVELOPER';
    case TENANT_BROKER_ADMIN = 'TENANT_BROKER_ADMIN';
    case TENANT_BROKER = 'TENANT_BROKER';

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
