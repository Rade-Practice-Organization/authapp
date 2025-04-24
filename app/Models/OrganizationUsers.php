<?php

namespace App\Models;

use Database\Factories\OrganizationUsersFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Ramsey\Uuid\Uuid;

class OrganizationUsers extends Model
{
    /** @use HasFactory<OrganizationUsersFactory> */
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['organization_id', 'user_id', 'role'];

    public static function booted(): void
    {
        static::creating(static function ($model) {
            $model->id = Uuid::uuid4();
        });
    }

    public function organization(): BelongsToMany
    {
        return $this->belongsToMany(Organization::class);
    }
    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
