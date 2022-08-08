<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="{{'storage/logo/logo-sudesb.png'}}" class="mx-auto" alt="Logo Sudesb" style="width: 50%">
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nome Completo')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Login -->
            <div class="mt-4">
                <x-label for="login" :value="__('Login de usuário')" />

                <x-input id="login" class="block mt-1 w-full" type="text" name="login" :value="old('login')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Setor -->
            <div class="mt-4">
                <x-label for="sector_id" :value="__('Setor')" />

               <select name="sector_id" id="sector_id" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-100">
                    <option value="">Selecione um setor</option>
                    @foreach($sectors as $sector)
                        <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Senha')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirme a senha')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Já possui login?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Cadastrar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
