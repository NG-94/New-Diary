@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('auth.Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('auth.Verify Email Confirmation') }}
                        </div>
                    @endif

                    {{ __('auth.Verification Check Message') }}
                    {{ __('auth.If Email Not Recieved') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('auth.Resend Verification Email') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
