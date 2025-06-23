<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NaufalPaketWisata;


class NaufalPaketWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paketWisata = NaufalPaketWisata::all();
        return view('wisata.index', compact('paketWisata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_paket' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga_per_orang' => 'required|numeric',
            'durasi_hari' => 'required|integer',
            'lokasi' => 'required|string|max:255',
            'gambar' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            // Simpan ke public/storage/gambar
            $gambarPath = $request->file('gambar')->store('gambar', 'public');
            $validated['gambar'] = $gambarPath;
        }

        \App\Models\NaufalPaketWisata::create($validated);

        return redirect('/paket-wisata')->with('success', 'Paket wisata berhasil ditambahkan!');
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
}
