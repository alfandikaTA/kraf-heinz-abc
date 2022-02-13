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
                    @foreach ($transaksis as $transaksi)
                    @if (count($transaksi->transaksi_detail))
                    <tr>
                        <td>1</td>
                        <td>{{ $transaksi->id_toko }}</td>
                        <td>{{ $transaksi->id_barang }}</td>
                        <td>{{ $transaksi->harga }}</td>
                        <td>{{ $transaksi->jumlah }}</td>
                        <td>{{ $transaksi->harga }}</td>
                        <td>{{ $transaksi->total_harga }}</td>
                        <td><button type="button" class="btn btn-warning btn-edit btn-edit-pesanan"
                                data-id="{{ $transaksi->id}}" data-update="{{ $transaksi->update}}"
                                ddata-bs-toggle="modal" data-bs-toggle="modal" data-bs-target="#modalEdit">
                                <i class="fas fa-edit">Edit Status</i>
                            </button></td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEdit" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.pesanan-update') }}">
                @csrf

                <input type="hidden" id="editInputId" name="id">
                <div class="modal-header">
                    <h5 class="modal-title">Update Status Pesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editInputUpdate" class="form-label"></label>
                        <input type="text" class="form-control" id="editInputUpdate" name="update" placeholder="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection


@section('footer-script')
<script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
<script>
// Simple Datatable
let table1 = document.querySelector('#table1');
let dataTable = new simpleDatatables.DataTable(table1);

let editInputId = document.querySelector("#editInputId");
let editInputUpdate = document.querySelector("#editInputUpdate");
const editButton = document.querySelectorAll(".btn-edit-pesanan");
editButton.forEach(element => {
    element.addEventListener('click', (e) => {
        editInputNamaToko.value = element.dataset.update;
        editInputId.value = element.dataset.id;
    })
});
</script>
@endsection