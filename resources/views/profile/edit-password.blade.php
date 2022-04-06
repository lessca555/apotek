@extends('layouts.app')
@section('title', 'Change Password')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{ url('profile') }}">Profile</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Profile </li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <h1><i class="fa-solid fa-pen"></i> Edit Password</h1>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url('edit-password') }}">
                    @csrf
                    
                    <div class="row mb-3">
                        <label for="password" class="col-md-2 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-2 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>


                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-2">
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
