@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-5">
        <div class="col-6 col-md-6 col-xs-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class=" fw-bold text-center text-white">Deposite Saving</h5>
                </div>
                <div class="card-body">
                    <form class="form" method="POST" action="/saving/get/challenges/{{$id}}/">
                        <div class="form-group row rounded-border pb-3">
                            <div class=" col-12 col-sm-12 col-lg-12 col-xs-12  ">
                                <h6 class="fw-normal"> Week Number </h6>
                            </div>
                            <div class="col-12 col-sm-12 col-lg-12 col-xs-12">
                                <select class="form-control fw-light" name="week_number" required>
                                    @for($i = 1; $i <= $number_of_weeks; $i++) <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                </select>
                            </div>
                        </div>
                        <div class="row rounded-border pb-3 form-group">
                            <div class=" col-12 col-sm-12 col-lg-12 col-xs-12  ">
                                <h6 class="fw-normal">Deposite Saving</h6>
                            </div>
                            <div class="col-12 col-sm-12 col-lg-12 col-xs-12">
                                <input type="number" class="form-control" name="amount_deposited" required>
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