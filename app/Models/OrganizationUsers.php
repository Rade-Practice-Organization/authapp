<?php

namespace App\Models;

use Database\Factories\OrganizationUsersFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class OrganizationUsers extends Model
{
    /** @use HasFactory<OrganizationUsersFactory> */
    use HasFactory;

    protected $fillable = ['organization_id', 'user_id', 'role'];

    public function organization(): BelongsToMany
    {
        return $this->belongsToMany(Organization::class);
    }
    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
