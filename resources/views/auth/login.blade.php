@extends('layouts.auth')
@section('contenido')

@php
    $telefonoRecepcionista = app('App\Http\Controllers\RecepcionistaController')->getRecepcionistaActivo();
    $whatsappLink = $telefonoRecepcionista ? 'https://wa.me/591' . $telefonoRecepcionista . '?text=Hola,%20quiero%20solicitar%20acceso%20a%20MadBarzz' : '#';
@endphp

<div class="row justify-content-center align-items-center" style="margin-top: 0; padding-top: 0;">
  <div class="col-lg-6">
    <div class="box login">
      <h3>Inicia sesión en tu cuenta</h3>
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <!-- Correo electrónico -->
        <div class="mb-3">
          <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Nombre de usuario o correo electrónico" value="{{ old('email') }}" required autofocus>
          @error('email')
            <div class="text-danger mt-1">{{ $message }}</div>
          @enderror
        </div>

        <!-- Contraseña -->
        <div class="mb-3">
          <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Contraseña" required>
          @error('password')
            <div class="text-danger mt-1">{{ $message }}</div>
          @enderror
        </div>

        <div class="remember d-flex justify-content-between align-items-center mb-3">
          <div class="first">
            <input type="checkbox" name="remember" id="checkbox" {{ old('remember') ? 'checked' : '' }}>
            <label for="checkbox">Recuérdame</label>
          </div>
        <!--  <div class="second">
            <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
          </div>-->
        </div>
        <button type="submit" class="theme-btn w-100">Iniciar sesión</button>
      </form>
      <p style="margin-top: 30px;">¿Se te olvidó tu contraseña? <a href="{{ $whatsappLink }}" target="_blank">Solicita acceso en recepción</a></p>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="box">
      <img src="{{ asset('assets/images/senotagym.jpg') }}" alt="Imagen del gimnasio" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;">
    </div>
  </div>
</div>

@endsection