<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',      // ← tambahkan ini
    ];

    protected $hidden = ['password', 'remember_token'];

    // ← tambahkan method ini
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}
