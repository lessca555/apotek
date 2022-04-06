@extends('layouts.app')
@section('title', 'My Profile')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Profile </li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="col-md-12">
                    <h1><i class="fa fa-user"></i> My Profile</h1>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>{{ $user->name; }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>{{ $user->email; }}</td>
                            </tr>
                            <tr>
                                <td>No Hp</td>
                                <td>:</td>
                                <td>{{ $user->no_hp; }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{ $user->alamat; }}</td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td>
                                    <a href="{{ url('edit-profile') }}" class="btn btn-primary"><i class="fa-solid fa-user-pen"></i> Edit Profile</a>
                                    <a href="{{ url('edit-password') }}" class="btn btn-danger"><i class="fa-solid fa-pen"></i> Edit Password</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
