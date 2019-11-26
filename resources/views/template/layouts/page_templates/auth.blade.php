<div class="wrapper ">
  @include('template.layouts.navbars.sidebar')
  <div class="main-panel">
    @include('template.layouts.navbars.navs.auth')
    @yield('content')
    @include('template.layouts.footers.auth')
  </div>
</div>
