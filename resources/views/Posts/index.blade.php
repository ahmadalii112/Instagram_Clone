@extends('layouts.app')

@section('content')
    <div class="container">
        @if($posts->count() > 0)
            @foreach($posts as $post)
                <div class="row">
                    <div class="col-6 offset-3">
                        <a href="/profile/{{$post->user->id}}"> <img src="{{asset('storage/'.$post->image)}}"
                                                                     class="w-100 border shadow" alt=""></a>
                    </div>
                </div>
                <div class="row pt-2 pb-4">
                    <div class="col-6 offset-3">
                        <p><span class="font-weight-bold"><a href="{{route('profile.index',$post->user->id)}}"><span
                                            class="text-dark">  {{$post->user->name}}</span></a></span>
                            {{$post->caption}}
                        </p>
                    </div>
                </div>
            @endforeach
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    {{$posts->links()}}
                </div>
            </div>
        @else
            <div class="card">
                <div class="card-body text-center m-5">
                    <h1 style="font-size: 60px;font-family: 'Style Script', cursive; ">You Haven't Follow Any One </h1>
                </div>
            </div>
            <div class="card">
                <div class="card-header text-center"
                     style="font-size: 24px;font-family: 'Style Script', cursive; ">{{ __('Suggestions') }}</div>
                <div class="card-body text-center m-5">
                    <div class="row">
                        @foreach($profile as $user)
                            <div class="col-4 mb-3">
                                <div class="d-flex justify-content-start align-items-center">
                                    <a href="profile/{{$user->user->profile->id}}" class="">
                                        <img src="{{($user->image) ?asset('/storage/'.$user->image) : 'https://freesvg.org/img/userMale.png'}}"
                                             style="max-width: 40px" class="rounded-circle mr-4" alt="">{{$user->user->username}}
                                    </a>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        @endif
    </div>

@endsection