@extends('layouts.main')

@section('container')
<div class="container">
    <h3 class="mb-4">Daftar Semua Booking</h3>

    @if ($bookings->isEmpty())
        <div class="alert alert-info">Belum ada booking.</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover small">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Pengguna</th>
                        <th>Nama Paket</th>
                        <th>Guide</th>
                        <th>Tanggal Berangkat</th>
                        <th>Jumlah Orang</th>
                        <th>Status</th>
                        <th>Dipesan Pada</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $index => $booking)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $booking->pengguna->nama }}</td>
                            <td>{{ $booking->paket->nama_paket }}</td>
                            <td>{{ $booking->guide->nama ?? '-' }}</td>
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
                            <td class="d-flex gap-1">
                                @if ($booking->status === 'pending')
                                    <form action="{{ route('booking.updateStatus', ['id' => $booking->id, 'status' => 'confirmed']) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success">Konfirmasi</button>
                                    </form>
                                    <form action="{{ route('booking.updateStatus', ['id' => $booking->id, 'status' => 'batal']) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">Tolak</button>
                                    </form>

                                @elseif ($booking->status === 'confirmed')
                                    <form action="{{ route('booking.updateStatus', ['id' => $booking->id, 'status' => 'done']) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-secondary">Selesai</button>
                                    </form>

                                @else
                                    <span class="text-muted">Sudah diproses</span>
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
