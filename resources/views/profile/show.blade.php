@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <div class="row">
      <div class="col-md-3 p-">
        <img class="rounded-circle img-fluid" src="https://static.toiimg.com/thumb/msid-53694237,width-640,resizemode-4/53694237.jpg" alt="555">
      </div>
      <div class="col-md-9">
        <div class="d-flex justify-content-between align-items-baseline"> <h1>{{$user->username ?? 'username'}}</h1><a href="/post/create" class="">Add New Post</a></div>
        <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
        <div class="d-flex">
            <div class="pr-3"><strong>153</strong> posts</div>
            <div class="pr-3"><strong>11k</strong> followers</div>
            <div class="pr-3"><strong>122</strong> following</div>
        </div>
        <div class="pt-4">{{$user->profile->title ?? 'titile'}}</div>
        <div class="pt-1">{{$user->profile->description ?? 'description'}}</div>
        <div class="pt-1"> <a href="#" class="text-dark">{{$user->profile->url ?? 'url'}}</a></div>
      </div>
    </div>

    <div class="row pt-5">
      @foreach ($user->posts as $post)
        <div class="col-md-4 mb-3">
          <a href="/post/{{$post->id}}">
          <img class="img-fluid" src="/storage/images/{{$post->image}}" alt="">
          </a>
        </div>
      @endforeach

    </div>


</div>
@endsection
