<x-guest-layout>
    <x-authentication-card class="max-w-md mx-auto p-6 bg-white rounded-lg shadow-lg">
        <x-slot name="logo">
            <x-authentication-card-logo class="text-center mb-6" />
        </x-slot>

        <x-validation-errors class="mb-4 text-red-600 text-sm" />

        @if (session('status'))
            <div class="mb-4 text-green-600 text-sm font-medium">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div class="flex flex-col">
                <x-label for="email" value="{{ __('Email') }}" class="text-gray-700" />
                <x-input id="email" class="block mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex flex-col">
                <x-label for="password" value="{{ __('Password') }}" class="text-gray-700" />
                <x-input id="password" class="block mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="flex items-center">
                <label for="remember_me" class="flex items-center text-sm text-gray-600">
                    <x-checkbox id="remember_me" name="remember" class="mr-2" />
                    {{ __('Remember me') }}
                </label>
            </div>

            <div class="flex items-center justify-between mt-6">
                @if (Route::has('password.request'))
                    <a class="text-sm text-indigo-600 hover:text-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
