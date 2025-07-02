@extends('layouts.main')

@section('container')
<div class="container mt-4">
    <h3 class="mb-4">Beri Review untuk: <strong>{{ $booking->paket->nama_paket }}</strong></h3>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('review.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="booking_id" value="{{ $booking->id }}">

        <div class="mb-3">
            <label for="rating" class="form-label">Rating (1 - 5)</label>
            <input type="number" name="rating" class="form-control" min="1" max="5"
                   value="{{ old('rating') }}" required>
        </div>

        <div class="mb-3">
            <label for="komentar" class="form-label">Komentar</label>
            <textarea name="komentar" class="form-control" rows="4" required>{{ old('komentar') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Upload Gambar</label>
            <input type="file" name="gambar" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Kirim Review</button>
    </form>
</div>
@endsection
