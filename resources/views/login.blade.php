@extends('layouts.main')

@section('container')
<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="col-md-5 col-lg-4">
        <div class="card border-0 shadow-lg rounded-4 p-3 mb-3 mt-3">
            <div class="card-body px-4 py-4">
                @if (session('success'))
                    <div class="alert alert-success text-center small mb-3">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="text-center mb-3">
                    <img src="{{ asset('image/lasax2.jpg') }}" alt="Logo" width="160" class="mb-2">
                    <h4 class="fw-bold text-dark mb-1">Login Pengguna</h4>
                    <p class="text-muted small mb-0">Masuk untuk melanjutkan ke akun Anda</p>
                </div>
                @if (session('error'))
                    <div class="alert alert-danger text-center small py-2 mb-3">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('login.proses') }}" method="POST" class="mt-2">
                    @csrf
                    <div class="mb-2">
                        <label for="email" class="form-label small fw-semibold">Email</label>
                        <input type="email" name="email" id="email" class="form-control form-control-sm rounded-3 shadow-sm" required autofocus placeholder="Masukkan email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label small fw-semibold">Password</label>
                        <input type="password" name="password" id="password" class="form-control form-control-sm rounded-3 shadow-sm" required placeholder="Masukkan password">
                    </div>
                    <button type="submit" class="btn btn-primary w-100 rounded-3 shadow-sm">Login</button>
                </form>
                <div class="text-center mt-3">
                    <small class="text-muted">Belum punya akun? <a href="{{ route('pengguna.daftar') }}" class="text-decoration-none">Daftar</a></small>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
