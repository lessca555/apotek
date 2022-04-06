@extends('layouts.app')
@section('title', 'Detail Pemesanan')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{ url('history') }}">Riwayat Pemesanan</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Cart</li>
                </ol>
            </nav>
        </div>

        <div class="col-md-12">
            <h1><i class="fa-solid fa-circle-info"></i></i> Detail Pemesanan</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Obat</th>
                        <th>Harga Obat</th>
                        <th>Jumlah pesan</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                @if (!empty($pemesanan))
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($pemesanan_detail as $detail)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $detail->obat->nama_obat }}</td>
                        <td align="left">Rp. {{ number_format($detail->obat->harga) }}</td>
                        <td>{{ $detail->qty }}</td>
                        <td align="left">Rp. {{ number_format($detail->total_harga) }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" align="right"><strong>Total Pembelian : </strong></td>
                        <td><strong>Rp. {{ number_format($pemesanan->total_harga) }}</strong> </td>
                    </tr>
                </tbody>
                @endif
            </table>
        </div>
    </div>

</div>
@endsection
