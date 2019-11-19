@extends('layouts.app')

@section('content')
<div style="width: 80%;" class="container mt-5">
    <h1 class="text-center">Nove Objave</h1>
    @foreach ($posts as $post)
        <div class="row justify-content-center">
            <div class="col">
              <div class="card mb-3">
    <img class="card-img-top" style="height:600px;; width:100%;" src="/storage/images/{{$post->image}}" alt="Card image cap">
    <div class="card-body">
      <h6 class="card-title">{{$post->caption}}</h6>
      <p class="card-text">{{$post->user->username}}</p>
    </div>
  </div>
            </div>
        </div>
        <br>
        <hr class="my-4">
        <br>
    @endforeach

</div>
@endsection
