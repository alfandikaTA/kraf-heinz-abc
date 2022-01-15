@extends('user.layouts.auth')

@section('title', 'Register')

@section('content')
<form>
    <div class="form-group mb-3">
        <label for="nama_toko">Nama Toko</label>
        <input type="text" class="form-control" id="nama_toko" name="nama_toko" placeholder="masukan nama toko">
    </div>
    <div class="form-group mb-3">
        <label for="nama_pemilik_toko">Nama Pemilik Toko</label>
        <input type="text" class="form-control" id="nama_pemilik_toko" name="nama_pemilik_toko"
            placeholder="masukan nama pemilik">
    </div>
    <div class="form-group mb-3">
        <label for="nomer_telephone">Nomor Telephone</label>
        <input type="text" class="form-control" id="no_telephone" name="no_telephone"
            placeholder="masukan nomer telephone">
    </div>
    <div class="form-group mb-3">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="masukan alamat">
    </div>
    <div class="form-group mb-3">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="masukan username">
    </div>
    <div class="form-group mb-3">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="masukan password">
    </div>
    <div class="mt-4">
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary w-100">Mendaftar</button>
            </div>
        </div>
    </div>
</form>
@endsection