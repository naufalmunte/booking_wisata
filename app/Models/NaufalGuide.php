<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NaufalGuide extends Model
{
    use HasFactory;

    protected $table = 'naufal_guides';

    protected $fillable = [
        'nama',
        'no_hp',
        'email',
        'alamat',
        'gambar',
    ];

    public function bookings()
    {
        return $this->hasMany(NaufalBooking::class, 'guide_id');
    }
}
