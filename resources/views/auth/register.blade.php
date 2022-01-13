<x-guest-layout>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('register') }}" class="container">
        @csrf

        <!-- Name -->
        <div>
            <x-label for="name" :value="__('Nombre')" class="form-label fw-bold text-light"/>

            <x-input id="name" class="form-control rounded-pill" type="text" name="name" :value="old('name')" required autofocus />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-label for="email" :value="__('Correo')" class="form-label fw-bold text-light"/>

            <x-input id="email" class="form-control rounded-pill" type="email" name="email" :value="old('email')" required />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-label for="password" :value="__('Contraseña')" class="form-label fw-bold text-light"/>

            <x-input id="password" class="form-control rounded-pill"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-label for="password_confirmation" :value="__('Confirmar contraseña')" class="form-label fw-bold text-light"/>

            <x-input id="password_confirmation" class="form-control rounded-pill"
                            type="password"
                            name="password_confirmation" required />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('¿Ya tienes una cuenta?') }}
            </a>

            <button class="ml-4">
                {{ __('Registrarse') }}
            </button>
        </div>
    </form>
</x-guest-layout>

<style>
    html * {
        font-family: "Roboto";
    }   

    a{
        text-decoration: none;
        transition: 0.5s;
    }

    a:hover{
        font-weight: bold;
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

