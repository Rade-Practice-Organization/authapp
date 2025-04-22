<?php

namespace App\Http\Enums\Auth;

enum UserTypeEnum: string
{
    case SYSTEM_USER = 'system_user';
    case TENANT_USER = 'tenant_user';

}
