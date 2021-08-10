@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Profile Image-->
        <!-- Row Start-->
        <div class="row">
            <div class="col-3 p-5">
                <img class="rounded-circle" src="http://placehold.it/150x150" alt="Profile-Image">
            </div>
            <!-- Profile Info-->
            <div class="clo-9 pt-5">
                <div><h1>{{$user->name}}</h1></div>
                <div class="d-flex">
                    <div class="pr-5"><strong>153</strong> Posts</div>
                    <div class="pr-5"><strong>23k</strong> Followers</div>
                    <div class="pr-5"><strong>212</strong> Following</div>
                </div>
                <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
                <div>{{$user->profile->description}}</div>
                <div><a href="https://instagram.com/AhmadAliii21">{{$user->profile->url}}</a></div>
            </div>
        </div>
        <!-- Row Ends-->
        <!-- Posts -->
        <!-- Row Start-->
        <div class="row pt-4">
            <div class="col-4">
                <img class="w-100" src="http://placehold.it/300x300" alt="">
            </div>
            <div class="col-4">
                <img class="w-100" src="http://placehold.it/300x300" alt="">
            </div>
            <div class="col-4">
                <img  class="w-100" src="http://placehold.it/300x300" alt="">
            </div>
        </div>
        <!-- Row Ends-->
    </div>
@endsection
