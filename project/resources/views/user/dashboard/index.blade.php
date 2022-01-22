@extends('layouts.user-dashboard')

@section('title', 'User - Dashboard')

@section('page-title', 'Dashboard')

@section('content')
@if (session('message'))
    <div class="alert alert-success" role="alert">
        <p><strong>{{ session('message') }}</strong></p>
    </div>
@endif
@endsection