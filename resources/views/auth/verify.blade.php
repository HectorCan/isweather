@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __('isWeather Dashboard')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8">
          <div class="card card-login card-hidden mb-3">
            <div class="card-header card-header-primary text-center">
              <p class="card-title"><strong>{{ __('Verifique su correo electrónico') }}</strong></p>
            </div>
            <div class="card-body">
              <p class="card-description text-center"></p>
              <p>
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('Un correo de verificación ha sido enviado a su correo electrónico.') }}
                    </div>
                @endif

                {{ __('Antes de proceder, verifique su correo electrónico.') }}

                @if (Route::has('verification.resend'))
                    {{ __('Si no recibio el correo') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Enviar de nuevo.') }}</button>.
                    </form>
                @endif
              </p>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection
