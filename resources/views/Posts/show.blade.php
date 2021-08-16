@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <img src="{{asset('storage/'.$post->image)}}" class="w-100" alt="">
            </div>
            <div class="col-4">
                <div class="d-flex align-items-center">
                    <div class="mr-3">
                        <img class="rounded-circle w-100" src="/storage/{{$post->user->profile->image}}"
                             style="max-width: 40px" alt="">
                    </div>
                    <div>
                      <div class="font-weight-bold">
                          <a href="{{route('profile.index',$post->user->id)}}"><span class="text-dark">  {{$post->user->name}}</span></a>
                          <a href="#" class="pl-3">Follow</a>
                      </div>
                    
                    </div>
                </div>
                
                
                <hr>
                
                
                <p> <span class="font-weight-bold"><a href="{{route('profile.index',$post->user->id)}}"><span class="text-dark">  {{$post->user->name}}</span></a></span>
                {{$post->caption}}
                </p>
            </div>
        </div>
    </div>

@endsection