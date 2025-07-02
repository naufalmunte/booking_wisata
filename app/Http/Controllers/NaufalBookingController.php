<?php

namespace App\Http\Controllers;
use App\Models\NaufalBooking;
use App\Models\NaufalPaketWisata;
use App\Models\NaufalGuide;
use App\Mail\BookingConfirmedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NaufalBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
           $userId = auth()->user()->id;

    $bookings = \App\Models\NaufalBooking::with(['paket', 'guide']) // tambahkan relasi guide jika diperlukan di view
        ->where('pengguna_id', $userId)
        ->orderBy('created_at', 'desc')
        ->get();

    return view('wisata.daftar_booking', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($paket_id)
    {
        $paket = NaufalPaketWisata::findOrFail($paket_id);
         $guides = NaufalGuide::all();
        return view('wisata.booking', compact('paket', 'guides'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'paket_id' => 'required|exists:naufal_paket_wisatas,id',
            'jumlah_orang' => 'required|integer|min:1',
            'tanggal_berangkat' => 'required|date|after_or_equal:today',
            'guide_id' => 'required|exists:naufal_guides,id',
        ]);

        $validated['pengguna_id'] = auth()->id();
        $validated['status'] = 'pending';

        \App\Models\NaufalBooking::create($validated);

        return redirect()->route('booking.user')->with('success', 'Booking berhasil dikirim!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function adminIndex()
    {
        $bookings = NaufalBooking::with(['pengguna', 'paket'])->latest()->get();
        return view('admin.booking_index', compact('bookings'));
    }

    public function updateStatus($id, $status)
    {
        $booking = NaufalBooking::with('pengguna')->findOrFail($id);

        if (!in_array($status, ['confirmed', 'batal', 'done'])) {
            return back()->with('error', 'Status tidak valid.');
        }

        $booking->status = $status;
        $booking->save();

        // Kirim email hanya jika status diubah menjadi confirmed
        if ($status === 'confirmed' && $booking->pengguna && $booking->pengguna->email) {
            Mail::to($booking->pengguna->email)->send(new BookingConfirmedMail($booking));
        }

        return back()->with('success', 'Status booking berhasil diperbarui.');
    }


}
