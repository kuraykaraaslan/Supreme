<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-4">{{ Supreme::settings('app.title') }}</span>
    </a>

    <ul class="nav nav-pills">
        @foreach(Supreme::settings('navigation.menus')['main']['items'] as $item)
        @if(!isset($item['children']) || $item['children'] == [])
        <li class="nav-item">
            <a class="nav-link link-dark @if (Route::currentRouteName() == $item['url']) active @endif" href="{{ Route::has($item['url']) ? route($item['url']) : '#' }}">
                <i class="{{ $item['icon'] }}"></i>
                {{ $item['name'] }}
            </a>
        </li>
        @else
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle @if (Route::currentRouteName() == $item['url']) active @endif" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="{{ $item['icon'] }}"></i>
                {{ $item['name'] }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach($item['children'] as $child)
                <a class="dropdown-item @if (Route::currentRouteName() == $child['url']) active @endif" href="{{ Route::has($child['url']) ? route($child['url']) : '#' }}">
                    <i class="{{ $child['icon'] }}"></i>
                    {{ $child['name'] }}
                </a>
                @endforeach
            </div>
        </li>
        @endif
        @endforeach
        <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-earth-europe"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach(Supreme::settings('app.available_locales') as $key => $locale)
                    <a class="dropdown-item" href="{{ SupremeLang::alternate($key) }}">
                        {{ $locale }}
                        @endforeach
                    </a>
                </div>
        </li>

    </ul>
</header>