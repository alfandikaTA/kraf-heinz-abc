@extends('layouts.user-dashboard')

@section('title', 'User - Cart')

@section('page-title', 'Cart')

@section('header-script')
<link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">
@endsection


@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <h3>Keranjang</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <a href="{{ route('user.pesanbarang')}}" class="btn btn-warning mb-3">kembali</a>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <p><strong>{{ session('success') }}</strong></p>
                </div>
            @endif
            
            <form method="POST" action="{{ route('user.update-from-cart') }}">
                @csrf
                <table class="table mb-5">
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
                        @php $total = 0 @endphp
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                @php $total += $details['harga'] * $details['quantity'] @endphp
                                <tr data-id="{{ $id }}">
                                    <th scope="row">{{ $loop->index+1 }}</th>
                                    <td>{{ $details['nama'] }}</td>
                                    <td><input type="number" name="quantity[]" value="{{ $details['quantity'] }}" /></td>
                                    <td>{{ $details['harga'] }}</td>
                                    <td>
                                        <a class="btn btn-danger" href="{{ route('user.remove-from-cart', $details['id']) }}">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
            
                    </tbody>
                </table>
                <div
                    class="text-end"
                >
                    <p
                        style="
                            font-size: 24px;
                            font-weight: 600;
                        "
                    >Total : {{ $total }}</p>
                    @if ($carts = Session::get('cart'))
                        <a href="{{ route('user.bayar')}}" class="btn btn-success">Bayar</a>
                        <button class="btn btn-info" type="submit">Update</button>
                    @endif
                </div>
            </form>
        
           
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