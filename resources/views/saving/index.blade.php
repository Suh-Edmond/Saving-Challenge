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
    <div class="row justify-content-center">
        <div class="col-12 col-md-12 col-sm-12 col-xs-12 col-xl-12">
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
                                <th scope="col">Total Amount Earned</th>
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
                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal">
                                        <span><i class="nav-icon fas fa-trash"></i></span>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
                </div>
            </div>
        </div>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal">
        <div class="modal-dialog  modal-sm modal-dialog-centered">
            <div class="modal-content">
                @if(count($saving_challenges) != 0)
                <div class="modal-body">
                    @for($i =0; $i < 1; $i++) <p class="h6">Delete Saving Challenge?</p>
                        <p>{{$saving_challenges[$i]->challenge_type}}</p>@endfor
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light  text-primary" data-dismiss="modal">
                        Close</button>
                    @for($i =0; $i < 1; $i++) <form method="POST" action="/saving/get/challenges/{{$saving_challenges[$i]->id}}/">
                        @method('DELETE')
                        <button class="btn btn-light text-danger">Delete</button>
                        @csrf
                        </form>
                        @endfor
                </div>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection