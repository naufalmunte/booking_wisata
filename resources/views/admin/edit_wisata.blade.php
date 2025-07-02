@extends('layouts.main')

@section('container')
<div class="container mt-5 pb-5">

    @if ($errors->any())
        <div class="alert alert-danger shadow-sm rounded-3">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-0 shadow-lg rounded-4">
        <div class="card-body p-4">
            <h2 class="mb-4 text-center fw-bold text-dark">Edit Paket Wisata</h2>
            <form action="{{ route('admin.wisata.update', $paket->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="nama_paket" class="form-label fw-semibold">Nama Paket</label>
                    <input type="text" name="nama_paket" class="form-control form-control-lg rounded-3" value="{{ $paket->nama_paket }}" required>
                </div>

                <div class="mb-4">
                    <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control rounded-3" rows="4" required>{{ $paket->deskripsi }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label for="harga_per_orang" class="form-label fw-semibold">Harga per Orang</label>
                        <input type="number" name="harga_per_orang" class="form-control rounded-3" value="{{ $paket->harga_per_orang }}" required>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="durasi_hari" class="form-label fw-semibold">Durasi (hari)</label>
                        <input type="number" name="durasi_hari" class="form-control rounded-3" value="{{ $paket->durasi_hari }}" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="lokasi" class="form-label fw-semibold">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control rounded-3" value="{{ $paket->lokasi }}" required>
                </div>

                <div class="mb-4">
                    <label for="gambar" class="form-label fw-semibold">Gambar</label>
                    <input type="file" name="gambar" class="form-control rounded-3">
                    
                    @if ($paket->gambar)
                        <div class="mt-3">
                            <label class="form-label">Gambar Saat Ini:</label>
                            <div>
                                <img src="{{ asset('storage/' . $paket->gambar) }}" alt="Gambar Saat Ini" class="img-fluid img-thumbnail" style="max-width: 250px;">
                            </div>
                        </div>
                    @endif
                </div>
               <div class="text-end">
    <button type="submit"
            class="btn fw-semibold px-4 py-2 rounded-pill"
            style="background-color: #00BFA6; color: black; font-size: 0.95rem; transition: 0.3s;"
            onmouseover="this.style.color='white'"
            onmouseout="this.style.color='black'">
        Update
    </button>
</div>
            </form>
        </div>
    </div>
</div>
@endsection
