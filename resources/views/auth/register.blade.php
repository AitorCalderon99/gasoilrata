@extends('layouts.app')

<!--Para subir lo estilos al header y asi que se muestren bien-->
@push('head')
<style>
    body {
        background-color: #C5A880 !important;
    }
    
    html * {
        font-family: "Hemi head";
    }   

    a{
        transition: 0.5s;
    }

    a:hover{
        font-weight: bold;
    }

    #Registro{
        width: 10em;
        height: 3em;
        border: none;
        font-weight: 200;
    }

    #Registro:hover{
        background-color: white !important;
        color: #C5A880 !important;
    }

    #contrasenia > input{
        padding-top: 6px;
        padding-bottom: 2px;
    }

    input{
        opacity: 56%;
    }

    body{
        background-color: #C5A880;
    }

    form{
        width: 80% !important;
    }
</style>
@endpush

@section('content')
<x-guest-layout>
    <!-- Validacion de errores -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('register') }}" class="container my-3">
        @csrf

        <!-- Nombre -->
        <div>
            <x-label for="name" 
                :value="__('Nombre')" 
                class="form-label fw-bold text-light"/>

            <x-input id="name" 
                class="form-control rounded-pill" 
                type="text" 
                name="name" 
                :value="old('name')" 
                required autofocus />
        </div>

        <!-- Correo -->
        <div class="mt-4">
            <x-label for="email" 
            :value="__('Correo')" 
            class="form-label fw-bold text-light"/>

            <x-input id="email" 
                class="form-control rounded-pill" 
                type="email" 
                name="email" 
                :value="old('email')" 
                required />
        </div>

        <!-- Contraseña -->
        <div class="mt-4">
            <x-label for="password" 
                :value="__('Password')" 
                class="form-label fw-bold text-light"/>

            <x-input id="password" 
                class="form-control rounded-pill" 
                type="password" 
                name="password" 
                required autocomplete="new-password" />
        </div>

        <!-- Confirmar contraseña -->
        <div class="mt-4">
            <x-label for="password_confirmation" 
                :value="__('Confirm Password')" 
                class="form-label fw-bold text-light"/>

            <x-input id="password_confirmation" 
                class="form-control rounded-pill"
                type="password" 
                name="password_confirmation" 
                required />
        </div>

        <!-- Recordatorio + confirmar registro -->
        <div class="d-flex align-items-center justify-content-center mt-3">
            <a class="text-sm mx-1 text-decoration-none" href="{{ route('login') }}">
                {{ __('¿Ya tienes una cuenta?') }}
            </a>

            <x-button id="Registro" class="rounded-pill bg-black text-light mx-1">
                {{ __('Registrarse') }}
            </x-button>
        </div>
    </form>
</x-guest-layout>

@endsection