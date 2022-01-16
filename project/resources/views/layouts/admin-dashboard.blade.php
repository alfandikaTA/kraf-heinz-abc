@extends('layouts.dashboard')

@section('title')
@yield('title')
@endsection

@section('page-title')
@yield('page-title')
@endsection

@section('sidebar')
@include('layouts.admin-sidebar')
@endsection

@section('content')
@yield('content')
@endsection