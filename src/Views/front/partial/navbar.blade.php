<header id="header" class="border-bottom-0" data-sticky-shrink="false">
    <div id="header-wrap">
        <div class="container">
            <div class="header-row">
                <div id="logo">
                    <a href="{{ Route::has('front.homepage') ? route('front.homepage') : '#' }}" class="standard-logo" data-sticky-logo="{{asset('supreme/images/coop/logo-sticky.png')}}"><img src="{{asset('supreme/images/coop/logo.png')}}" alt="{{ Supreme::settings('app.site_name')}}"></a>
                    <a href="{{ Route::has('front.homepage') ? route('front.homepage') : '#' }}" class="retina-logo" data-sticky-logo="{{asset('supreme/images/coop/logo-sticky.png')}}"><img src="{{asset('supreme/images/coop/logo.png')}}" alt="{{ Supreme::settings('app.site_name')}}"></a>
                </div>

                <div class="header-misc">
                    <a class="top-phone" href="{{__('contact.default_phone_link')}}"><i class="fa-solid fa-phone"></i></a>
                </div>

                <div id="primary-menu-trigger">
                    <svg class="svg-trigger" viewBox="0 0 100 100">
                        <path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path>
                        <path d="m 30,50 h 40"></path>
                        <path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path>
                    </svg>
                </div>

                <nav class="primary-menu">

                    <ul class="menu-container">

                        @if (isset(Supreme::settings('navigation.menus')['main']['items']))
                        @foreach (Supreme::settings('navigation.menus')['main']['items'] as $item)
                        @if ($item['active'])
                        @if (in_array(SupremeLang::getLocale(), $item['available_locales']) || $item['available_locales'] == [] )
                        @if(!isset($item['children']) || $item['children'] == [])
                        <li class="menu-item">
                            <a class="menu-link @if (Route::current()->getName() == $item['url']) active @endif" href="{{ Route::has($item['url']) ? route($item['url']) : '#' }}">
                                <div>{{ SupremeLang::trans_choice($item['name']) }}</div>
                            </a>
                        </li>
                        @else
                        <li class="menu-item has-children">
                            <a class="menu-link @if (Route::current()->getName() == $item['url']) active @endif" href="{{ Route::has($item['url']) ? route($item['url']) : '#' }}">
                                <div>{{ SupremeLang::trans_choice($item['name']) }}</div>
                            </a>
                            <ul class="sub-menu">
                                @foreach ($item['children'] as $child)
                                @if ($item['active'])
                                @if (in_array(SupremeLang::getLocale(), $item['available_locales']) ||  $item['available_locales'] == []  )
                                <li class="menu-item"><a class="menu-link @if (Route::current()->getName() == $child['url']) active @endif" href="{{ Route::has($child['url']) ? route($child['url']) : '#' }}">{{ SupremeLang::trans_choice($child['name']) }}</a></li>
                                <div>{{ SupremeLang::trans_choice($child['name']) }}</div>
                                </a>
                                @endif
                                @endif
                        </li>
                        @endforeach
                    </ul>
                    </li>
                    @endif
                    @endif
                    @endif
                    @endforeach
                    @endif




                    </ul>

                </nav>

            </div>
        </div>
    </div>
    <div class="header-wrap-clone"></div>
</header>