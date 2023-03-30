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

        <form method="POST" enctype="multipart/form-data">
            @csrf
        @foreach($days as $day)
            <div class="text-lg font-bold" >Day {{ $day }}</div>
            <div class="mt-4 flex justify-between">
                <div>
                    <x-label for="doDay{{$day}}Shift1" value="{{ __('Primary DO Shift 1') }}" />
                    <x-input id="file" class="block mt-1 w-full" type="text" name="doDay{{$day}}Shift1" autocomplete="file" />
                </div>
                
                <div>
                    <x-label for="doDay{{$day}}Shift2" value="{{ __('Primary DO Shift 2') }}" />
                    <x-input id="file" class="block mt-1 w-full" type="text" name="doDay{{$day}}Shift2" autocomplete="file" />
                </div>
            </div>

            <div class="mt-4 mb-4 flex justify-between">
                <div>
                    <x-label for="file" value="{{ __('Primary DO Shift 3') }}" />
                    <x-input id="file" class="block mt-1 w-full" type="text" name="doDay{{$day}}Shift3" autocomplete="file" />
                </div>
                
                <div>
                    <x-label for="file" value="{{ __('Primary DO Shift 4') }}" />
                    <x-input id="file" class="block mt-1 w-full" type="text" name="doDay{{$day}}Shift4" autocomplete="file" />
                </div>
            </div>

            <hr />

            <div class="mt-4 flex justify-between">
                <div>
                    <x-label for="backupDay{{$day}}Shift1" value="{{ __('Backup DO Shift 1') }}" />
                    <x-input id="file" class="block mt-1 w-full" type="text" name="backupDay{{$day}}Shift1" autocomplete="file" />
                </div>
                
                <div>
                    <x-label for="backupDay{{$day}}Shift2" value="{{ __('Backup DO Shift 2') }}" />
                    <x-input id="file" class="block mt-1 w-full" type="text" name="backupDay{{$day}}Shift2" autocomplete="file" />
                </div>
            </div>

            <div class="mt-4 mb-4 flex justify-between">
                <div>
                    <x-label for="backupDay{{$day}}Shift3" value="{{ __('Backup DO Shift 3') }}" />
                    <x-input id="file" class="block mt-1 w-full" type="text" name="backupDay{{$day}}Shift3" autocomplete="file" />
                </div>
                
                <div>
                    <x-label for="backupDay{{$day}}Shift4" value="{{ __('Backup DO Shift 4') }}" />
                    <x-input id="file" class="block mt-1 w-full" type="text" name="backupDay{{$day}}Shift4" autocomplete="file" />
                </div>
            </div>

            <hr />

            <div class="mt-4 mb-4">
                    <x-label for="file" value="{{ __('Supervisor') }}" />
                    <x-input id="file" class="block mt-1 w-full" type="text" name="supervisor{{$day}}" autocomplete="file" />
                </div>

            @endforeach

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Continue') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
