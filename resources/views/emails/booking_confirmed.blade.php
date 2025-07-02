@component('mail::message')
# Booking Dikonfirmasi

Halo {{ $booking->pengguna->nama }},

Booking Anda untuk paket **{{ $booking->paket->nama_paket }}** pada tanggal **{{ \Carbon\Carbon::parse($booking->tanggal_berangkat)->format('d M Y') }}** telah dikonfirmasi.

Kami tidak sabar untuk menjelajah bersama Anda!

@component('mail::button', ['url' => url('/')])
Lihat Website
@endcomponent

Terima kasih,<br>
**Tim Lasax Adventure**
@endcomponent
