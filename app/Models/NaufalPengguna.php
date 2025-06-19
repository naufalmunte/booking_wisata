<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class NaufalPengguna extends Authenticatable
{
    protected $table = 'naufal_penggunas';

    protected $fillable = [
        'nama', 'email', 'password', 'role'
    ];

    public function bookings()
    {
        return $this->hasMany(NaufalBooking::class, 'pengguna_id');
    }
}

