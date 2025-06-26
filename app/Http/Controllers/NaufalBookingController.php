<?php

namespace App\Http\Controllers;
use App\Models\NaufalBooking;
use App\Models\NaufalPaketWisata;
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

    $bookings = \App\Models\NaufalBooking::with('paket')
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
        return view('wisata.booking', compact('paket'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'paket_id' => 'required|exists:naufal_paket_wisatas,id',
            'tanggal_berangkat' => 'required|date|after_or_equal:today',
            'jumlah_orang' => 'required|integer|min:1',
        ]);

        NaufalBooking::create([
            'pengguna_id' => Auth::user()->id,
            'paket_id' => $request->paket_id,
            'tanggal_berangkat' => $request->tanggal_berangkat,
            'jumlah_orang' => $request->jumlah_orang,
            'status' => 'pending', // default
        ]);

        return redirect('/wisata')->with('success', 'Booking berhasil dibuat!');
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
        $booking = NaufalBooking::findOrFail($id);

        if (!in_array($status, ['confirmed', 'batal'])) {
            return back()->with('error', 'Status tidak valid.');
        }

        $booking->status = $status;
        $booking->save();

        return back()->with('success', 'Status booking berhasil diperbarui.');
    }


}
