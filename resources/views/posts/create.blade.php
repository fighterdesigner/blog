@extends('layouts.app')

@section('content')


<h1>Create posts page</h1>

{!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title','', ['class'=>'form-control', 'placeholder'=>'Enter the title...'])}}
    </div>
    <div class="form-group">
        {{Form::label('body','Body')}}
        {{Form::textarea('body','', ['placeholder'=>'Enter the body...', 'id'=>'article-ckeditor'])}}
    </div>
{{Form::submit('Submit', ['class' => 'btn btn-primary','id'=>'submit-btn'])}}
{!! Form::close() !!}

@endsection