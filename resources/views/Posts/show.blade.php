@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <img src="{{asset('storage/'.$post->image)}}" class="w-100" alt="">
            </div>
            <div class="col-4">
                <h3>{{$post->user->name}}</h3>
                <h3>{{$post->caption}}</h3>
            </div>
        </div>
    </div>

@endsection