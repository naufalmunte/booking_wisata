<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NaufalBooking extends Model
{
    use HasFactory;

    protected $table = 'naufal_bookings';

    protected $fillable = [
        'pengguna_id', 'paket_id', 'tanggal_berangkat',
        'jumlah_orang', 'status'
    ];

    public function pengguna()
    {
        return $this->belongsTo(NaufalPengguna::class, 'pengguna_id');
    }

    public function paket()
    {
        return $this->belongsTo(NaufalPaketWisata::class, 'paket_id');
    }

    public function review()
    {
        return $this->hasOne(NaufalReviewPelanggan::class, 'booking_id');
    }
}

