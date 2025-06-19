<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\NaufalPaketWisata;

class NaufalPaketWisata extends Model
{
    protected $table = 'naufal_paket_wisatas';

    protected $fillable = [
        'nama_paket', 'deskripsi', 'harga_per_orang',
        'durasi_hari', 'lokasi', 'gambar'
    ];

    public function bookings()
    {
        return $this->hasMany(NaufalBooking::class, 'paket_id');
    }
}

