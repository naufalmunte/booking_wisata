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
        $paketwisata = NaufalPaketWisata::paginate(6);
        return view('wisata.index', compact('paketwisata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('wisata.create');
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

        return redirect('/wisata')->with('success', 'Paket wisata berhasil ditambahkan!');
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
        $paket = NaufalPaketWisata::findOrFail($id);
        return view('admin.edit_wisata', compact('paket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $paket = NaufalPaketWisata::findOrFail($id);

        $validated = $request->validate([
            'nama_paket' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga_per_orang' => 'required|numeric',
            'durasi_hari' => 'required|integer',
            'lokasi' => 'required|string|max:255',
            'gambar' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('gambar', 'public');
            $validated['gambar'] = $gambarPath;
        }

        $paket->update($validated);

        return redirect()->route('admin.list.wisata')->with('success', 'Paket wisata berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paket = NaufalPaketWisata::findOrFail($id);
        
        // Hapus gambar jika ada
        if ($paket->gambar) {
            \Storage::disk('public')->delete($paket->gambar);
        }

        $paket->delete();

        return redirect()->route('admin.list.wisata')->with('success', 'Paket wisata berhasil dihapus!');
    }


    public function showList()
    {
        $paketWisatas = NaufalPaketWisata::all();
        return view('admin.list_wisata', compact('paketWisatas'));
    }
}
