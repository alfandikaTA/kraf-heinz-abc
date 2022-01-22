@extends('layouts.user-dashboard')

@section('title', 'User - Barang')

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
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Nomer</th>
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
                            <td>{{ $barang->nama }}</td>
                            <td>{{ $barang->quantity }}</td>
                            <td>{{ $barang->harga }}</td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection