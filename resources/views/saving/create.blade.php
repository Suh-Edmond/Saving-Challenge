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
                        <div class="form-group pb-3">
                            <label for="week_number" class="pb-2">Week number:</label>
                            <input type="number" class="form-control" name="week_number" required>
                        </div>

                        <div class="form-group pb-3">
                            <label for="deposite_amount" class="pb-2">Deposite Amount :</label>
                            <input type="number" class="form-control" name="amount_deposited" required>
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