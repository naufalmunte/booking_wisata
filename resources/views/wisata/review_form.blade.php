@extends('layouts.main')

@section('container')
<div class="container mt-4">
    <h3 class="mb-4">Beri Review untuk: <strong>{{ $booking->paket->nama_paket }}</strong></h3>

    <form action="{{ route('review.store') }}" method="POST">
        @csrf
        <input type="hidden" name="booking_id" value="{{ $booking->id }}">

        <div class="mb-3">
            <label for="rating" class="form-label">Rating (1 - 5)</label>
            <input type="number" name="rating" class="form-control" min="1" max="5" required>
        </div>

        <div class="mb-3">
            <label for="komentar" class="form-label">Komentar</label>
            <textarea name="komentar" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Kirim Review</button>
    </form>
</div>
@endsection
