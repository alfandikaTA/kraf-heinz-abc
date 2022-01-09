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
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>City</th>
                <th>Status</th>
              </tr>
          </thead>
          <tbody>
            @for ($i = 0; $i < 40; $i++)
            <tr>
                <td>Graiden</td>
                <td>vehicula.aliquet@semconsequat.co.uk</td>
                <td>076 4820 8838</td>
                <td>Offenburg</td>
                <td>
                    <span class="badge bg-success">Active</span>
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