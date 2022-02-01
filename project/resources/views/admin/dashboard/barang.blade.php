@extends('layouts.admin-dashboard')

@section('title', 'Admin - Barang')

@section('page-title', 'Barang')

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
                    <button type="button" class="btn btn-success rounded-pill" data-bs-toggle="modal"
                        data-bs-target="#modalAdd">
                        Tambah data
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">

            @if($errors->any())
            <div class="alert alert-danger">
                <p><strong>Kesalahan mengisi data barang</strong></p>
            </div>
            @endif


            @if (session('success'))
            <div class="alert alert-success" role="alert">
                <p><strong>{{ session('success') }}</strong></p>
            </div>
            @endif

            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>Nomer</th>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Quantity</th>
                        <th>Harga</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="list">
                    @foreach ($barangs as $barang)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td><img src="{{ $barang->image() }}" height="75" /></td>
                        <td>{{ $barang->nama }}</td>
                        <td>{{ $barang->quantity }}</td>
                        <td>{{ $barang->harga }}</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-edit btn-edit-barang"
                                data-id="{{ $barang->id}}" data-image="{{ $barang->image}}"
                                data-nama="{{ $barang->nama}}" data-quantity="{{ $barang->quantity}}"
                                data-harga="{{ $barang->harga}}" ddata-bs-toggle="modal" data-bs-toggle="modal"
                                data-bs-target="#modalEdit">
                                <i class="fas fa-edit">Edit</i>
                            </button>
                        </td>
                        <td>
                            <form action="{{  route('admin.barang-delete', $barang->id) }}" method="POST">
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

<div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.barang-add') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="inputImage" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="inputImage" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="inputNama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="inputNama" name="nama"
                            placeholder="Masukan nama barang">
                    </div>
                    <div class="mb-3">
                        <label for="inputQuantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="inputQuantity" name="quantity"
                            placeholder="Masukan quantity barang">
                    </div>
                    <div class="mb-3">
                        <label for="inputHarga" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="inputHarga" name="harga"
                            placeholder="Masukan harga barang">
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

<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEdit" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <form action="{{ route('admin.barang-add') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" id="editInputId" name="id">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editinputImage" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="editinputImage" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="editInputNama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="editInputNama" name="nama"
                            placeholder="Masukan nama barang">
                    </div>
                    <div class="mb-3">
                        <label for="editInputQuantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="editInputQuantity" name="quantity"
                            placeholder="Masukan quantity barang">
                    </div>
                    <div class="mb-3">
                        <label for="editInputHarga" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="editInputHarga" name="harga"
                            placeholder="Masukan harga barang">
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
// let editInputImage = document.querySelector("#editInputImage");
let editInputNama = document.querySelector("#editInputNama");
let editInputQuantity = document.querySelector("#editInputQuantity");
let editInputHarga = document.querySelector("#editInputHarga");
const editButton = document.querySelectorAll(".btn-edit-barang");
editButton.forEach(element => {
    element.addEventListener('click', (e) => {
        editInputNama.value = element.dataset.nama;
        editInputQuantity.value = element.dataset.quantity;
        editInputHarga.value = element.dataset.harga;
        editInputId.value = element.dataset.id;
    })
});
</script>
@endsection