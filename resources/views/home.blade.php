@extends('layouts.app')
@section('title', 'Kimia Medika')
@section('content')
<div class="container">
    <div class="jumbotron mt-4">
        <h1 class="display-4">Halo {{ Auth::user()->name }}, Selamat datang kembali</h1>
        <p class="lead">Apotek ini adalah apotek yang menyediakanmu pelayanan terbaik </p>
        <hr class="my-4">
        <p>Kepuasan pelanggan adalah tujuan utama kami</p>
        <a class="btn btn-dark btn-lg" href="#" role="button">Learn more</a>
    </div>
    <div class="row justify-content-center pt-3">
        @foreach($obats as $obat)
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    <img src="{{ url('images') }}/{{ $obat['images'] }}" class="card-img-top" alt="..." style="width: 100%"; height="150px">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $obat['nama_obat'] }}</h5>
                    <p class="card-text">
                        <strong>Rp. {{ $obat['harga'] }}</strong>
                        <strong>Stok : {{ $obat['qty'] }}</strong>
                    </p>
                    <br>
                    <a href="{{ url('pesan') }}/{{ $obat['id_obat'] }}" class="btn btn-dark"><i class="fa-solid fa-cart-plus"></i> Pesan</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection
