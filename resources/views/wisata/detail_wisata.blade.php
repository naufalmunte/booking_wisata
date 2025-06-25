@extends('layouts.main')

@section('container')
<style>
    .detail-section {
        margin-top: 50px; /* Jarak dari navbar */
        margin-bottom: 80px;
        padding-bottom: 40px;
    }

    .card-custom {
        border-radius: 0.75rem;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }

    .img-small {
        height: 350px;
        object-fit: cover;
        width: 100%;
    }

    @media (max-width: 768px) {
        .img-small {
            height: 200px;
        }
    }
</style>

<div class="container detail-section">
    <div class="card card-custom">
        <div class="row g-0">
            {{-- Gambar --}}
            <div class="col-md-5">
                @if ($paket->gambar)
                    <img src="{{ asset('storage/' . $paket->gambar) }}" class="img-small" alt="{{ $paket->nama_paket }}">
                @else
                    <img src="{{ asset('image/default.jpg') }}" class="img-small" alt="Default Image">
                @endif
            </div>

            {{-- Informasi --}}
            <div class="col-md-7 d-flex align-items-center">
                <div class="p-4 w-100">
                    <h2 class="mb-2">{{ $paket->nama_paket }}</h2>
                    <p class="text-muted">{{ $paket->lokasi }}</p>
                    <p>{{ $paket->deskripsi }}</p>

                    <ul class="list-unstyled mt-3 mb-4">
                        <li><strong>Durasi:</strong> {{ $paket->durasi_hari }} hari</li>
                        <li><strong>Harga per Orang:</strong> Rp{{ number_format($paket->harga_per_orang, 0, ',', '.') }}</li>
                    </ul>

                    <a href="#" class="btn btn-success px-2 py-2">Booking Sekarang</a>
                     <a href="{{ route('wisata.index') }}" class="btn btn-outline-secondary">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
