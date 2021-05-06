@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-3">
        @if (Session::has('message'))
        <div class="col-6 col-md-6 col-lg-6 col-xs-12 colsm-12 text-center text-white">
            <div class="alert alert-success alert-dismissible fade show">
                <strong>{{ Session::get('message') }}</strong>
                <a href="{{route('challenges_get_challenges')}}" class="alert-link "> View Challenges</a>
                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div>
        </div>
        @endif
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-md-12 col-sm-12 col-xs-12 col-xl-12 col-lg-12 pl-3">

            <a href="{{ URL::previous() }}"><i class="fas fa-arrow-left fa-lg"></i></a>
        </div>
        <div class="col-sm-12 pt-3">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between pt-3">
                        <p class="text-primary h3">Saving Challenges</p>
                        <p><a class="btn btn-outline-primary" href="{{route('challenges_create')}}" role="button">Create Challenge</a></p>
                    </div>

                </div>

                <div class="card-body">
                    <table class="table  table-hover table-striped table-md ">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Challenge Type</th>
                                <th scope="col">Number of Weeks</th>
                                <th scope="col">Total Amount Earned (CFA)</th>
                                <th scope="col"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($saving_types != null)
                            @foreach($saving_types as $saving_type)
                            <tr>
                                <th scope="row">{{$saving_type->id}}</th>
                                <td>{{$saving_type->challengeType->challenge_type}}</td>
                                <td>{{$saving_type->number_of_weeks}}</td>
                                <td>{{$saving_type->total_amount}}</td>
                                <td>
                                    <form method="POST" action="{{route('challenges_add_challenge', $saving_type->id)}}">
                                        <button class="btn btn-outline-primary">Select Challenge</button>
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="row justify-content-center pt-3">
                        @if($saving_types != null)
                        <div>
                            {{$saving_types->links('pagination::bootstrap-4')}}
                            <p class=" text-primary"> {{ $saving_types->firstItem() }} to {{ $saving_types->lastItem() }} entries of total {{$saving_types->total()}} entries</p>
                        </div>
                        @endif
                    </div>
                    @if($saving_types == null)
                    <div class="row d-flex justify-content-center">
                        <div class="col-6 col-md-6 col-lg-6 col-xs-12 col-sm-12 text-white text-center">
                            <div class="alert alert-info alert-dismissible  show">
                                <strong class="text-white">Searched Challenge Not Found</strong>
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
<style scoped>
    /* .card-header {
        background-color: navy;
    } */
</style>
@endsection