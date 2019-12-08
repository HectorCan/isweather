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
      

      <div class="row">
        <div class="col-sm">
          <canvas id="t"></canvas>
        </div>
        <div class="col-sm">
          <canvas id="h"></canvas>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
          <canvas id="p"></canvas>
        </div>
        <div class="col-sm">
          <canvas id="l"></canvas>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.bundle.min.js"></script>
  <script>
    function parseData(data) {
      var responses = [];
      $.each(data, function () {
        var arr = this;

        var response = {
          labels: [],
          datasets: [{ data: [] }]
        };

        $.each(arr, function () {
          response.labels.push(this.created_at);
          response.datasets[0].data.push(this.value);
        });

        responses.push(response);
      });

      return responses;
    }

    function randomColor() {
      var r = Math.floor((Math.random() * 255) + 1);
      var g = Math.floor((Math.random() * 255) + 1);
      var b = Math.floor((Math.random() * 255) + 1);

      return [`rgba(${r}, ${g}, ${b}, 0.6)`, `rgba(${r}, ${g}, ${b}, 0.6)`];
    }

    $(document).ready(function() {
      $.ajax('{{route('sensor.data')}}', {
        dataType: 'json',
        success: function (res) {
          var parsedData = parseData(res);

          var canvases = ['t', 'h', 'p', 'l'];
          $.each(canvases, function (i, v) {
            var canva = document.getElementById(v).getContext('2d');
            var color = randomColor();

            parsedData[i].datasets[0].label = v;
            parsedData[i].datasets[0].backgroundColor = color[0];
            parsedData[i].datasets[0].borderColor = color[1];
            var x = new Chart(canva, {
              type: 'line',
              data: parsedData[i]
            });
          });
        },
        error: function (e) {

        },
        complete: function () {

        }
      });
    });
  </script>
@endpush
