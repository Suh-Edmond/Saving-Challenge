@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-12 col-sm-12 col-xs-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title text-primary ">My Saving Challenges</h3>
                        <a class="btn btn-outline-primary" href="/saving/challenges" role="button">Add Saving Challenge</a>
                    </div>

                </div>
                <div class="card-body">
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
                            @foreach($savings as $saving)
                            <tr>
                                <td>{{$saving->challenge_type}}</td>
                                <td>{{$saving->number_of_weeks}}</td>
                                <td>{{$saving->total_amount}}</td>
                                <td>
                                    <a class="btn btn-outline-info" href="/saving/get/challenges/{{$saving->id}}/" role="button">View</a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal">
        <div class="modal-dialog  modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    @for($i =0; $i < 1; $i++) <p class="h6">Delete Saving Challenge? {{$savings[$i]->challenge_type}}</p>@endfor
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light  text-success" data-dismiss="modal">
                        Close</button>
                    @for($i =0; $i < 1; $i++) <form method="POST" action="/saving/get/challenges/{{$savings[$i]->id}}/">
                        @method('DELETE')
                        <button class="btn btn-light text-success">Delete</button>
                        @csrf
                        </form>
                        @endfor
                </div>
            </div>
        </div>
    </div>

</div>

@endsection