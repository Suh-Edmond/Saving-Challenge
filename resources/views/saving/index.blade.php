@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-3">
        @if (Session::has('message'))
        <div class="col-12 col-md-12 col-lg-12 col-xs-12 col-sm-12 text-whiten text-center">
            <div class="alert alert-success alert-dismissible fade show">
                <strong>{{ Session::get('message') }}</strong>
                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div>
        </div>
        @endif
    </div>
    <div class="row justify-content-center ">
        <div class="col-12 col-md-12 col-sm-12 col-xs-12 col-xl-12 col-lg-12 pl-3">

            <a href="{{ URL::previous() }}"><i class="fas fa-arrow-left fa-lg"></i></a>
        </div>
        <div class="col-12 col-md-12 col-sm-12 col-xs-12 col-xl-12 pt-3">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between pt-3">
                        <p class=" text-primary h3">My Saving Challenges</p>
                        <p><a class="btn btn-outline-primary" href="/saving/challenges" role="button">Add Saving Challenge</a></p>
                    </div>

                </div>
                <div class="card-body">
                    @if(count($saving_challenges) != 0)
                    <table class="table  table-hover table-striped table-md ">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col">Challenge Type</th>
                                <th scope="col">Number of Weeks</th>
                                <th scope="col">Total Amount Earned (CFA)</th>
                                <th scope="col">Action</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($saving_challenges as $saving_challenge)
                            <tr>
                                <td>{{$saving_challenge->challenge_type}}</td>
                                <td>{{$saving_challenge->number_of_weeks}}</td>
                                <td>{{$saving_challenge->total_amount}}</td>
                                <td>
                                    <a class="btn btn-outline-info" href="/saving/get/challenges/{{$saving_challenge->id}}/" role="button">
                                        <span><i class="nav-icon fas fa-info-circle"></i></span>
                                    </a>
                                </td>
                                <td>
                                    <form method="POST" action="/saving/get/challenges/{{$saving_challenge->id}}/">
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger">
                                            <span><i class="nav-icon fas fa-trash"></i></span>
                                        </button>
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row justify-content-center pt-3">
                        <div>
                            {{$saving_challenges->links('pagination::bootstrap-4')}}

                        </div>
                    </div>
                    @endif
                    @if(count($saving_challenges) == 0)
                    <div class="row justify-content-center pt-3">
                        <div class="col-12 col-md-12 col-lg-12 col-xs-12 col-sm-12 text-center">
                            <div class="alert alert-warning alert-dismissible fade show">
                                <strong class="text-white">You don't have any Saving Challenge! select a Challenge</strong>
                                <button type="button" class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- <div class="pt-2 fw-normal">
                        <label>Total Number of Selected Saving Challenges: {{count($saving_challenges)}}</label>
                    </div> -->

                </div>
            </div>
        </div>

    </div>


</div>

@endsection