<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('¿Te has olvidado de tu contraseña? No hay problema. Escribe tu correo y te mandaremos un link para resetear tu contraseña, que te permitira escoger una nueva.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('password.email') }}" class="container">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <x-label for="email" :value="__('Correo')" class="form-label fw-bold text-light"/>

            <x-input id="email" class="form-control rounded-pill" type="email" name="email" :value="old('email')" required autofocus />
        </div>

        <div class="d-flex align-items-center justify-content-center">
            <button class="ml-3 rounded-pill bg-black text-light">
                {{ __('Link para nueva contraseña') }}
            </button>
        </div>
    </form>
</x-guest-layout>

<style>
    html * {
        font-family: "Roboto";
    }   
    
    button{
        width: 10em;
        height: 3em;
        border: none;
        font-weight: 200;
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
</style>

