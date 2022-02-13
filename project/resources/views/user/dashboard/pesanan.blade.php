@extends('layouts.user-dashboard')

@section('title', 'User - Pesanan')

@section('page-title', 'Pesanan')

@section('header-script')
<link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">
@endsection

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <h3>Data barang</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Toko</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total Harga</th>
                        <th>Status Pesanan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksis as $transaksi)
                    @if (count($transaksi->transaksi_detail))
                    <tr>
                        <td>1</td>

                        <td>{{ $transaksi->id_barang }}</td>
                        <td>{{ $transaksi->jumlah }}</td>
                        <td>{{ $transaksi->harga }}</td>
                        <td>{{ $transaksi->total_harga }}</td>
                        <td>{{ $transaksi->status}}</td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
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