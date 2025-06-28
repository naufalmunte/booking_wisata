<?php

namespace App\Http\Controllers;

use App\Models\NaufalBooking;
use App\Models\NaufalReviewPelanggan;
use Illuminate\Http\Request;

class NaufalReviewPelangganController extends Controller
{
    public function index()
    {
        $reviews = \App\Models\NaufalReviewPelanggan::with(['booking.paket', 'booking.guide', 'booking.pengguna'])->latest()->get();
        return view('wisata.review', compact('reviews'));
    }
    public function create($booking_id)
    {
        $booking = NaufalBooking::with(['paket', 'guide'])->findOrFail($booking_id);

        // Cek apakah booking milik user yang sedang login
        if ($booking->pengguna_id !== auth()->id()) {
            abort(403, 'Akses ditolak');
        }

        // Cek apakah status sudah done
        if ($booking->status !== 'done') {
            return redirect()->route('booking.user')->with('error', 'Booking belum selesai.');
        }

        return view('wisata.review_form', compact('booking'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:naufal_bookings,id',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'required|string|max:500',
        ]);

        if (NaufalReviewPelanggan::where('booking_id', $request->booking_id)->exists()) {
            return redirect()->route('booking.user')->with('error', 'Review sudah pernah diberikan.');
        }

        NaufalReviewPelanggan::create([
            'booking_id' => $request->booking_id,
            'rating' => $request->rating,
            'komentar' => $request->komentar,
        ]);

        return redirect()->route('booking.user')->with('success', 'Terima kasih atas ulasannya!');
    }
}
