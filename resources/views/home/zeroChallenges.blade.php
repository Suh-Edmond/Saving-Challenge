@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-3">
        <div class="col-12 col-md-12 col-sm-12 col-xs-12 col-xl-12 col-lg-12 pl-3">

            <a href="{{ URL::previous() }}"><i class="fas fa-arrow-left fa-lg"></i></a>
        </div>
        <div class=" col-sm-12   pt-3">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between pt-3">
                        <p class="text-primary h3">Zero Saving Challenges</p>
                    </div>

                </div>

                <div class="card-body">
                    @if($types != null)
                    <table class="table  table-hover table-striped table-md ">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Challenge Type</th>
                                <th scope="col">Number of Weeks</th>
                                <th scope="col">Amount Payable</th>
                                <th scope="col">Total Amount Earned (CFA)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($types as $index => $type)
                            <tr>
                                <th>{{$index + 1}} </th>
                                <td>{{$type->challenge_type}}</td>
                                <td>{{$type->number_of_weeks}}</td>
                                <td>{{$type->amount_payable}}</td>
                                <td>{{$type->total_amount}}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                    <div class="row justify-content-center pt-3">
                        @if($types == null)
                        <div class=" col-sm-6 text-center text-white">
                            <div class="alert alert-warning alert-dismissible fade show">
                                <strong class="text-white">You don't have any Zero Saving Challenge!</strong>
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