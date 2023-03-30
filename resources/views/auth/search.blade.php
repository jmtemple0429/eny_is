<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>
        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.search') }}">
            @csrf

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email Address') }}" />
                <x-input id="email" class="block mt-1 w-full" type="text" name="email" autocomplete="email" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Continue') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
