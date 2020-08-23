@extends('layouts.app')
@section('content')
<div class="container">
<h1 class="display-1">{{ __('post.Change Post') }}</h1>
<form action="{{route('Post.update', $postToUpdate->id)}}" method="post">
@csrf
@method('PATCH')
<div class="form-group">
                    <label for="title">{{ __('post.Title') }}</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$postToUpdate->title}}">
                    @error('title')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="body">{{ __('post.Body') }}</label>
                    <textarea class="form-control @error('body') is-invalid @enderror" name="body">{{ $postToUpdate->body }}
                    </textarea>
@error('body')
<div class="alert alert-danger">{{$message}}</div>
@enderror
                </div>
                <div class="form-group">

                    <input type="submit" class="btn btn-success btn pull-right" value="{{ __('post.Update') }}">
                </div>
</form>

</div>
@endsection