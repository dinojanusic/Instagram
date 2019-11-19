@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row mt-5">
        <div class="col-md-9">
          <img class="img-fluid" src="/storage/images/{{$post->image}}" alt="">
        </div>
      </div>

    </div>
@endsection
