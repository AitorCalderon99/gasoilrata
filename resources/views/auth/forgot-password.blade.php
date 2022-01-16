@extends('layouts.app')

@section('content')

<x-guest-layout>
    <!-- Estado de la sesion -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validacion de errores -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('password.email') }}" class="container my-3">
        @csrf

        <div class="mb-4 text-sm text-gray-600">
            {{ __('¿Te has olvidado de tu contraseña? No hay problema. Escribe tu correo y te mandaremos un link para resetear tu contraseña, que te permitira escoger una nueva.') }}
        </div>

        <!-- Correo -->
        <div class="mb-3">
            <x-label for="email" :value="__('Correo')" class="form-label fw-bold text-light"/>

            <x-input id="email" class="form-control rounded-pill" type="email" name="email" :value="old('email')" required autofocus />
        </div>

        <div class="d-flex align-items-center justify-content-center mt-4">
            <a class="text-sm mx-1 text-decoration-none" href="{{ route('login') }}">
                {{ __('Regresar') }}
            </a>

            <button id="Enviar" class="rounded-pill bg-black text-light">
                {{ __('Enviar') }}
            </button>
        </div>
    </form>
</x-guest-layout>

<style>
    body {
        background-color: #C5A880 !important;
    }
    
    html * {
        font-family: "Roboto";
    }   
    
    #Enviar{
        width: 10em;
        height: 3em;
        border: none;
        font-weight: 200;
        transition: 0.5s;
    }

    #Enviar:hover{
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

    a{
        transition: 0.5s;
    }

    a:hover{
        font-weight: bold;
    }
</style>

@endsection