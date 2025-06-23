@extends('layouts.main')

@section('container')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-4"> {{-- Perkecil dari col-md-6 ke col-md-4 --}}
            <div class="card shadow rounded-3">
                <div class="card-body px-4 py-4 text-center">

                    {{-- Logo --}}
                    <img src="{{ asset('image/lasax2.jpg') }}" alt="Logo" width="190" class="mb-3">

                    <h5 class="mb-3">Login Pengguna</h5>

                    @if (session('error'))
                        <div class="alert alert-danger text-center small py-2">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('login.proses') }}" method="POST" class="text-start">
                        @csrf
                        <div class="mb-2">
                            <label for="email" class="form-label small">Email</label>
                            <input type="email" name="email" id="email" class="form-control form-control-sm" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label small">Password</label>
                            <input type="password" name="password" id="password" class="form-control form-control-sm" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
