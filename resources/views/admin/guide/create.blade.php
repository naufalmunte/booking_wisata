@extends('layouts.main')

@section('container')
<div class="container py-4">
    <h3 class="mb-4">Tambah Guide Baru</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.guides.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Guide</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control">{{ old('alamat') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Foto Guide</label>
            <input type="file" name="gambar" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.guides.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
