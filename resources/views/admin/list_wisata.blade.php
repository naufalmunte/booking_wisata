@extends('layouts.main')
@section('navList', 'active')

@section('container')
<div class="container py-4 mt-5">

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm border-0 rounded-4">
        <h2 class="mb-4 text-center pt-4 fw-bold">Daftar Paket Wisata</h2>

        <div class="card-body">
            @if ($paketWisatas->isEmpty())
                <p class="text-center text-muted">Belum ada paket wisata yang tersedia.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover small align-middle">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama Paket</th>
                                <th>Lokasi</th>
                                <th>Harga/Orang</th>
                                <th>Durasi</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paketWisatas as $index => $paket)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td>{{ $paket->nama_paket }}</td>
                                    <td>{{ $paket->lokasi }}</td>
                                    <td>Rp {{ number_format($paket->harga_per_orang, 0, ',', '.') }}</td>
                                    <td>{{ $paket->durasi_hari }} hari</td>
                                    <td class="text-center">
                                        @if ($paket->gambar)
                                            <img src="{{ asset('storage/' . $paket->gambar) }}" 
                                                 alt="Gambar" width="80" height="50" 
                                                 style="object-fit: cover;">
                                        @else
                                            <span class="text-muted">Tidak ada</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-1">
                                            <a href="{{ route('admin.wisata.edit', $paket->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('admin.wisata.destroy', $paket->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
