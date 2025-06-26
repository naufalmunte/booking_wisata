@extends('layouts.main')

@section('container')
<div class="container">
    <h2 class="mb-4">Booking: {{ $paket->nama_paket }}</h2>

    <form action="{{ url('/booking') }}" method="POST">
        @csrf
        <input type="hidden" name="paket_id" value="{{ $paket->id }}">

        <div class="mb-3">
            <label for="jumlah_orang">Jumlah Orang</label>
            <input type="number" name="jumlah_orang" class="form-control" required min="1">
        </div>

        <div class="mb-3">
            <label for="tanggal_berangkat">Tanggal Berangkat</label>
            <input type="date" name="tanggal_berangkat" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="catatan">Catatan (Opsional)</label>
            <textarea name="catatan" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Kirim Booking</button>
    </form>
</div>
@endsection
