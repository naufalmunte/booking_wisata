@extends('layouts.main')
@section('navInput', 'active')

@section('container')
<div class="container mt-5 pb-5">
    <h2 class="mb-4 text-center">Tambah Paket Wisata</h2>

   @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
 </div>
 @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('wisata.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="nama_paket" class="form-label">Nama Paket</label>
                    <input type="text" name="nama_paket" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="harga_per_orang" class="form-label">Harga per Orang</label>
                        <input type="number" name="harga_per_orang" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="durasi_hari" class="form-label">Durasi (hari)</label>
                        <input type="number" name="durasi_hari" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="lokasi" class="form-label">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" required>
                </div>

                <div class="mb-4">
                    <label for="gambar" class="form-label">Gambar (opsional)</label>
                    <input type="file" name="gambar" class="form-control">
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Simpan Paket</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
