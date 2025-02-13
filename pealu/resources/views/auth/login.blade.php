@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 500px;">   
        <div class="tab-content mt-3" id="authTabsContent">
            <div class="tab-pane fade show active" id="login" role="tabpanel">
            <h2 class="text-center pb-4">Selamat Datang</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">Ingat Saya</label>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="text-primary" href="{{ route('password.request') }}">Lupa Password?</a>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-success w-100">Masuk</button>
                </form>
                <p class="mt-3 text-center">
                    Belum punya akun? <a class="text-primary" href="{{ route('register') }}" >Daftar</a>
                </p>
            </div>
            
@endsection
