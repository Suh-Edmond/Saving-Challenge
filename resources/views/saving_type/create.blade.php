@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-4">
        <div class="col-8 col-md-8 col-xs-12 col-sm-12">
            <div class="card">
                <div class="card-header bg-primary bg-gradient">
                    <h4 class="text-weight-bolder text-center text-white">Create Saving Challenge</h5>
                </div>
                <div class="card-body">
                    <form class="form form-floating" method="POST" action="/saving/challenges">
                        <div class="row rounded-border pb-3">
                            <div class=" col-12 col-sm-12 col-lg-12 col-xs-12 h5 text-weight-bolder">
                                Challenge Type:
                            </div>
                            <div class="form-group pb-3">
                                <input type="text" class="form-control" name="challenge_type" required>
                            </div>
                        </div>
                        <div class="row rounded-border pb-3">
                            <div class=" col-12 col-sm-12 col-lg-12 col-xs-12 h5 text-weight-bolder">
                                Week Number:
                            </div>
                            <div class="form-group pb-3">
                                <input type="number" class="form-control" name="number_of_weeks" required>
                            </div>
                        </div>
                        <div class="row rounded-border pb-3">
                            <div class=" col-12 col-sm-12 col-lg-12 col-xs-12 h5 text-weight-bolder">
                                Amount Earn:
                            </div>
                            <div class="form-group pb-3">
                                <input type="number" class="form-control" name="total_amount" required>
                            </div>
                        </div>
                        <div class="pt-3 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Create Challenge</button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection