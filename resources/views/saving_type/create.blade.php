@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8 col-md-8 col-xs-12 col-sm-12">
            <div class="card">
                <div class="card-header bg-primary bg-gradient">
                    <h4 class="text-weight-bolder text-center text-white">Create Saving Challenge</h5>
                </div>
                <div class="card-body">
                    <form class="form form-floating" method="POST" action="/saving/challenges">
                        <div class="form-group pb-3">
                            <label for="challenge_type" class="pb-2">Challenge Type:</label>
                            <input type="text" class="form-control" name="challenge_type" required>
                        </div>
                        <div class="form-group pb-3">
                            <label for="challenge_type" class="pb-2">Number of Weeks:</label>
                            <input type="number" class="form-control" name="number_of_weeks" required>
                        </div>

                        <div class="form-group pb-3">
                            <label for="challenge_type" class="pb-2">Total Amount:</label>
                            <input type="number" class="form-control" name="total_amount" required>
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