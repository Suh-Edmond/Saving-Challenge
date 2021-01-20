@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-4">
        <div class="col-6 col-md-6 col-xs-12 col-sm-12 ">
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
                            <div class="form-group pb-3 col-12 col-sm-12 col-lg-12 col-xs-12">
                                <input type="text" class="form-control" name="challenge_type" required>
                            </div>
                        </div>
                        <div class="row rounded-border ">
                            <div class=" col-12 col-sm-12 col-lg-12 col-xs-12 h6 fw-normal ">
                                Week Number
                            </div>
                            <div class="form-group pb-3 col-12 col-sm-12 col-lg-12 col-xs-12">
                                <input type="number" class="form-control" name="number_of_weeks" required>
                            </div>
                        </div>
                        <div class="row rounded-border">
                            <div class=" col-12 col-sm-12 col-lg-12 col-xs-12 h6 fw-normal ">
                                Amount Earned
                            </div>
                            <div class="form-group pb-2 col-12 col-sm-12 col-lg-12 col-xs-12">
                                <input type="number" class="form-control" name="total_amount" required>
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