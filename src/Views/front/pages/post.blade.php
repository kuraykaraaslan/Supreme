@extends('supreme::front.layouts.master')

@section('header')
@endsection

@section('content')
    <div class="card mt-2">
        <div class="card-header">
            <h3 class="card-title">@if (isset($post)){{ $post->title }}@else{{ __('supreme.title_not_found') }}@endif</h3>
        </div>
        <div class="card-body">
            <p>@if (isset($post)){{ $post->content }}@else{{ __('supreme.content_not_found') }}@endif</p>
        </div>
    </div>
@endsection

@section('scripts')
@endsection