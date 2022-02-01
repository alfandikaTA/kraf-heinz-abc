@extends('layouts.admin-dashboard')

@section('title', 'Admin - Toko')

@section('page-title', 'Toko')

@section('header-script')
<link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">
@endsection


@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <h3>Data Toko</h3>
                </div>

            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Toko</th>
                        <th>Nama Pemilik</th>
                        <th>No Telephone</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody class="list">
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $user->nama_toko }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->telephone }}</td>
                        <td>{{ $user->alamat }}</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-edit btn-edit-toko"
                                data-id="{{ $user->id}}" data-nama_toko="{{ $user->nama_toko}}"
                                data-name="{{ $user->name}}" data-telephone="{{ $user->telephone}}"
                                data-alamat="{{ $user->alamat}}" data-bs-toggle="modal" data-bs-toggle="modal"
                                data-bs-target="#modalEdit">
                                <i class="fas fa-edit">Edit</i>
                            </button>
                        </td>
                        <td>
                            <form action="{{  route('admin.toko-delete', $user->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-delete">Delete</button>
                            </form>
                        </td>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEdit" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.toko-update') }}">
                @csrf

                <input type="hidden" id="editInputId" name="id">
                <div class="modal-header">
                    <h5 class="modal-title">Data Toko</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editInputNamaToko" class="form-label">Nama Toko</label>
                        <input type="text" class="form-control" id="editInputNamaToko" name="nama_toko"
                            placeholder="Masukan nama toko">
                    </div>
                    <div class="mb-3">
                        <label for="editInputNamaPemilik" class="form-label">Nama Pemilik</label>
                        <input type="text" class="form-control" id="editInputNamaPemilik" name="name"
                            placeholder="Masukan nama pemilik">
                    </div>
                    <div class="mb-3">
                        <label for="editInputTelephone" class="form-label">No Telephone</label>
                        <input type="number" class="form-control" id="editInputTelephone" name="telephone"
                            placeholder="Masukan no telephone">
                    </div>
                    <div class="mb-3">
                        <label for="editInputAlamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="editInputAlamat" name="alamat"
                            placeholder="Masukan alamat">
                    </div>
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
let editInputNamaToko = document.querySelector("#editInputNamaToko");
let editInputNamaPemilik = document.querySelector("#editInputNamaPemilik");
let editInputTelephone = document.querySelector("#editInputTelephone");
let editInputAlamat = document.querySelector("#editInputAlamat");
const editButton = document.querySelectorAll(".btn-edit-toko");
editButton.forEach(element => {
    element.addEventListener('click', (e) => {
        editInputNamaToko.value = element.dataset.nama_toko;
        editInputNamaPemilik.value = element.dataset.name;
        editInputTelephone.value = element.dataset.telephone;
        editInputAlamat.value = element.dataset.alamat;
        editInputId.value = element.dataset.id;
    })
});
</script>
@endsection