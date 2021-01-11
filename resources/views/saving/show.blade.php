@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-12 col-sm-12 col-xs-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title text-primary ">My Savings </h3>
                        @for($i =0; $i < 1; $i++) <a class="btn btn-outline-primary" href="/saving/get/challenges/{{$savings[$i]->id}}/add" role="button">Add Saving</a>
                            @endfor
                    </div>

                </div>

                <div class="card-body">
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
                </div>
            </div>
        </div>

    </div>

</div>

@endsection