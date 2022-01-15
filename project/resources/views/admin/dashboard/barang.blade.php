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
            <button type="button" class="btn btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                  <th>Nama</th>
                  <th>Quantity</th>
                  <th>Harga</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($barangs as $barang)
              <tr>
                <td>{{ $barang->nama }}</td>
                <td>{{ $barang->quantity }}</td>
                <td>{{ $barang->harga }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
      <div class="modal-content">
        <form method="POST" action="{{ route('admin.barang-add') }}">
          @csrf 
          
          <div class="modal-header">
            <h5 class="modal-title">Tambah barang</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="inputNama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="inputNama" name="nama" placeholder="Masukan nama barang">
            </div>
            <div class="mb-3">
              <label for="inputQuantity" class="form-label">Quantity</label>
              <input type="number" class="form-control" id="inputQuantity" name="quantity" placeholder="Masukan quantity barang">
            </div>
            <div class="mb-3">
              <label for="inputHarga" class="form-label">Harga</label>
              <input type="number" class="form-control" id="inputHarga" name="harga" placeholder="Masukan harga barang">
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
</script>
@endsection