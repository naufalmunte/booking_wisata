@extends('layouts.main')

@section('container')
<div class="container py-4 mt-5">
    <h3 class="mb-4">Daftar Booking Saya</h3>

    @if ($bookings->isEmpty())
        <div class="alert alert-info">Belum ada booking.</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover small align-middle">
                <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Paket</th>
                    <th>Guide</th> {{-- Tambahkan kolom ini --}}
                    <th>Tanggal Berangkat</th>
                    <th>Jumlah Orang</th>
                    <th>Status</th>
                    <th>Waktu Booking</th>
                    <th>Review</th>
                </tr>
            </thead>
            <tbody>
             @foreach ($bookings as $index => $booking)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $booking->paket->nama_paket }}</td>
                    <td>{{ $booking->guide->nama ?? '-' }}</td> {{-- Tampilkan nama guide --}}
                    <td>{{ \Carbon\Carbon::parse($booking->tanggal_berangkat)->format('d M Y') }}</td>
                    <td>{{ $booking->jumlah_orang }}</td>
                    <td>
                        <span class="badge 
                            @if($booking->status == 'pending') bg-warning
                            @elseif($booking->status == 'confirmed') bg-success
                            @elseif($booking->status == 'done') bg-success
                            @else bg-danger @endif">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </td>
                    <td>{{ $booking->created_at->format('d M Y H:i') }}</td>
                    <td>
    @if ($booking->status === 'done')
        @if ($booking->review)
            <span class="text-success">Terima Kasih</span>
        @else
            <a href="{{ route('review.create', $booking->id) }}" class="btn btn-sm btn-primary">
                Beri Review
            </a>
        @endif
    @else
        <button class="btn btn-sm btn-secondary" disabled>Belum Selesai</button>
    @endif
</td>

                </tr>
            @endforeach
        </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
