<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\NaufalPaketWisata;


class NaufalPaketWisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         NaufalPaketWisata::create([
            'nama_paket' => 'Tour Air Terjun Lembah Anai',
            'deskripsi' => 'Wisata ke Lembah Anai, Sumatera Barat',
            'harga_per_orang' => 150000,
            'durasi_hari' => 1,
            'lokasi' => 'Padang Panjang',
            'gambar' => null,
        ]);
    }
}
