@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-12 col-md-12 col-sm-12 col-xs-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between pt-3">
                        <p class=" text-primary h3">My Savings </p>
                        <p>
                            <a class="btn btn-outline-primary" href="/saving/get/challenges/{{$id}}/add" role="button">
                                Add Saving
                            </a>
                        </p>
                    </div>
                </div>
                <div class="card-body">
                    @if(count($savings) != 0)
                    <table class="table  table-hover table-striped table-md ">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col">Week Number</th>
                                <th scope="col">Amount Deposited</th>
                                <th scope="col">Status</th>
                                <th scope="col">Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($savings as $saving)
                            <tr>
                                <th scope="row">{{$saving->week_number}}</th>
                                <td>{{$saving->amount_deposited}}</td>
                                @if($saving->status == 0)
                                <td>Unpaid</td>
                                @endif
                                @if($saving->status == 1)
                                <td>Paid</td>
                                @endif
                                <td>{{$saving->balance}}</td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    @endif
                    @if(count($savings) == 0)
                    <div class="row justify-content-center pt-3">
                        <div class="col-12 col-md-12 col-lg-12 col-xs-12 col-sm-12 text-center">
                            <div class="alert alert-warning alert-dismissible fade show">
                                <strong class="text-white">You don't have any savings to this challenge! click the add saving button to make a saving</strong>
                                <button type="button" class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

    </div>

</div>

@endsection