@extends('layouts.auth')
@section('contenido')

@php
    $roles = $roles ?? collect();
@endphp

<div class="row justify-content-center align-items-center" style="margin-top: 0; padding-top: 0;">
  <div class="col-lg-6">
    <div class="box register" style="margin-top: 0; padding-top: 0;">
      <h3>Registra tu cuenta</h3>
      <form method="POST" action="{{ route('register') }}">
        @csrf

        <input type="text" name="name" placeholder="Nombre completo" value="{{ old('name') }}" required>
        @error('name')
          <div class="text-danger">{{ $message }}</div>
        @enderror

        <input type="email" name="email" placeholder="Correo electrónico o usuario" value="{{ old('email') }}" required>
        @error('email')
          <div class="text-danger">{{ $message }}</div>
        @enderror

        <input type="password" name="password" placeholder="Contraseña" required>
        @error('password')
          <div class="text-danger">{{ $message }}</div>
        @enderror

        <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" required>

        <!-- Select rol -->



        <p style="margin-top: 15px;">
          Sus datos personales serán utilizados para mejorar su experiencia en este sitio web, gestionar el acceso a su cuenta y otros fines descritos en nuestra política de privacidad.
        </p>

        <button type="submit" class="theme-btn">Registrar</button>
      </form>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="box" style="margin-top: 0; padding-top: 0;">
      <img src="{{ asset('assets/images/entrenaconnosotros.jpg') }}" alt="Imagen de entrenamiento" 
           style="width: 100%; height: 100%; object-fit: cover; display: block; border-radius: 10px;">
    </div>
  </div>
</div>

@endsection
