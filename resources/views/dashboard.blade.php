@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>These are your posts:</h3>
                    
                    @if(count($posts) > 0)

                    @foreach($posts as $post)
                    <div class="card my-4 p-2">
                    <a href="/posts/{{$post->id}}"><h1>{{$post->title}}</h1></a>
                    <p>{!!$post->body!!}</p>
                    <small>{{$post->created_at}}</small>
                    <a href="/posts/{{$post->id}}/edit" class="btn btn-info mt-2">Edit</a>
                        
                    {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method'=>'POST']) !!}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', ['class'=>'btn btn-danger mt-2']) }}
                    {!! Form::close() !!}  
                        
                    </div>
                    @endforeach
                    @else
                    <p>there is no post</p>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
