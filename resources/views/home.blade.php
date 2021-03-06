@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <h1 class="display-1">{{ __('messages.Welcome') }} {{ Auth::user()->name}}</h1>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                {{ __('auth.Login Confirmation') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
