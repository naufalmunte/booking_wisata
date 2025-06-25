@extends('layouts.main')

@section('container')

{{-- SECTION 1: Logo + Visi Misi --}}
<section class="min-vh-100 d-flex align-items-center" style="background-color: #e3f2fd;">
    <div class="row g-0 w-100 m-0 align-items-center">
        {{-- Kolom Logo --}}
        <div class="col-md-6 d-flex justify-content-center align-items-center p-0">
            <img src="{{ asset('image/lasax3.png') }}" alt="Logo" class="img-fluid" style="max-width: 70%;">
        </div>

        {{-- Kolom Teks --}}
        <div class="col-md-6 d-flex flex-column justify-content-center px-4 py-3">
            <h1 class="fw-bold mb-1 fs-3">Jelajahi Keindahan Sumatera Barat Bersama Kami!</h1>
            <p>Lasax Adventure adalah penyedia jasa open trip terpercaya yang berfokus pada destinasi wisata alam, budaya, dan petualangan di Sumatera Barat. Kami hadir untuk memudahkan para pencinta traveling, backpacker, hingga keluarga yang ingin menjelajahi keindahan ranah Minang tanpa repot mengatur sendiri perjalanan.</p>
            <h2 class="fw-bold mb-3 fs-5">Mengapa Pilih Lasax Adventure?</h2>
            <ul class="list-unstyled">
                <li>✔ Tim lokal berpengalaman & ramah</li>
                <li>✔ Menawarkan paket wisata yang menarik dan harga terjangkau</li>
                <li>✔ Dokumentasi profesional (foto/video)</li>
            </ul>
            <p>Mari jelajahi tanah Minang lebih dalam kenali budaya, nikmati kuliner khas, dan abadikan momen-momen tak terlupakan bersama Lasax Adventure!</p>
             @auth
            <div>
            <h2 class="fw-bold mb-3 fs-5 font-size: 1rem;">Cek Langsung Paket Wisata Dibawah Ini!!!</h2>
            </div>
             @endauth
            @guest
            <div class="d-flex gap-2 mt-3">
                <a href=""
                class="btn w-auto px-4 py-2 fw-semibold rounded-3"
                style="background-color: #00BFA6; color: black; font-size: 0.95rem; transition: 0.3s;"
                onmouseover="this.style.color='white'"
                onmouseout="this.style.color='black'">
                    Daftar Akun
                </a>
            </div>
            
             @endguest
            

        </div>
    </div>
</section>

{{-- SECTION 2: Daftar Paket Wisata --}}
<section id="daftarPaket" class="py-4" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="card shadow-sm rounded-4 border-0">
            <div class="card-body px-4 py-3">
                <h2 class="mb-4 text-center fw-bold">Daftar Paket Wisata</h2>

                @if ($paketwisata->isEmpty())
                    <div class="alert alert-info text-center">Tidak ada data paket wisata.</div>
                @else
                    <div class="row g-3">
                        @foreach ($paketwisata as $paket)
                            <div class="col-md-4">
                                <div class="card h-100 shadow-sm border border-dark rounded-4">
                                    @if ($paket->gambar)
                                        <img src="{{ asset('storage/' . $paket->gambar) }}" 
                                             class="card-img-top rounded-top-4" 
                                             style="aspect-ratio: 16/9; object-fit: cover;" 
                                             alt="Gambar {{ $paket->nama_paket }}">
                                    @else
                                        <img src="https://via.placeholder.com/400x200?text=No+Image" 
                                             class="card-img-top rounded-top-4" 
                                             style="aspect-ratio: 16/9; object-fit: cover;" 
                                             alt="Tidak ada gambar">
                                    @endif

                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title fw-bold">{{ $paket->nama_paket }}</h5>
                                        <p class="card-text text-muted mb-1">{{ $paket->lokasi }}</p>
                                        <p class="card-text text-muted mb-1">Durasi: {{ $paket->durasi_hari }} Hari</p>
                                        <p class="card-text fw-bold text-success mb-3">
                                            Rp {{ number_format($paket->harga_per_orang, 0, ',', '.') }} / orang
                                        </p>
                                        <div class="d-flex gap-2 mt-auto">
                                            <a href="{{ route('wisata.detail', $paket->id) }}" class="btn btn-info">Lihat Detail</a>
                                            <a href="#" class="btn btn-success w-50">Booking</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="d-flex justify-content-end mt-5 pe-2">
                {{ $paketwisata->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</section>

@endsection
