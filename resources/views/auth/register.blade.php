@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 500px;">
        <div class="tab-content mt-3" id="authTabsContent">
            <!-- Register Form -->
            <div class="tab-pane fade show active" id="register" role="tabpanel">
                <h2 class="text-center pb-4">Buat Akun Baru</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="NO HP" class="form-label">No HP </label>
                        <input id="hp" type="hp" class="form-control" name="hp" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password" class="form-control" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="password-confirm" class="form-label">Konfirmasi Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Level</label>
                        <select id="role" name="role" class="form-select" required>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Daftar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
