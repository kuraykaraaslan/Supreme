<!DOCTYPE html>
<html lang="{{App::getLocale()}}">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('supreme/css/bootstrap.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('supreme/css/style.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('supreme/css/swiper.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('supreme/css/dark.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('supreme/css/animate.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('supreme/css/magnific-popup.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('supreme/css/yapi.css')}}" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.css">

    {!! SupremeSEO::generate() !!}
    @yield('head')
</head>

<body class="stretched">
	<div id="wrapper" class="boxed">
        @include('supreme::front.partial.topbar')
        @include('supreme::front.partial.navbar')
        <section id="content">
			<div class="content-wrap pt-3 pb-6">
            @yield('content')
            </div>
		</section>
        @include('supreme::front.partial.footer')
    </div>

    @if (Session::get('cookie') != 'accepted')
	<div class="alert text-center cookiealert" role="alert" style="background-color: #99855F;">
	     {!!__('supreme::messages.cookie_alert') !!} <a href="{{ Route::has('front.terms') ? route('front.terms') : '#' }}"></a>

		

		<button type="button" id="cookie-alert" class="btn btn-primary btm-yapi-kahverengi btn-sm acceptcookies">
		{{__('supreme::messages.cookie_accept')}}
		</button>
	</div>
    @endif

    <div id="gotoTop" class="icon-angle-up"></div>
	<script src="{{asset('supreme/js/jquery.js')}}"></script>
	<script src="{{asset('supreme/js/plugins.min.js')}}"></script>
	<script src="{{asset('supreme/js/functions.js')}}"></script>
	<script src="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.js"></script>

    @yield('scripts')



    <!-- Bootstrap JavaScript Libraries -->
</body>

</html>