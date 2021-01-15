@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3></h3>

                        <p>Selected Challenges</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="/saving/get/challenges" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>53<sup style="font-size: 20px">%</sup></h3>

                        <p>Bounce Rate</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>44</h3>

                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>x</h3>

                        <p>Zero Saving Challenges</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="container">
            <div class="row justify-content-center pt-3">
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
                            <div class="d-flex justify-content-between pt-3">
                                <p class="text-primary h3">Saving Challenges</p>
                                <p><a class="btn btn-outline-primary" href="/saving/challenges/create" role="button">Create Challenge</a></p>
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
                            <div class="row justify-content-center pt-3">
                                <div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

@endsection