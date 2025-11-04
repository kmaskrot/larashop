<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\HasSlug;
use App\Traits\HasUuid;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasUuid, HasSlug;

    protected static function boot(): void
    {
        parent::boot();
        static::bootHasUuid();
        static::bootHasSlug();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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

    /**
     * @return HasMany
     */
    public function payments() : HasMany
    {
        return $this->hasMany(UserPayment::class);
    }

    /**
     * @return HasMany
     */
    public function addresses() : HasMany
    {
        return $this->hasMany(UserAddress::class, 'user_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function orders() : HasMany
    {
        return $this->hasMany(UserOrder::class);
    }

    /**
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return ucfirst($this->firstname) . ' ' . ucfirst($this->lastname);
    }


}
