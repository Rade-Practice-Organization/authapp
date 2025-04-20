<?php

namespace App\Models;

use Database\Factories\OrganizationUsersFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationUsers extends Model
{
    /** @use HasFactory<OrganizationUsersFactory> */
    use HasFactory;

    protected $fillable = ['organization_id', 'user_id', 'role'];
}
