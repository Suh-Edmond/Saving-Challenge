@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-12 col-sm-12 col-xs-12 col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between pt-3">
                        <p class="text-primary h3">Completed Saving Challenges</p>
                    </div>

                </div>

                <div class="card-body">
                    @if($completed != null)
                    <table class="table  table-hover table-striped table-md ">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Challenge Type</th>
                                <th scope="col">Number of Weeks</th>
                                <th scope="col">Amount Deposited (CFA)</th>
                                <th scope="col">Balance (CFA)</th>
                                <th scope="col">Total Amount Earned (CFA)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($completed as $challenge)
                            <tr>
                                <td>{{$challenge->id}}</td>
                                <td>{{$challenge->challenge_type}}</td>
                                <td>{{$challenge->number_of_weeks}}</td>
                                <td>{{$challenge->amount_deposited}}</td>
                                <td>{{$challenge->balance}}</td>
                                <td>{{$challenge->total_amount}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                    <div class="row justify-content-center pt-3">
                        @if($completed == null)
                        <div class="col-12 col-md-12 col-lg-12 col-xs-12 colsm-12 text-center text-white">
                            <div class="alert alert-warning alert-dismissible fade show">
                                <strong class="text-white">You don't have any Completed Saving Challenge!</strong>
                                <button type="button" class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection