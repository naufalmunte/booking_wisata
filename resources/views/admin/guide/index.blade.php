@extends('layouts.main')

@section('container')
<div class="container py-4">
    <h3 class="mb-4">Daftar Guide</h3>

    <a href="{{ route('admin.guides.create') }}" class="btn btn-primary mb-3">+ Tambah Guide</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($guides->isEmpty())
        <div class="alert alert-info">Belum ada guide yang terdaftar.</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>No HP</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($guides as $index => $guide)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                @if($guide->gambar)
                                    <img src="{{ asset('storage/' . $guide->gambar) }}" width="70" class="rounded">
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>{{ $guide->nama }}</td>
                            <td>{{ $guide->no_hp }}</td>
                            <td>{{ $guide->email }}</td>
                            <td>{{ $guide->alamat }}</td>
                            <td>
                                <a href="{{ route('admin.guides.edit', $guide->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                
                                <form action="{{ route('admin.guides.destroy', $guide->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus guide ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
