@extends('layouts.welcome')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 col-md-6 col-xs-12 col-sm-12">
            <div class="card">
                <div class="card-header  text-white">
                    <div class="text-center  title">
                        <h5>{{ __('Create Account') }}</h5>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="pb-1">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" id="first_name" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <span role="alert" class="text-danger h6 fw-small">
                                {{ $errors->first('first_name') }}
                            </span>
                        </div>
                        <div class="pb-1">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" id="last_name" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <span role="alert" class="text-danger h6 fw-small">
                                {{ $errors->first('last_name') }}
                            </span>
                        </div>
                        <div class="pb-1">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <span role="alert" class="text-danger h6 fw-small">
                                {{ $errors->first('email') }}
                            </span>
                        </div>
                        <div class="pb-1">
                            <label for="telephone" class="form-label">Telephone Number</label>
                            <input type="text" id="telephone" class="form-control" name="telephone" value="{{ old('telephone') }}" required autofocus>
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <span role="alert" class="text-danger h6 fw-small">
                                {{ $errors->first('telephone') }}
                            </span>
                        </div>
                        <div class="pb-1">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" class="form-control" name="password" required>
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <span role="alert" class="text-danger h6 fw-small">
                                {{ $errors->first('password') }}
                            </span>
                        </div>
                        <div>
                            <label for="password-confirm" class="form-label">Confirm Password</label>
                            <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required>
                        </div>

                        <div class=" pt-3 row d-flex justify-content-center">
                            <div>
                                <button type="submit" class="btn btn-primary custom-btn">
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
    }

    .card-header {
        background-color: blue;
    }

    .fw-small {
        width: 0.8rem;
    }

    .btn {
        width: 11rem;
    }
</style>
@endsection