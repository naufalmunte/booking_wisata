@extends('layouts.main')

@section('container')
<div class="container py-5 mt-5 mb-4">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body px-4 py-4">
                    <div class="text-center mb-3">
                        <img src="{{ asset('image/lasax2.jpg') }}" alt="Logo" width="160" class="mb-2">
                        <h4 class="fw-bold text-dark mb-1">Daftar Pengguna</h4>
                        <p class="text-muted small mb-0">Silakan lengkapi data berikut untuk mendaftar</p>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger small mb-3">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('pengguna.daftar') }}" method="POST" class="mt-2">
                        @csrf

                        {{-- Nama --}}
                        <div class="mb-2">
                            <label for="nama" class="form-label small fw-semibold">Nama Lengkap</label>
                            <input type="text" name="nama" id="nama" class="form-control form-control-sm rounded-3 shadow-sm" value="{{ old('nama') }}" required placeholder="Masukkan nama lengkap">
                        </div>

                        {{-- Email --}}
                        <div class="mb-2">
                            <label for="email" class="form-label small fw-semibold">Email</label>
                            <input type="email" name="email" id="email" class="form-control form-control-sm rounded-3 shadow-sm" value="{{ old('email') }}" required placeholder="Masukkan email aktif">
                        </div>

                        {{-- Password --}}
                        <div class="mb-2">
                            <label for="password" class="form-label small fw-semibold">Kata Sandi</label>
                            <input type="password" name="password" id="password" class="form-control form-control-sm rounded-3 shadow-sm" required placeholder="Buat kata sandi">
                        </div>

                        {{-- Konfirmasi Password --}}
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label small fw-semibold">Konfirmasi Kata Sandi</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-sm rounded-3 shadow-sm" required placeholder="Ulangi kata sandi">
                        </div>

                        {{-- Tombol Daftar --}}
                        <button type="submit" class="btn btn-primary w-100 rounded-3 shadow-sm">Daftar</button>
                    </form>
                    <div class="text-center mt-3">
                        <small class="text-muted">Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none">Masuk di sini</a></small>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
