<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NaufalBooking extends Model
{
    use HasFactory;

    protected $table = 'naufal_bookings';

    protected $fillable = [
        'paket_id',
        'pengguna_id',
        'jumlah_orang',
        'tanggal_berangkat',
        'guide_id',
        'status'
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

    public function guide()
    {
        return $this->belongsTo(NaufalGuide::class, 'guide_id');
    }

}

