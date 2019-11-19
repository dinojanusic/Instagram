@extends('layouts.app')

@section('content')
    <div class="container">
      <h1>add New Post</h1>

      {!! Form::open(['action' => 'PostController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
      <div class="form-group">
          {{Form::label('caption', 'Caption')}}
          {{Form::text('caption','', ['class' => 'form-control', 'placeholder' => 'Caption'])}}
      </div>
      <div class="form-group mt-5">
      <div class="custom-file">

        {{Form::label('image', 'Image', ['class' => 'custom-file-label', 'placeholder' => 'Izaberite sliku..'])}}
        {{Form::file('image', ['class' => 'custom-file-input'])}}

      </div>
      </div>
      <hr class="my-4">
      <div class="row justify-content-center">
          {{Form::submit('add New Post', ['class' =>'btn btn-danger mt-5'])}}
          {!! Form::close() !!}
      </div>
  </div>
    </div>
@endsection
