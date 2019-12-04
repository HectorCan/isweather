@extends('layouts.app', ['activePage' => 'sensor', 'titlePage' => __('Sensores')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        @if (isset($temperature->id))
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">whatshot</i>
                </div>
                <p class="card-category">Temperatura</p>
                <h3 class="card-title">{{ $temperature->value }}
                  <small>C</small>
                </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">date_range</i>
                  {{ $temperature->updated_at }}
                </div>
              </div>
            </div>
          </div>
        @endif

        @if (isset($humidity->id))
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">wb_cloudy</i>
                </div>
                <p class="card-category">Humedad</p>
                <h3 class="card-title">{{ $humidity->value }}
                  <small>Th</small>
                </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">date_range</i>
                  {{ $humidity->updated_at }}
                </div>
              </div>
            </div>
          </div>
        @endif

        @if (isset($pressure->id))
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">landscape</i>
                </div>
                <p class="card-category">Presión</p>
                <h3 class="card-title">{{ $pressure->value }}
                  <small>Pa</small>
                </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">date_range</i>
                  {{ $pressure->updated_at }}
                </div>
              </div>
            </div>
          </div>
        @endif

        @if (isset($light->id))
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">wb_incandescent</i>
                </div>
                <p class="card-category">Luz</p>
                <h3 class="card-title">{{ $light->value }}
                  <small>Lumen</small>
                </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">date_range</i>
                  {{ $light->updated_at }}
                </div>
              </div>
            </div>
          </div>
        @endif
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {

    });
  </script>
@endpush
