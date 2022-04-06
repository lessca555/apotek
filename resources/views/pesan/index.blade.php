@extends('layouts.app')
@section('title', 'Detail Pemesanan')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header order-header">
                    <a href="{{ url('/home') }}"><i class="fa fa-arrow-left"></i></a> Informasi Produk
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ url('images') }}/{{ $obat['images'] }}" alt="">
                        </div>
                        <div class="col-md-6">
                            <h1>{{ $obat['nama_obat'] }}</h1>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Keterangan</td>
                                        <td>:</td>
                                        <td>{{ $obat['keterangan'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Harga</td>
                                        <td>:</td>
                                        <td>{{ $obat['harga'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Stok</td>
                                        <td>:</td>
                                        <td>{{ $obat['qty'] }}</td>
                                    </tr>
                                        <tr>
                                            <td>Jumlah pesan</td>
                                            <td>:</td>
                                            <td>
                                                <form action="{{ url('pesan') }}/{{ $obat['id_obat'] }}" method="post">
                                                    @csrf
                                                    <input type="number" class="form-control" name="jumlah_pesan">
                                                    <br>
                                                    <button type="submit" class="btn btn-secondary"><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
                                                </form>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
