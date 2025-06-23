<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class NaufalPengguna extends Authenticatable
{
    use HasFactory;
    protected $table = 'naufal_penggunas';

    protected $fillable = [
        'nama', 'email', 'password', 'role'
    ];

     protected $hidden = [
        'password',
    ];

    public function bookings()
    {
        return $this->hasMany(NaufalBooking::class, 'pengguna_id');
    }
}

