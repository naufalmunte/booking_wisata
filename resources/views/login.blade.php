@extends('layouts.main')

@section('container')
<div class="container" style="margin-top: 60px; margin-bottom: 40px;">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">
            <div class="card rounded-4 border border-dark shadow-sm">
                <div class="card-body px-4 py-4">

                    {{-- Logo dan Judul --}}
                    <div class="text-center mb-4">
                        <img src="{{ asset('image/lasax2.jpg') }}" alt="Logo" width="160" class="mb-3">
                        <h5 class="fw-semibold">Login Pengguna</h5>
                    </div>

                    {{-- Alert Error --}}
                    @if (session('error'))
                        <div class="alert alert-danger text-center small py-2">
                            {{ session('error') }}
                        </div>
                    @endif

                    {{-- Form --}}
                    <form action="{{ route('login.proses') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="email" class="form-label small">Email</label>
                            <input type="email" name="email" id="email" class="form-control form-control-sm" required autofocus>
                        </div>
                        <div class="mb-4">
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
