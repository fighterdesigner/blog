@extends('layouts.app')
@section('content')
<h1>{{$title}}</h1>

@if(count($skills) > 0)

@foreach($skills as $skill)
<li>{{$skill}}</li>
@endforeach

@endif

@endsection