@extends('layouts.main')

@section('container')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="mb-4 text-center">Daftar Paket Wisata</h2>

            @if ($paketWisata->isEmpty())
                <div class="alert alert-info text-center">Tidak ada data paket wisata.</div>
            @else
                <div class="row">
                    @foreach ($paketWisata as $paket)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 shadow-sm">
                                @if ($paket->gambar)
                                    <img src="{{ asset('storage/' . $paket->gambar) }}" class="card-img-top" alt="Gambar {{ $paket->nama_paket }}">
                                @else
                                    <img src="https://via.placeholder.com/400x200?text=No+Image" class="card-img-top" alt="Tidak ada gambar">
                                @endif

                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $paket->nama_paket }}</h5>
                                    <p class="card-text text-muted mb-1">{{ $paket->lokasi }}</p>
                                    <p class="card-text fw-bold text-success mb-2">Rp {{ number_format($paket->harga_per_orang, 0, ',', '.') }} / orang</p>
                                    <p class="card-text">{{ Str::limit($paket->deskripsi, 80) }}</p>
                                    <div class="mt-auto">
                                        <a href="" class="btn btn-primary w-100">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
