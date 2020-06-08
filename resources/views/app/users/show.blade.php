@extends('adminlte::page')

@section('content_header')
    <style>
        .img-profile {
            display: block;
            margin-left: auto;
            width: 150px;
            max-width: 150px;
            margin-right: auto
        }
    </style>
@endsection

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="box-profile">
                        <div class="text-center">
                            <img class="img-profile img-responsive" src="../../../../../assets/img/avatar.png" alt="">
                        </div>
                        <h3 class="profile-username text-center">{{ $user->name }}</h3>
                        <p class="text-muted text-center">{{ $user->email }}</p>
                        <p class="text-muted text-center">{{ $user->position }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
