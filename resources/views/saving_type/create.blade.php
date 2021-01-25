@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-1">
        <div class="col-12 col-md-12 col-sm-12 col-xs-12 col-xl-12 col-lg-12 pl-3">
            <a href="{{ URL::previous() }}"><i class="fas fa-arrow-left fa-lg"></i></a>
        </div>
        <div class="col-6 col-md-6 col-xs-12 col-sm-12 pt-2">
            <div class="card">
                <div class="card-header bg-primary bg-gradient">
                    <h4 class="fw-bold text-center text-white">Create Saving Challenge</h5>
                </div>
                <div class="card-body">
                    <form class="form" method="POST" action="/saving/challenges">
                        <div class="row rounded-border ">
                            <div class="col-12 col-sm-12 col-lg-12 col-xs-12 h6 fw-normal ">
                                Challenge Type
                            </div>
                            <div class="form-group pb-1 col-12 col-sm-12 col-lg-12 col-xs-12">
                                <input type="text" class="form-control" name="challenge_type" required>
                            </div>
                            <div class="col-md-8 col-sm-12 col-xs-12">
                                <span role="alert" class="text-danger h6 fw-small">
                                    {{ $errors->first('challenge_type') }}
                                </span>
                            </div>
                        </div>
                        <div class="row rounded-border ">
                            <div class=" col-12 col-sm-12 col-lg-12 col-xs-12 h6 fw-normal ">
                                Week Number
                            </div>
                            <div class="form-group pb-1 col-12 col-sm-12 col-lg-12 col-xs-12">
                                <input type="number" class="form-control" name="number_of_weeks" required>
                            </div>
                            <div class="col-md-8 col-sm-12 col-xs-12">
                                <span role="alert" class="text-danger h6 fw-small">
                                    {{ $errors->first('number_of_weeks') }}
                                </span>
                            </div>
                        </div>
                        <div class="row rounded-border pb-1 form-group">
                            <div class=" col-12 col-sm-12 col-lg-12 col-xs-12  ">
                                <h6 class="fw-normal">Amount Payable (CFA)</h6>
                            </div>
                            <div class="col-12 col-sm-12 col-lg-12 col-xs-12">
                                <input type="number" class="form-control" name="amount_payable" required>
                            </div>
                            <div class="col-md-8 col-sm-12 col-xs-12">
                                <span role="alert" class="text-danger h6 fw-small">
                                    {{ $errors->first('amount_payable') }}
                                </span>
                            </div>
                        </div>
                        <div class="row rounded-border pb-1 form-group">
                            <div class=" col-12 col-sm-12 col-lg-12 col-xs-12  ">
                                <h6 class="fw-normal">Amount Earned (CFA)</h6>
                            </div>
                            <div class="col-12 col-sm-12 col-lg-12 col-xs-12">
                                <input type="number" class="form-control" name="total_amount" required>
                            </div>
                            <div class="col-md-8 col-sm-12 col-xs-12">
                                <span role="alert" class="text-danger h6 fw-small">
                                    {{ $errors->first('total_amount') }}
                                </span>
                            </div>
                        </div>
                        <div class=" d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Create Challenge</button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style scoped>
    /* .card-header {
        background-color: navy;
    } */
</style>
@endsection