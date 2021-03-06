@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-3">
        @if (Session::has('message'))
        <div class=" col-sm-6 text-white text-center">
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
                        <p><a class="btn btn-outline-primary" href="{{route('challenges')}}" role="button">Add Saving Challenge</a></p>
                    </div>

                </div>
                <div class="card-body">
                    @if(count($saving_challenges) != 0)
                    <table class="table  table-hover table-striped table-md ">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Challenge Type</th>
                                <th scope="col">Number of Weeks</th>
                                <th scope="col">Total Amount Earned (CFA)</th>
                                <th scope="col"> </th>
                                <th scope="col"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($saving_challenges as $saving_challenge)
                            <tr>
                                <th scope="row">{{$saving_challenge->id}}</th>
                                <td>{{$saving_challenge->challenge_type}}</td>
                                <td>{{$saving_challenge->number_of_weeks}}</td>
                                <td>{{$saving_challenge->total_amount}}</td>
                                <td>
                                    <a class="btn btn-outline-info" href="{{route('challenges_show', $saving_challenge->id)}}" role="button">
                                        <span><i class="nav-icon fas fa-info-circle"></i></span>
                                    </a>
                                </td>
                                <td>
                                    <form method="POST" action="{{route('challenges_destroy', $saving_challenge->id)}}">
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
                            <p class="text-primary"> {{ $saving_challenges->firstItem() }} to {{ $saving_challenges->lastItem() }} entries of total {{$saving_challenges->total()}} entries</p>
                        </div>
                    </div>
                    @endif
                    @if(count($saving_challenges) == 0)
                    <div class="row justify-content-center pt-3">
                        <div class="col-sm-8 text-center">
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

</div>

@endsection