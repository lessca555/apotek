@extends('layouts.app')
@section('title', 'Riwayat Pemesanan')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Riwayat Pemesanan</li>
                </ol>
            </nav>
        </div>

        <div class="col-md-12">
            <h1><i class="fa-solid fa-clock-rotate-left"></i> Riwayat Belanja</h1>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Total Harga</th>
                        <th>Status Pembayaran</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($pemesanan as $pesan)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $pesan->tanggal }}</td>
                        <td>{{ $pesan->total_harga }}</td>
                        <td>
                        @if ($pesan->status == 1)
                        Belum Bayar
                        @else
                        Sudah Bayar
                        @endif
                        </td>
                        <td><a href="{{ url('history') }}/{{ $pesan->id }}" class="btn btn-primary btn-sm">Detail <i class="fa fa-arrow-right"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
