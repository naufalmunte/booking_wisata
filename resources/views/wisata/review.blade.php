@extends('layouts.main')

@section('container')
<div class="container py-4 mt-5">
    <h3 class="mb-4">Ulasan Pelanggan</h3>

    @if ($reviews->isEmpty())
        <div class="alert alert-info">Belum ada review.</div>
    @else
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach ($reviews as $review)
                <div class="col">
                    <div class="card shadow-sm p-3 h-100">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            {{-- Nama Pelanggan Disamarkan --}}
                            @php
                                $namaLengkap = $review->booking->pengguna->nama ?? 'Pelanggan';
                                $namaSingkat = strlen($namaLengkap) > 2
                                    ? substr($namaLengkap, 0, 1) . str_repeat('*', strlen($namaLengkap) - 2) . substr($namaLengkap, -1)
                                    : $namaLengkap;
                            @endphp
                            <strong>{{ $namaSingkat }}</strong>

                            {{-- Bintang Rating --}}
                            <div class="text-warning">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="bi {{ $i <= $review->rating ? 'bi-star-fill' : 'bi-star' }}"></i>
                                @endfor
                            </div>
                        </div>

                        {{-- Waktu Review --}}
                        <small class="text-muted">{{ $review->created_at->format('Y-m-d H:i') }}</small>

                        {{-- Info Guide & Paket --}}
                        <div class="my-2">
                            <strong>Paket:</strong> {{ $review->booking->paket->nama_paket ?? '-' }} | Durasi: {{ $review->booking->paket->durasi_hari ?? '-'}} Hari | Lokasi: {{ $review->booking->paket->lokasi ?? '-' }}. <br>
                            <strong>Guide:</strong> {{ $review->booking->guide->nama ?? '-' }}
                        </div>

                        {{-- Komentar --}}
                        <p class="mb-2">Komentar: {{ $review->komentar }}</p>

                        {{-- Gambar jika ada --}}
                        @if ($review->gambar)
                            <img src="{{ asset('storage/review/' . $review->gambar) }}"
                                 alt="Foto review"
                                 class="img-fluid rounded"
                                 style="max-height: 200px; max-width: 200px;">
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
