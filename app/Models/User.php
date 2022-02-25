<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function checkRoles($roles)
    {

        if (is_array($roles)) {
            return $this->hasAnyRole($roles) || abort(404);
        }

        return $this->hasRole($roles) || abort(404);
    }

    public function hasAnyRole($roles): bool
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    public function hasRole($role): bool
    {
        return null !== $this->roles()->where('name', $role)->first();
    }
}
