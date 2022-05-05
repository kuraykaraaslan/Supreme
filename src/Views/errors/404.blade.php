@extends('supreme::errors.layout')

@section('content')

<div class="d-flex align-items-center justify-content-center vh-100">
            <div class="text-center">
                <h1 class="display-1 fw-bold">{{ __('supreme::messages.errors.404.title') }}</h1>
                <p class="fs-3">{{ __('supreme::messages.errors.404.message') }}</p>
                <a href="{{ Route::has('front.homepage') ? route('front.homepage') : '#' }}" class="btn btn-primary">{{ __('supreme::messages.go_home') }}</a>
            </div>
        </div>
@endsection