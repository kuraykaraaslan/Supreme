@extends('supreme::front.layouts.master')

@section('head')

@endsection

@section('content')

@include('supreme::front.partial.slider')


<div class="row" data-masonry="{&quot;percentPosition&quot;: true }" style="position: relative; height: 690px;">

    @foreach ($posts as $post)
    <div class="col-sm-6 col-lg-4 mb-4" style="position: absolute; left: 66.6667%; top: 0px;">
        <div class="card">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
            </svg>

            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
    @endforeach

</div>

@if ($posts->hasMorePages())
<!-- load dynamicly more posts with ajax -->
<div class="row">
    <div class="col-12">
        <button class="btn btn-primary" id="load-more-posts">{{ __('settings.posts.load_more') }}</button>
    </div>
</div>

@endif

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
<script>
// load more posts with ajax when the button is clicked
// load from the eloquent paginator
$('#load-more-posts').click(function() {
    var url = '{{ $posts->nextPageUrl() }}';
    $.ajax({
        url: url,
        type: 'GET',
        success: function(data) {
            // append the new posts
            $('.row').append(data);
            // masonry layout
            $('.row').masonry('append', $(data));
            // reload masonry layout
            $('.row').masonry('reloadItems');
            // reload masonry layout
            $('.row').masonry('layout');
            // check if there are more pages
            if (!data.nextPageUrl) {
                $('#load-more-posts').hide();
            }
        }
    });
});
</script>
@endsection