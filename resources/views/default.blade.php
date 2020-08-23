@extends('layouts.app')
@section('content')
@auth
@include('home')
@endauth
@guest
<div class="container">
<h1 class="display-1">{{ __('messages.Welcome') }}</h1>
<p class="lead">
{{ __('messages.Welcome Message') }}
</p>
</div>
@endguest
@endsection