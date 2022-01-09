@extends('layouts.admin-dashboard')

@section('title', 'Admin - Pesanan')

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
                <div class="col-md-4 text-end">
                    <a href="#" class="btn btn-success rounded-pill">Tambah data</a>
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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 40; $i++) <tr>
                        <td>1</td>
                        <td>Barokah</td>
                        <td>Kecap 135 ml</td>
                        <td>2</td>
                        <td>6.400</td>
                        <td>12.800</td>
                        <td>Sedang Disiapkan</td>
                        <td>
                            <span class="badge bg-success">Update Status</span>
                        </td>
                        </tr>
                        @endfor
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