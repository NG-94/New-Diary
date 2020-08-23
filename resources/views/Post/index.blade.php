@extends('layouts.app')
@section('content')
<div class="container">
<h1 class="display-1">{{ __('post.Show Posts') }}</h1>
<p class="lead">
{{ __('post.Show Posts Message') }}
</p>
@if ($allPosts->count())
<div class="table-responsive">
<table class="table">
<caption>{{ __('post.Post List') }}</caption>
<thead class="thead-light">
<tr>
<th scope="col">{{ __('post.Title') }}</th>
<th scope="col">{{ __('post.Created') }}</th>
<th scope="col">{{ __('post.Updated') }}</th>
</tr>
</thead>
<tbody>
@foreach ($allPosts as $post)
<tr>
<th scope="row">
<a href="{{route('Post.show', $post->id)}}">{{$post->title}}</a>
</th>
<td>{{$post->created_at}}</td>
<td>{{$post->updated_at}}</td>
<td>
<a href="{{route('Post.edit', $post->id)}}">{{ __('post.Edit') }}</a>
</td>

<td>
<form action="{{route('Post.destroy', $post->id)}}" method="post">
@csrf
@method('DELETE')
<div class="form-group">

                    <button type="submit" class="btn btn-success btn pull-right">{{ __('post.Delete') }}</button>
                </div>

</form>
</td>
</tr>
@endforeach

</tbody>
</table>
</div>
@else
<div class="alert alert-info">
{{ __('post.No Posts Found') }}
</div>
@endif
</div>
@endsection
