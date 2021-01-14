@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-4">
        <div class="col-8 col-md-8 col-xs-12 col-sm-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-weight-bolder text-center text-white">Deposite Saving</h5>
                </div>
                <div class="card-body">
                    <form class="form form-floating" method="POST" action="/saving/get/challenges/{{$id}}/">
                        <div class="form-group row rounded-border">
                            <div class=" col-12 col-sm-12 col-lg-12 col-xs-12 h5 text-weight-bolder">
                                Week Number:
                            </div>
                            <select class="form-control" id="week_number" required>
                                <option selected>Select week number</option>
                                @foreach($number_of_weeks as $number)
                                <option value="{{$number->id}}">{{$number->week_number}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row rounded-border pb-3 form-group">
                            <div class=" col-12 col-sm-12 col-lg-12 col-xs-12 h5 text-weight-bolder">
                                Deposite Saving:
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
@endsection