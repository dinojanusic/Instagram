@extends('layouts.app')

@section('content')
    <div class="container">
      <h1>Edit Profile</h1>

      {!! Form::open(['action' => ['ProfileController@update', $profile->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
      <div class="form-group">
          {{Form::label('title', 'Title')}}
          {{Form::text('title',$profile->title, ['class' => 'form-control', 'placeholder' => 'Caption'])}}
      </div>
      <div class="form-group">
          {{Form::label('description', 'Description')}}
          {{Form::text('description',$profile->description, ['class' => 'form-control', 'placeholder' => 'Caption'])}}
      </div>

      <hr class="my-4">
      <div class="row justify-content-center">
          {{Form::submit('Edit', ['class' =>'btn btn-danger mt-5'])}}
          {!! Form::close() !!}
      </div>
  </div>
    </div>
@endsection
