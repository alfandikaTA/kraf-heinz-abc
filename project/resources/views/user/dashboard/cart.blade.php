@extends('layouts.user-dashboard')

@section('title', 'User - Cart')

@section('page-title', 'Cart')

@section('header-script')
<link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">
@endsection


@section('content')
<div class="col-md-6">
    <h4>Keranjang</h4>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Qty</th>
                <th scope="col">Harga</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>

            @if ($carts = Session::get('cart'))
            {{-- {{ dd($carts) }} --}}

            @foreach ($carts as $barang)
            <tr>
                <form action="{{ route('user.update-from-cart') }}" method="post">
                    @csrf
                    <th scope="row">{{ $loop->index+1 }}</th>
                    <td>{{ $barang['nama'] }}</td>
                    <td><input type="number" name="quantity" value="{{ $barang['quantity'] }}" /></td>
                    <td>{{ $barang['harga'] }}</td>
                    <td class="justify-center mt-6 md:justify-end md:flex">
                        <div class="h-10 w-28">
                            <div class="relative flex flex-row w-full h-8">
                                <input type="hidden" name="id" value="{{ @$barang['id'] }}">
                                <input type="hidden" value="{{ @$barang->quantity }}"
                                    class="w-6 text-center bg-gray-300" />
                                <button type="submit" class="btn btn-warning">Update</button>
                            </div>
                        </div>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="{{ route('user.remove-from-cart', $barang['id']) }}">Hapus</a>
                    </td>
                </form>
            </tr>
            @endforeach

            @endif
        </tbody>
    </table>

    @if ($carts = Session::get('cart'))
    <a href="{{ route('user.bayar')}}" class="btn btn-success">Bayar</a>
    @endif

    <a href="{{ route('user.pesanbarang')}}" class="btn btn-warning">kembali</a>
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