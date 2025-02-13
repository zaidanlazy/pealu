@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 500px;">
        <h2 class="text-center pb-4">Tambah User</h2>
        <form method="POST" action="{{ route('user.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                       name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input id="nama_lengkap" type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" 
                       name="nama_lengkap" value="{{ old('nama_lengkap') }}" required>
                @error('nama_lengkap')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                       name="email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="hp" class="form-label">No HP</label>
                <input id="hp" type="text" class="form-control @error('hp') is-invalid @enderror" 
                       name="hp" value="{{ old('hp') }}" required>
                @error('hp')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                       name="password" required>
                @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Level</label>
                <select id="role" name="role" class="form-select @error('role') is-invalid @enderror" required>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
                @error('role')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <button type="submit" class="btn btn-success w-100">Register</button>
        </form>
    </div>
</div>
@endsection
