@extends('layouts.main')

@section('container')
<div class="container py-4 mt-5">
    <div class="card shadow rounded-4">
        <div class="card-body p-4">
            <h3 class="mb-4 d-flex align-items-center gap-2">
                <i class="bi bi-calendar-check-fill text-success fs-4"></i>
                Booking: <strong>{{ $paket->nama_paket }}</strong>
            </h3>

            {{-- Tampilkan pesan error validasi jika ada --}}
            @if ($errors->any())
                <div class="alert alert-danger rounded-3">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form Booking --}}
            <form action="{{ url('/booking') }}" method="POST">
                @csrf
                <input type="hidden" name="paket_id" value="{{ $paket->id }}">

                <div class="mb-3">
                    <label for="jumlah_orang" class="form-label">Jumlah Orang</label>
                    <input type="number" name="jumlah_orang" class="form-control rounded-pill" 
                           value="{{ old('jumlah_orang') }}" required min="1">
                </div>

                <div class="mb-3">
                    <label for="tanggal_berangkat" class="form-label">Tanggal Berangkat</label>
                    <input type="date" id="tanggal_berangkat" name="tanggal_berangkat"
                        class="form-control rounded-pill"
                        value="{{ old('tanggal_berangkat') }}" required
                        onfocus="this.showPicker && this.showPicker()"> {{-- Trigger kalender saat fokus --}}
                </div>

<div class="mb-4">
    <label class="form-label fw-semibold">Pilih Guide</label>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach ($guides as $guide)
        <div class="col">
            <label class="card h-100 p-3 position-relative d-flex flex-column justify-content-center align-items-center text-center" style="cursor: pointer;">
                <input type="radio" name="guide_id" value="{{ $guide->id }}"
                       class="form-check-input position-absolute top-0 end-0 m-2"
                       {{ old('guide_id') == $guide->id ? 'checked' : '' }}>

                <img src="{{ asset('storage/' . $guide->gambar) }}" alt="{{ $guide->nama }}"
                     class="rounded-circle mb-2" style="width: 80px; height: 80px; object-fit: cover;">

                <h6 class="mb-0">{{ $guide->nama }}</h6>
            </label>
        </div>
        @endforeach
    </div>
</div>






                <div class="d-flex justify-content-between">
                    <a href="/wisata" class="btn btn-outline-secondary rounded-pill px-4">
                         Kembali
                    </a>
                    <button type="submit" class="btn btn-success rounded-pill px-4">
                        Booking
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
