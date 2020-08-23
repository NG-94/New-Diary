@extends('layouts.app')
@section('content')
<div class="container">
<h1 class="display-1">{{$postToShow->title}}</h1>
<h2>{{$postToShow->created_at}}</h2>
<p class="lead">
{!! nl2br(e($postToShow->body)) !!}
</p>
</div>
@endsection