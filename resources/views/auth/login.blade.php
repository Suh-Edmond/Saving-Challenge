@extends('layouts.welcome')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-3">
        <div class="  col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-header  text-dark">
                    <div class="text-center ">
                        <h4>{{ __('Login to your Account') }}</h4>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class=" col-form-label text-md-right">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <span role="alert" class="text-danger h6 fw-small">
                                {{ $errors->first('email') }}
                            </span>
                        </div>

                        <div class="form-group ">
                            <label for="password" class=" col-form-label text-md-right">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <span role="alert" class="text-danger h6 fw-small">
                                {{ $errors->first('password') }}
                            </span>
                        </div>
                        <div class=" d-flex justify-content-center pt-4">
                            <button type="submit" class="btn btn-outline-primary button "> {{ __('Login') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection