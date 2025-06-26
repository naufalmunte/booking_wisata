@extends('layouts.main')

@section('container')
<div class="container">
    <h3 class="mb-4">Daftar Booking Saya</h3>

    @if ($bookings->isEmpty())
        <div class="alert alert-info">Belum ada booking.</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama Paket</th>
                        <th>Tanggal Berangkat</th>
                        <th>Jumlah Orang</th>
                        <th>Status</th>
                        <th>Waktu Booking</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $index => $booking)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $booking->paket->nama_paket }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->tanggal_berangkat)->format('d M Y') }}</td>
                            <td>{{ $booking->jumlah_orang }}</td>
                            <td>
                                <span class="badge 
                                    @if($booking->status == 'pending') bg-warning
                                    @elseif($booking->status == 'confirmed') bg-success
                                    @else bg-danger @endif">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </td>
                            <td>{{ $booking->created_at->format('d M Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
