<?php

namespace App\Models;

use App\Models\Trait\RoleAbilitiesTrait;
use Database\Factories\TenantUsersFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Ramsey\Uuid\Uuid;

class TenantUsers extends Authenticatable
{
    /** @use HasFactory<TenantUsersFactory> */
    use HasFactory, Notifiable, HasApiTokens, RoleAbilitiesTrait, SoftDeletes;

    protected $keyType = 'string';
    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public static function booted() {
        static::creating(function ($model) {
            $model->id = Uuid::uuid4();
        });
    }

    public function organizationsUsers(): HasMany
    {
        return $this->hasMany(OrganizationUsers::class);
    }
}
