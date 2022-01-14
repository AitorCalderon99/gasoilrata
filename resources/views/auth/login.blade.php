@extends('layouts.app')

@section('content')
<x-guest-layout>
    <!-- Estado de la sesion -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validacion de errores -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('login') }}" class="container my-3">
        @csrf

        <!-- Correo -->
        <div class="mb-3">
            <x-label for="email" :value="__('Email')" class="form-label fw-bold text-light"/>
            <x-input id="email" 
                class="form-control rounded-pill" 
                type="email" 
                name="email" 
                :value="old('email')" 
                placeholder="Inserte su correo" 
                required 
                autofocus />
        </div>

        <!-- Contraseña -->
        <div id="contrasenia" class="mb-3">
            <x-label for="password" :value="__('Contraseña')" class="form-label fw-bold text-light"/>

            <x-input id="password" class="form-control rounded-pill"
                            type="password"
                            name="password"
                            placeholder="***********"
                            required autocomplete="current-password" />
            
        </div>

        <div class="d-flex justify-content-end">
            @if (Route::has('password.request'))
                <a class="link-dark text-decoration-none" href="{{ route('password.request') }}">
                    {{ __('¿Contraseña olvidada?') }}
                </a>
            @endif
        </div>

        <!-- Remember Me -->
        <!--
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>
        -->

        <!-- Boton de login -->
        <div class="d-flex align-items-center justify-content-center">
            <button id="LogBot" class="mt-4 rounded-pill bg-black text-light">
                {{ __('Log in') }}
            </button>
        </div>

        <!--Registrarse -->
        <div class="d-flex justify-content-center mb-3 mt-2">
            <!--El nombre de estas rutas esta en las rutas de "auth.php"-->
            @if (Route::has('register'))
                ¿No tienes cuenta? 
                <a href="{{ route('register') }}" class="ps-1 text-decoration-none">
                    {{ _('Registrarse') }}
                </a>
            @endif
        </div>
    </form>
</x-guest-layout>

<style>
    html * {
        font-family: "Roboto";
    }   

    a{
        transition: 0.5s;
    }

    a:hover{
        font-weight: bold;
    }

    #LogBot{
        width: 10em;
        height: 3em;
        border: none;
        font-weight: 200;
        transition: 0.5s;
    }

    #LogBot:hover{
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

    form{
        width: 80% !important;
    }
</style>

@endsection