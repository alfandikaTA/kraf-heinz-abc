@extends('layouts.user-dashboard')

@section('title', 'User - Nota')

@section('page-title', 'Nota')

@section('header-script')
<link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">
@endsection

@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootstrap snippets bootdeys">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default invoice" id="invoice">
                <div class="panel-body">
                    <div class="row">
                        <!-- @foreach ($transaksis as $transaksi)
                        <div class="col-xs-4 text-right payment-details">
                            Nota pembayaran pada tanggal: {{ $transaksi->created_at }}
                        </div>
                        @endforeach -->
                    </div>

                    <div class="row table-row">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width:5%">No</th>
                                    <th style="width:50%">Nama Barang</th>
                                    <th class="text-right" style="width:15%">Harga</th>
                                    <th class="text-right" style="width:15%">Jumlah</th>
                                    <th class="text-right" style="width:15%">Total Harga</th>
                                    <th class="text-right" style="width:15%">Tanggal Tansaksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksis as $transaksi)
                                @if (count($transaksi->transaksi_detail))
                                <tr>
                                    <td class="text-center">{{ $loop->index+1 }}</td>
                                    <td>
                                        <ol>
                                            @foreach ($transaksi->transaksi_detail as $item)
                                            <li>{{ $item->barang->nama }}</li>
                                            @endforeach
                                        </ol>
                                    </td>
                                    <td>
                                        <ol>
                                            @foreach ($transaksi->transaksi_detail as $item)
                                            <li>{{ $item->barang->harga }}</li>
                                            @endforeach
                                        </ol>
                                    </td>

                                    <td>
                                        <ol>
                                            @foreach ($transaksi->transaksi_detail as $item)
                                            <li>{{$item->transaksi->quantity}}</li>
                                            @endforeach
                                        </ol>
                                    </td>
                                    <td class="text-right">12.800</td>
                                    <td>{{ $transaksi->created_at }}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <table>
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-xs-6 margintop">
                                        <p class="lead marginbottom">THANK YOU!</p>

                                        <button class="btn btn-success" id="invoice-print"><i
                                                class="fa fa-download"></i>
                                            Download Invoice</button>
                                    </div>
                                </div>
                            </td>

                            <div class="col-xs-6 text-right pull-right invoice-total">
                                <p>Subtotal : 73.300</p>
                            </div>
                        </tr>
                    </table>
                </div>
            </div>
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