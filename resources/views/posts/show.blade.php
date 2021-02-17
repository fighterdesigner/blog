@extends('layouts.app')

@section('content')
<a href="/posts" class="btn btn-info">Go back</a>
<div class="my-4 p-2">
<h1>{{$post->title}}</h1>
<p>{!!$post->body!!}</p>
<small>{{$post->created_at}} by {{$post->user->name}}</small>
</div>

@if(!Auth::guest())
    @if(Auth::user()->id == $post->user_id)
<a href="/posts/{{$post->id}}/edit" class="btn btn-success">Edit</a>
{!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method'=>'POST']) !!}
{{ Form::hidden('_method', 'DELETE') }}
{{ Form::submit('Delete', ['class'=>'btn btn-danger mt-2']) }}
{!! Form::close() !!}
    @endif
@endif

@endsection