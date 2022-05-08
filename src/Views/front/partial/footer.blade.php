<footer id="footer" class="border-0" style="background-color: #3D3D3D">


  <div class="container">

    <div class="footer-widgets-wrap pb-4 clearfix">

      <div class="row">

        @if (Supreme::settings('navigation.footer_widgets') != [])
        @foreach (Supreme::settings('navigation.footer_widgets') as $key => $widget)
        <div class="col-lg-2 col-md-2 col-6">
          <div class="widget clearfix">

            <h4 class="ls0 mb-4 nott text-white">{{SupremeLang::trans_choice($widget['name']) }}</h4>

            <ul class="list-unstyled iconlist ms-0">
              @foreach ($widget['items'] as $item)
              <li class="mb-2"><a href="{{ Route::has($item['url']) ? route($item['url']) : '#' }}" class="text-white">{{SupremeLang::trans_choice($item['name']) }}</a></li>
              @endforeach
            </ul>

          </div>
        </div>
        @endforeach
        @php
        $empty_widgets = 4 - count(Supreme::settings('navigation.footer_widgets'));
        @endphp
        @endif
        @for ($i = 0; $i < $empty_widgets; $i++) <div class="col-lg-2 col-md-2 col-6">
          <div class="widget clearfix"></div>
      </div>
      @endfor

      <div class="col-lg-4 col-md-4 text-md-end">
        <div class="widget clearfix">

          <h4 class="ls0 mb-4 nott text-white">{{SupremeLang::trans_choice('navigation.central_office')}}</h4>

          <div>
            <address a class="text-white-50">
              {!!SupremeLang::trans_choice('navigation.central_office_address')!!}
            </address>
            <h3 class="mb-3"><a a class="text-white-50" href="{{SupremeLang::trans_choice('navigation.central_office_link')}}"><i class="fa-solid fa-phone me-1" style="font-size: 22px; color:white;"></i> {{SupremeLang::trans_choice('navigation.central_office_phone')}}</a></h3>
          </div>

        </div>
      </div>

    </div>

  </div>
  <div id="copyrights" class="bg-transparent">

    <div class="container clearfix">

      <div class="row justify-content-between align-items-center">
        <div class="col-md-6 text-white-50">
          {{SupremeLang::trans_choice('navigation.copyright')}}
        </div>

        <div class="col-md-6 d-md-flex text-white-50 flex-md-column align-items-md-end mt-4 mt-md-0">
          <div class="copyrights-menu copyright-links text-white-50 clearfix">
            @if (Supreme::settings('navigation.menus')['footer']['items'] != [])
            @foreach (Supreme::settings('navigation.menus')['footer']['items'] as $key => $item)
            <a href="{{ Route::has($item['url']) ? route($item['url']) : '#' }}" class="text-white-50">{{ SupremeLang::trans_choice($item['name'])}}</a>
            @if ($key < count(Supreme::settings('navigation.menus')['footer']['items']) - 1) <span>/</span>
              @endif
              @endforeach
              @endif
          </div>
        </div>
      </div>

    </div>

  </div>
  </div>
  </div>

</footer>


