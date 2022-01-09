@extends('user.layouts.auth')

@section('title', 'Login')

@section('content')
<form>
  <div class="form-group mb-3">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
  </div>
  <div class="mt-4">
    <div class="row">
      <div class="col-md-6">
        <button class="btn btn-primary w-100">Masuk</button>
      </div>
      <div class="col-md-6">
        <a href="#" class="btn btn-primary w-100">Daftar</a>
      </div>
    </div>
  </div>
</form>
@endsection