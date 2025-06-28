@extends('layouts.main')

@section('container')
<div class="container py-4 mt-5">
    <h2 class="mb-4">Booking: {{ $paket->nama_paket }}</h2>

    {{-- Tampilkan pesan error validasi jika ada --}}
    @if ($errors->any())
        <div class="alert alert-danger">
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
            <input type="number" name="jumlah_orang" class="form-control"
                   value="{{ old('jumlah_orang') }}" required min="1">
        </div>

        <div class="mb-3">
            <label for="tanggal_berangkat" class="form-label">Tanggal Berangkat</label>
            <input type="date" name="tanggal_berangkat" class="form-control"
                   value="{{ old('tanggal_berangkat') }}" required>
        </div>

        <div class="mb-3">
            <label for="guide_id" class="form-label">Pilih Guide</label>
            <select name="guide_id" class="form-select" required>
                <option value="" disabled {{ old('guide_id') ? '' : 'selected' }}>-- Pilih Guide --</option>
                @foreach ($guides as $guide)
                    <option value="{{ $guide->id }}" {{ old('guide_id') == $guide->id ? 'selected' : '' }}>
                        {{ $guide->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Kirim Booking</button>
        <a href="/wisata" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
