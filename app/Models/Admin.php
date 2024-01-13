<?php

namespace App\Models;

use App\Enums\AdminRole;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable implements Authorizable
{
    use Notifiable, HasFactory, HasApiTokens;

    protected $fillable = [
        'username',
        'email',
        'password',
        'phone',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'activated'=> 'boolean'
    ];

    //scope
    public function scopeSupervisors(Builder $query): void
    {
        $query->where('role', AdminRole::SUPERVISOR->value);
    }
}
