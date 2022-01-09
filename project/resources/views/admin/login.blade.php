@extends('layouts.auth')

@section('title', 'Admin - Login')

@section('content')

<div class="text-center">
  <h1 class="auth-title">Log in.</h1>
  <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>
</div>

<form action="index.html">
    <div class="form-group position-relative has-icon-left mb-4">
        <input type="text" class="form-control form-control" placeholder="Username">
        <div class="form-control-icon">
            <i class="bi bi-person"></i>
        </div>
    </div>
    <div class="form-group position-relative has-icon-left mb-4">
        <input type="password" class="form-control form-control" placeholder="Password">
        <div class="form-control-icon">
            <i class="bi bi-shield-lock"></i>
        </div>
    </div>
    <div class="form-check form-check-lg d-flex align-items-end">
        <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
        <label class="form-check-label text-gray-600" for="flexCheckDefault">
            Keep me logged in
        </label>
    </div>
    <button class="btn btn-primary btn-block shadow-lg mt-5">Log in</button>
</form>
<div class="text-center mt-5">
    <p class="text-gray-600">Don't have an account? <a href="auth-register.html" class="font-bold">Sign
            up</a>.</p>
    <p><a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.</p>
</div>
@endsection