<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NaufalReviewPelanggan extends Model
{
    protected $table = 'naufal_review_pelanggans';

    protected $fillable = [
        'booking_id', 'rating', 'komentar','gambar'
    ];

    public function booking()
    {
        return $this->belongsTo(NaufalBooking::class, 'booking_id');
    }
}

