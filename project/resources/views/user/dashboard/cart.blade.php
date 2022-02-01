@extends('layouts.user-dashboard')

@section('title', 'User - Cart')

@section('page-title', 'Cart')

@section('header-script')
<link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">
@endsection


@section('content')
<a href="{{url('/pesanbarang')}}">Beli barang lagi</a><br>

@if(empty($cart) || count($cart) == 0)
Tidak ada Barang di cart
@else
<table cellpadding="10" border="1">
    <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>jumlah</th>
        <th>Sub Total</th>
        <th>&nbsp;</th>
    </tr>
    <?php
    $no = 1;
    $grandtotal = 0;

    ?>
    @foreach($cart as $ct => $val)
    <?php
    $subtotal = $val["harga"] * $val["jumlah"];
    ?>
    <tr>
        <td>{{$no++}}</td>
        <td>{{$val["nama"]}}</td>
        <td>{{$val["harga"]}}</td>
        <td>{{$val["jumlah"]}} Pcs</td>
        <td>{{$subtotal}}</td>
        <td>
            <a href="{{url('/card/hapus/'.$ct)}}">Batal</a>
        </td>
    </tr>
    <?php
    $grandtotal += $subtotal;
    ?>
    @endforeach
    <tr>
        <th colspan="4">Grand Total</th>
        <th>{{$grandtotal}}</th>
        <th>&nbsp;</th>
    </tr>
</table>

<a href="{{url('/transaksi/tambah')}}">Beli</a>
@endif

@endsection


@section('footer-script')
<script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
<script>
// Simple Datatable
let table1 = document.querySelector('#table1');
let dataTable = new simpleDatatables.DataTable(table1);
</script>
@endsection