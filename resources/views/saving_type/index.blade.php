@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show">
            <strong>{{ Session::get('message') }}</strong>
            <a href="/saving/get/challenges/" class="alert-link">View Challenges</a>
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
        @endif
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-md-12 col-sm-12 col-xs-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title text-primary ">Saving Challenges</h3>
                        <a class="btn btn-outline-primary" href="/saving/challenges/create" role="button">Create Challenge</a>
                    </div>

                </div>

                <div class="card-body">
                    <table class="table  table-hover table-striped table-md ">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Challenge Type</th>
                                <th scope="col">Number of Weeks</th>
                                <th scope="col">Total Amount Earned</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($saving_types as $saving_type)
                            <tr>
                                <th scope="row">{{$saving_type->id}}</th>
                                <td>{{$saving_type->challenge_type}}</td>
                                <td>{{$saving_type->number_of_weeks}}</td>
                                <td>{{$saving_type->total_amount}}</td>
                                <td>
                                    <form method="POST" action="/saving/challenges/{{$saving_type->id}}/">
                                        <button class="btn btn-outline-primary">Select Challenge</button>
                                        @csrf
                                    </form>
                                </td>
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