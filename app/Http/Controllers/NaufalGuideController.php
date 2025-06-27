<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NaufalGuide;
use Illuminate\Support\Facades\Storage;

class NaufalGuideController extends Controller
{
    // Tampilkan semua guide
    public function index()
    {
        $guides = NaufalGuide::all();
        return view('admin.guide.index', compact('guides'));
    }

    // Form tambah guide
    public function create()
    {
        return view('admin.guide.create');
    }

    // Simpan guide baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'email' => 'required|email|unique:naufal_guides,email',
            'alamat' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('gambar_guide', 'public');
        }

        NaufalGuide::create($validated);

        return redirect()->route('admin.guides.index')->with('success', 'Guide berhasil ditambahkan.');
    }

    // Form edit guide
    public function edit($id)
    {
        $guide = NaufalGuide::findOrFail($id);
        return view('admin.guide.edit', compact('guide'));
    }

    // Update guide
    public function update(Request $request, $id)
    {
        $guide = NaufalGuide::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'email' => 'required|email|unique:naufal_guides,email,' . $guide->id,
            'alamat' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($guide->gambar && Storage::disk('public')->exists($guide->gambar)) {
                Storage::disk('public')->delete($guide->gambar);
            }

            $validated['gambar'] = $request->file('gambar')->store('gambar_guide', 'public');
        }

        $guide->update($validated);

        return redirect()->route('admin.guides.index')->with('success', 'Guide berhasil diperbarui.');
    }

    // Hapus guide
    public function destroy($id)
    {
        $guide = NaufalGuide::findOrFail($id);

        // Hapus gambar jika ada
        if ($guide->gambar && Storage::disk('public')->exists($guide->gambar)) {
            Storage::disk('public')->delete($guide->gambar);
        }

        $guide->delete();

        return redirect()->route('admin.guides.index')->with('success', 'Guide berhasil dihapus.');
    }
}

