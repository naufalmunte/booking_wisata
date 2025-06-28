@extends('layouts.main')

@section('container')
<div class="container py-4 mt-5">
    <h2 class="mb-4 text-center">Daftar Guide Wisata</h2>

    @if ($guides->isEmpty())
        <div class="alert alert-info text-center">Belum ada guide yang tersedia.</div>
    @else
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($guides as $guide)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        @if ($guide->gambar)
                            <img src="{{ asset('storage/' . $guide->gambar) }}" 
                                 class="card-img-top" 
                                 alt="Foto {{ $guide->nama }}" 
                                 style="height: 200px; object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/300x200?text=No+Image" 
                                 class="card-img-top" 
                                 alt="No image">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $guide->nama }}</h5>
                        </div>
                        <div class="card-footer">
                            <p class="card-text mb-1">
                                <strong>No HP:</strong> {{ $guide->no_hp }}
                            </p>
                            <p class="card-text mb-1">
                                <strong>Email:</strong> {{ $guide->email }}
                            </p>
                            <p class="card-text mb-1">
                                <strong>Alamat:</strong> {{ $guide->alamat }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection