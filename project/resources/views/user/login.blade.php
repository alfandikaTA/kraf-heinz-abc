@extends('user.layouts.auth')

@section('title', 'Login')

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

<form method="POST">
    @csrf

    <div class="form-group mb-3">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="masukan username">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="masukan password">
    </div>
    <div class="mt-4">
        <div class="row">
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary w-100">Masuk</button>
            </div>
            <div class="col-md-6">
                <a href="{{route('user.register')}}" class="btn btn-primary w-100 ">Daftar</a>
            </div>
        </div>
    </div>
</form>
@endsection