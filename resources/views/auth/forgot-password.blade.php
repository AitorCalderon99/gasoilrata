@extends('layouts.app')

<!--Para subir los estilos al header y asi que se muestren bien-->
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

    #link{
        width: 20em;
        height: 4em;
        border: none !important;
        font-weight: 200;
        transition: 0.5s;
    }

    #link:hover{
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
@endpush

@section('content')
<x-guest-layout>
    <!-- Estado de la sesion -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validacion de errores -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('password.email') }}" class="container my-3">
        @csrf

        <div class="my-2 text-md text-center">
            {{ __('¿Contraseña olvidada? No hay problema. Haznos saber tu correo y te enviaremos un link para resetear tu contraseña, pudiendo así escoger una nueva.') }}
        </div>

        <!-- Correo -->
        <div class="mb-3">
            <x-label for="email" :value="__('Email')" class="form-label fw-bold text-light"/>

            <x-input id="email" class="form-control rounded-pill" type="email" name="email" :value="old('email')" required autofocus />
        </div>

        <!-- Link para resetear la cuenta -->
        <div class="d-flex justify-content-center my-4">
            <x-button id="link" class="mt-4 rounded-pill bg-black text-light d-flex align-items-center justify-center">
                {{ __('Restaurar contraseña') }}
            </x-button>
        </div>
    </form>
</x-guest-layout>
@endsection
