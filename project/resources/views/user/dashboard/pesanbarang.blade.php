@extends('layouts.user-dashboard')

@section('title', 'User - Pesanbarang')

@section('page-title', 'Pesanbarang')

@section('header-script')
<link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">
@endsection


@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <h3>Pesan Barang</h3>
                </div>
                <div class="col-md-4 text-end">
                    <a href="#" class="btn btn-success rounded-pill">Submit</a>
                </div>
            </div>
        </div>
        <section id="groups">
            <div class="card-body">
                <div class="row match-height">
                    @foreach ($barangs as $barang)
                    <div class="card" style="width: 18rem;">
                        <img src="{{ $barang->image() }}" height="150">
                        <div class="card-body">
                            <h5 class="card-title">{{ $barang->nama }}</h5>
                            <p class="card-text">Rp. {{ ($barang->harga) }}</p>
                            <a href="{{url('/cart/tambah/'.$barang->id)}}" class="btn btn-primary">Add To Cart</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</section>
@endsection


@section('footer-script')
<script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
<script>
// Simple Datatable
let table1 = document.querySelector('#table1');
let dataTable = new simpleDatatables.DataTable(table1);
</script>
@endsection