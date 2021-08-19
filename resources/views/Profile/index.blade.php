@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Profile Image-->
        <!-- Row Start-->
        <div class="row">
            <div class="col-3 p-5">
                <img class="rounded-circle w-100" src="{{asset($user->profile->ProfileImage())}}" alt="Profile-Image">
            </div>
            <!-- Profile Info-->
            <div class="clo-9 pt-5">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center pb-4">
                        <div class="h4">{{$user->name}}</div>
                    @if(auth()->user()->id != $user->id)
                        <!--TODO:  Vue  -->
                            <follow-button user-id={{$user->id}} follows="{{$follows}}"></follow-button>
                        @endif
                    </div>
                    <!-- Policy -->
                    @can('update',$user->profile)
                        <a href="{{route('posts.create')}}">Add new Posts</a>
                    @endcan
                </div>
                <!-- Policy -->
                @can('update',$user->profile)
                    <a href="{{route('profile.edit',$user->id)}}">Edit Profile</a>
                @endcan
                <div class="d-flex mt-1">
                    <div class="pr-5"><strong>{{ $count_posts }}</strong> Posts</div>
                    <div class="pr-5"><strong>{{$user->profile->followers->count()}}</strong> Followers</div>
                    <div class="pr-5"><strong>{{$user->following->count()}}</strong> Following</div>
                </div>
                <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
                <div>{{$user->profile->description}}</div>
                <div><a href="https://instagram.com/AhmadAliii21">{{$user->profile->url}}</a></div>
            </div>
        </div>
        <!-- Row Ends-->
        <hr>
        <!-- Posts -->
        <!-- Row Start-->
        @if($user->posts->count() > 0)
            <div class="row pt-4">
                @foreach($user->posts as $post)
                    <div class="col-4 pb-4">
                        <a href="{{route('posts.show',$post->id)}}">
                            <img class="w-100 border border-light  rounded" src="{{asset('storage/'.$post->image)}}"
                                 alt="image">
                        </a>
                    </div>
                @endforeach

            </div>
        @else
            <div class="col-8 offset-4 mt-5">
                <div class="row">
                    <h1>No Posts Available</h1>
                </div>
            </div>
    @endif
    <!-- Row Ends-->
    </div>
@endsection
