@extends('layouts.welcome')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-5">
        <div class="col-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header text-white">
                    <div class="text-center  title p-1">
                        <h4>{{ __('Login to your Account') }}</h4>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group  ">
                            <label for="email" class=" col-form-label text-md-right">{{ __('E-Mail Address:') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        </div>
                        <div class="col-md-6">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <label for="password" class=" col-form-label text-md-right">{{ __('Password:') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        </div>
                        <div class="col-md-6">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group row mb-0 p-3 d-flex justify-content-center">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style scoped>
    .title {
        font-family: Arial, Helvetica, sans-serif;
    }

    .card-header {
        background-color: blue;
    }

    /*
    .btn {
        background-color: navy;
    } */
</style>
@endsection