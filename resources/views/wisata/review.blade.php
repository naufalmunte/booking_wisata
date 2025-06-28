@extends('layouts.main')

@section('container')
<div class="container py-4 mt-5">
    <h3 class="mb-4">Review Pelanggan</h3>

    @if ($reviews->isEmpty())
        <div class="alert alert-info">Belum ada review dari pelanggan.</div>
    @else
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach ($reviews as $review)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $review->booking->paket->nama_paket }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Guide: {{ $review->booking->guide->nama ?? '-' }} | 
                                Pelanggan: {{ $review->booking->pengguna->nama }}
                            </h6>
                            <p class="card-text mt-3">{{ $review->isi_review }}</p>
                        </div>
                        <div class="card-footer text-end">
                            <small class="text-muted">Dikirim pada {{ $review->created_at->format('d M Y H:i') }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
