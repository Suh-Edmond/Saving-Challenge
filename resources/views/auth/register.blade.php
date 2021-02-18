@extends('layouts.welcome')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="  col-sm-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <div class="text-center" style="font-family: Arial, Helvetica, sans-serif;">
                        <h4>{{ __('Create Account') }}</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="pb-1">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" id="first_name" class="form-control" name="first_name" value="{{ old('first_name') }}" required>
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <span class="text-danger h6 fw-small">
                                {{ $errors->first('first_name') }}
                            </span>
                        </div>
                        <div class="pb-1">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" id="last_name" class="form-control" name="last_name" value="{{ old('last_name') }}" required>
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <span class="text-danger h6 fw-small">
                                {{ $errors->first('last_name') }}
                            </span>
                        </div>
                        <div class="pb-1">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <span class="text-danger h6 fw-small">
                                {{ $errors->first('email') }}
                            </span>
                        </div>
                        <div class="pb-1">
                            <label for="telephone" class="form-label">Telephone Number</label>
                            <input type="text" id="telephone" class="form-control" name="telephone" value="{{ old('telephone') }}" required>
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <span class="text-danger h6 fw-small">
                                {{ $errors->first('telephone') }}
                            </span>
                        </div>
                        <div class="pb-1">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" class="form-control" name="password" required>
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <span class="text-danger h6 fw-small">
                                {{ $errors->first('password') }}
                            </span>
                        </div>
                        <div>
                            <label for="password-confirm" class="form-label">Confirm Password</label>
                            <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required>
                        </div>
                        <div class=" d-flex justify-content-center pt-4">
                            <button type="submit" class="btn btn-primary button "> {{ __('Register') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection