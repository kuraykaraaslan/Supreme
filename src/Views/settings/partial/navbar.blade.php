<nav class="navbar navbar-expand-lg navbar-dark bg-dark mt-2">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('settings.homepage') }}">
            {{ Supreme::settings('settings.title') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-lg-0">
                @foreach(Supreme::settings('settings.navigation')['main']['items'] as $item)
                <!-- bootstrap 5.1 menu item -->
                @if(!isset($item['children']))
                <li class="nav-item">
                    <a class="nav-link" href="{{ Route::has($item['url']) ? route($item['url']) : '#' }}">
                        <i class="{{ $item['icon'] }}"></i>
                        {{ $item['name'] }}
                    </a>
                </li>
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="{{ $item['icon'] }}"></i>
                        {{ $item['name'] }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($item['children'] as $child)
                        <a class="dropdown-item" href="{{ Route::has($child['url']) ? route($child['url']) : '#' }}">
                            <i class="{{ $child['icon'] }}"></i>
                            {{ $child['name'] }}
                        </a>
                        @endforeach
                    </div>
                </li>
                @endif


                @endforeach
            </ul>
            <form class="d-flex  mb-lg-0">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>