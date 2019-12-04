<div class="sidebar" data-color="green" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="#" class="simple-text logo-normal">
      {{ __('isWeather') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
        <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('home') }}">
            <i class="material-icons">dashboard</i>
              <p>{{ __('Dashboard') }}</p>
          </a>
        </li>

        <li class="nav-item{{ $activePage == 'sensor' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('sensor.index') }}">
            <i class="material-icons">wb_sunny</i>
              <p>{{ __('Sensores') }}</p>
          </a>
        </li>
    </ul>
  </div>
</div>
