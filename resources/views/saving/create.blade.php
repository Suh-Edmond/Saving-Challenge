@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-3">
        <div class="col-12 col-md-12 col-sm-12 col-xs-12 col-xl-12 col-lg-12 pl-3">
            <a href="{{ URL::previous() }}"><i class="fas fa-arrow-left fa-lg"></i></a>
        </div>
        <div class="col-6 col-md-6 col-xs-12 col-sm-12 pt-2">
            <div class="card">
                <div class="card-header">
                    <h4 class="fw-bold text-center text-white">Deposite Saving</h5>
                </div>
                <div class="card-body">
                    <form class="form" method="POST" action="/saving/get/challenges/{{$id}}/">
                        <div class="form-group row rounded-border pb-1">
                            <div class=" col-12 col-sm-12 col-lg-12 col-xs-12  ">
                                <h6 class="fw-normal"> Week Number </h6>
                            </div>
                            @if($last_saving == null)
                            <div class="col-12 col-sm-12 col-lg-12 col-xs-12">
                                <input type="number" class="form-control" name="week_number" required value="1">
                            </div>
                            @endif
                            @if($last_saving != null)
                            <div class="col-12 col-sm-12 col-lg-12 col-xs-12">
                                <input type="number" class="form-control" name="week_number" required value="{{$last_saving->week_number + 1}}">
                            </div>
                            @endif
                            <div class="col-md-8 col-sm-12 col-xs-12">
                                <span role="alert" class="text-danger h6 fw-small">
                                    {{ $errors->first('week_number') }}
                                </span>
                            </div>
                        </div>
                        <div class="row rounded-border pb-1 form-group">
                            <div class=" col-12 col-sm-12 col-lg-12 col-xs-12  ">
                                <h6 class="fw-normal">Deposite Saving (CFA)</h6>
                            </div>
                            <div class="col-12 col-sm-12 col-lg-12 col-xs-12">
                                @if($last_saving == null)
                                <input type="number" class="form-control" name="amount_deposited" required value="{{$amount_payable}}">
                                @endif
                                @if($last_saving != null)
                                <input type="number" class="form-control" name="amount_deposited" required value="{{$amount_payable + $last_saving->amount_deposited}}">
                                @endif
                            </div>
                            <div class="col-md-8 col-sm-12 col-xs-12">
                                <span role="alert" class="text-danger h6 fw-small">
                                    {{ $errors->first('amount_deposited') }}
                                </span>
                            </div>
                        </div>
                        <div class=" pt-2 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Save Saving</button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style scoped>
    .card-header {
        background-color: blue;
    }
</style>
@endsection