<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create New York') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-4 py-4 dark:text-white">
                    <div class="w-1/2">
                        <form method="POST" action="{{ route('roles.store') }}">
                            @csrf

                            <div class="col-span-6 sm:col-span-4">
                                <x-label for="name" value="{{ __('Name') }}" />
                                <x-input id="name" name="name" type="text" class="mt-1 block w-full"/>
                                <x-input-error for="name" class="mt-2" />
                            </div>

                            <div class="mt-4 col-span-6 sm:col-span-4">
                                <x-label for="decription" value="{{ __('Description') }}" />
                                <x-textarea id="description" name="description" class="mt-1 block w-full"/>
                                <x-input-error for="description" class="mt-2" />
                            </div>

                            <div class="mt-4">
                                <x-button>Save</x-button>
                            </div>
</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
