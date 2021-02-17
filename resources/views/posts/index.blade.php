@extends('layouts.app')

@section('content')
<h1>This is posts page</h1>

@if(count($posts) > 0)

@foreach($posts as $post)
<div class="card my-4 p-2">
<a href="/posts/{{$post->id}}"><h1>{{$post->title}}</h1></a>
<p>{!!$post->body!!}</p>
<small>{{$post->created_at}} by {{$post->user->name}}</small>
</div>
@endforeach
{{$posts->links()}}
@else
<p>there is no post</p>
@endif

@endsection