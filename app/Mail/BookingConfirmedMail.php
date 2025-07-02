<?php

namespace App\Mail;

use App\Models\NaufalBooking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingConfirmedMail extends Mailable
{
        use Queueable, SerializesModels;

    public $booking;

    public function __construct(NaufalBooking $booking)
    {
        $this->booking = $booking;
    }

    public function build()
    {
        return $this->subject('Booking Anda Telah Dikonfirmasi')
                    ->markdown('emails.booking_confirmed');
    }
}
