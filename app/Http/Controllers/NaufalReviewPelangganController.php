<?php

namespace App\Http\Controllers;

use App\Models\NaufalBooking;
use App\Models\NaufalReviewPelanggan;
use Illuminate\Http\Request;

class NaufalReviewPelangganController extends Controller
{
    public function index()
    {
        $reviews = NaufalReviewPelanggan::with(['booking.paket', 'booking.guide', 'booking.pengguna'])
            ->latest()
            ->get();

        return view('wisata.review', compact('reviews'));
    }

    public function create($booking_id)
    {
        $booking = NaufalBooking::with(['paket', 'guide', 'pengguna'])->findOrFail($booking_id);

        if ($booking->pengguna_id !== auth()->id()) {
            abort(403, 'Akses ditolak');
        }

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
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Cegah review duplikat
        if (NaufalReviewPelanggan::where('booking_id', $request->booking_id)->exists()) {
            return redirect()->route('booking.user')->with('error', 'Review sudah pernah diberikan.');
        }

        $review = new NaufalReviewPelanggan();
        $review->booking_id = $request->booking_id;
        $review->rating = $request->rating;
        $review->komentar = $request->komentar;

        // Upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/review'), $filename);
            $review->gambar = $filename;
        }

        $review->save();

        return redirect()->route('booking.user')->with('success', 'Terima kasih atas ulasannya!');
    }
}
