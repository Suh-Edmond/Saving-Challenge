@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center pt-3">
        <div class="card" style="width: 40rem;">
            <div class="pl-4 pt-4">
                <label class="h3">Profile</label>
            </div>
            <div class="d-flex justify-content-center">
                <avatar size="170px">
                    <img src="{{asset('/dist/img/user.png')}}" style="width: 170px; height: 170px" />
                </avatar>
            </div>
            <div class="card-body justify-content-center">
                <div class="row rounded-border pb-2">
                    <div class=" col-12 col-sm-12 col-lg-12 col-xs-12">
                        <span class="pl-3 h6 "><i class="nav-icon fas fa-user pr-3"></i>
                            First Name</span>
                        <span class="pl-4 h6"><label>{{$user->first_name}}</label></span>
                    </div>
                </div>
                <div class="row rounded-border pb-2">
                    <div class=" col-12 col-sm-12 col-lg-12 col-xs-12">
                        <span class="pl-3 h6 "><i class="nav-icon fas fa-user pr-3"></i>
                            Last Name</span>
                        <span class="pl-4 h6"><label>{{$user->last_name}}</label></span>
                    </div>
                </div>
                <div class="row rounded-border pb-2">
                    <div class="col-sm-12 col-lg-12 col-xs-12 ">
                        <span class="pl-3 h6   "> <i class="nav-icon fas fa-envelope pr-3"></i>
                            Email</span>
                        <span class="pl-5 h6"><label>{{$user->email}}</label></span>
                    </div>
                </div>
                <div class="row rounded-border pb-3">
                    <div class="col-sm-12 col-lg-12 col-xs-12">
                        <span class="pl-3 h6 "><i class="nav-icon fas fa-phone-alt pr-3"></i></span>
                        Telephone
                        <span class="pl-4 h6"><label>{{$user->telephone}}</label></span>
                    </div>
                </div>
                <div class="row justify-content-center pt-3 pb-3">
                    <div>
                        <a role="button" class="btn btn-primary" href="/user/profile/{{$user->id}}/edit">
                            Update Profile
                            <span class="pl-3"><i class="fas fa-pen"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection