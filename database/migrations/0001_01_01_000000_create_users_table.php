<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // Pastikan baris ini ada!

class User extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable; // Tambahkan HasApiTokens di sini

    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'role', // Tambahkan kolom role di sini
    ];

    protected $hidden = [
        'password', 
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}