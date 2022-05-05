@extends('supreme::settings.layouts.master')

@section('title', __('settings.posts.title'))

@section('header')
<!-- CDN for Datatables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
@endsection

@section('content')
<!-- a card with datatable for posts -->
<div class="card mt-2">
    <div class="card-header">
        <h3 class="card-title">{{ __('settings.posts.title')}}</h3>
    </div>
    <div class="card-body">
        <table id="posts" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>{{ __('settings.table.id') }}</th>
                    <th>{{ __('settings.table.title') }}</th>
                    <th>{{ __('settings.table.content') }}</th>
                    <th>{{ __('settings.table.created_at') }}</th>
                    <th>{{ __('settings.table.updated_at') }}</th>
                    <th>{{ __('settings.table.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach (Supreme::posts() as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->updated_at }}</td>
                    <td>
                        <a href="{{ route('settings.posts.edit', $post->id) }}" class="btn btn-primary">{{ __('settings.posts.edit') }}</a>
                        <a href="{{ route('settings.posts.delete', $post->id) }}" class="btn btn-danger">{{ __('settings.posts.delete') }}</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#posts').DataTable({
            "language": {
                "url": "{{ asset('vendor/datatables/lang/' . app()->getLocale() . '.json') }}"
            }
        });
    });
</script>
@endsection

