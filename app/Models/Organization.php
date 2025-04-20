<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;

class Organization extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains, softDeletes;

    protected $table = 'organizations';

    public static function getCustomColumns() : array
    {
        return ['id', 'name', 'country', 'city', 'address'];
    }

    public static function booted() {
        static::creating(function ($model) {
            $model->id = Uuid::uuid4();
        });
    }
}
