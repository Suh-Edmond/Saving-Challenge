@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center pt-3">
        <div class="col-12 col-md-12 col-sm-12 col-xs-12 col-xl-12 col-lg-12 pl-3">
            <a href="{{ URL::previous() }}"><i class="fas fa-arrow-left fa-lg"></i></a>
        </div>
        @if($total_balance != null && $total_balance->balance == $total_amount)
        <div class="col-sm-6  alert alert-success alert-dismissible fade show text-center">
            <strong>Congratulations! you have successfully completed this Challenge</strong>
            <button type="button" class="close text-white" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
        @endif
        <div class="  col-sm-12   pt-3">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between pt-2">
                        <div class=" text-primary h3">My Savings </div>
                        @if($total_balance == null || $total_balance->balance != $total_amount)
                        <div>
                            <a class="btn btn-outline-primary" href="/saving/get/challenges/{{$id}}/add" role="button">
                                Add Saving
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    @if(count($savings) != 0)
                    <table class="table  table-hover table-striped table-md ">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col">Week Number</th>
                                <th scope="col">Amount Deposited (CFA)</th>
                                <th scope="col">Status</th>
                                <th scope="col">Balance (CFA)</th>
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
                                @if($total_balance != null && $total_balance->balance == $total_amount && $saving->week_number == $total_week_number)
                                <td class="bg-secondary">{{$saving->balance}}</td>
                                @endif
                                @if($saving->week_number != $total_week_number)
                                <td>{{$saving->balance}}</td>
                                @endif
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    <div class="row justify-content-center pt-3">
                        <div>
                            {{$savings->links('pagination::bootstrap-4')}}
                            <p class="text-primary"> {{ $savings->firstItem() }} to {{ $savings->lastItem() }} entries of total {{$savings->total()}} entries</p>
                        </div>
                    </div>
                    @endif
                    @if(count($savings) == 0)
                    <div class="row justify-content-center pt-3">
                        <div class="col-sm-12 text-center">
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