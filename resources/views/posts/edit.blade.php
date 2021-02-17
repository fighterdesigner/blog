@extends('layouts.app')

@section('content')


<h1>Create posts page</h1>

{!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title',$post->title, ['class'=>'form-control', 'placeholder'=>'Enter the title...'])}}
    </div>
    <div class="form-group">
        {{Form::label('body','Body')}}
        {{Form::textarea('body',$post->body, ['placeholder'=>'Enter the body...', 'id'=>'article-ckeditor'])}}
    </div>
{{FORM::hidden('_method','PUT')}}
{{Form::submit('Submit', ['class' => 'btn btn-primary','id'=>'submit-btn'])}}
{!! Form::close() !!}

@endsection