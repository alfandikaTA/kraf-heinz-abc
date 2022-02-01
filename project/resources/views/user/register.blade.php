@extends('user.layouts.auth')

@section('title', 'Register')

@section('content')

@if (session('error'))
<div class="alert alert-danger" role="alert">
    {{ session('error') }}
</div>
@endif

@if (session('success'))
<div class="alert alert-success" role="alert">
    <p><strong>{{ session('success') }}</strong></p>
</div>
@endif

<form method="POST" action="{{ route('user.register-act') }}">
    @csrf

    <div class="form-group mb-3">
        <label for="nama">Nama Toko</label>
        <input type="text" class="form-control" id="nama_toko" name="nama_toko" placeholder="masukan nama toko">
    </div>
    <div class="form-group mb-3">
        <label for="nama_pemilik">Nama Pemilik Toko</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="masukan nama pemilik">
    </div>
    <div class="form-group mb-3">
        <label for="telephone">Nomor Telephone</label>
        <input type="text" class="form-control" id="telephone" name="telephone" placeholder="masukan nomer telephone">
    </div>
    <div class="form-group mb-3">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="masukan alamat">
    </div>
    <div class="form-group mb-3">
        <label for="username">Username/Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="masukan username">
    </div>
    <div class="form-group mb-3">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="masukan password">
    </div>
    <div class="mt-4">
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary w-100">Mendaftar</button>
            </div>
        </div>
    </div>
</form>
@endsection