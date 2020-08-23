@extends('layouts.app')

@section('content')
<form action="{{ route('Post.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">{{ __('post.Title') }}</label>
<input name="title" type="text" class="form-control value={{ old('title') }} @error('title') is-invalid @enderror">

@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                </div>
                <div class="form-group">
                    <label for="body">{{ __('post.Body') }}</label>
                    <textarea class="form-control @error('body') is-invalid @enderror" name="body">{{ old('body') }}</textarea>
@error('body')
<div class="alert alert-danger">{{$message}}</div>
@enderror
                </div>
                <div class="form-group">

                    <input type="submit" class="btn btn-success btn pull-right" value="{{ __('post.Add Post') }}">
                </div>
</form>
@endsection
