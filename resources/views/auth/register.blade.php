@extends('layouts.welcome')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 col-md-6 col-xs-12 col-sm-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <div class="text-center  title p-1">
                        <h4>{{ __('Create Account') }}</h4>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group ">
                            <label for="first_name" class=" col-form-label text-md-right">{{ __('First Name:') }}</label>
                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autofocus>
                        </div>
                        <div class="col-md-6 ">
                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <label for="last_name" class=" col-form-label text-md-right">{{ __('Last Name:') }}</label>
                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autofocus>
                        </div>
                        <div class="col-md-6 ">
                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <label for="email" class=" col-form-label text-md-right">{{ __('E-Mail Address:') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                        </div>
                        <div class="col-md-6 ">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <label for="telephone" class=" col-form-label text-md-right">{{ __('Telephone:') }}</label>
                            <input id="telephone" type="telephone" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" required>
                        </div>
                        <div class="col-md-6 text-danger" role="alert">
                            {{$errors->first('telephone')}}
                        </div>
                        <div class="form-group ">
                            <label for="password" class=" col-form-label text-md-right">{{ __('Password:') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                        </div>
                        <div class="col-md-6 ">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group  ">
                            <label for="password-confirm" class=" col-form-label text-md-right">{{ __('Confirm Password:') }}</label>

                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="form-group row mb-0 pt-2 d-flex justify-content-center">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
        font-weight: bolder;
    }
</style>
@endsection