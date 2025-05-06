<?php

namespace App\Http\Enums\Auth;

enum UserTypeEnum: string
{
    case SYSTEM_USER = 'SYSTEM_USER';
    case TENANT_USER = 'TENANT_USER';

}
