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
            <div>
                <x-label for="callId" value="{{ __('Call ID') }}" />
                <x-input id="file" class="block mt-1 w-full" type="text" name="callId" />
            </div>

            <div class="mt-4 flex justify-between">
                <div>
                    <x-label for="doDay1Shift1" value="{{ __('Responder 1 Role') }}" />
                    <x-input id="file" class="block mt-1 w-full" type="text" name="responder1role" />
                </div>
                
                <div>
                    <x-label for="doDay1Shift2" value="{{ __('Responder 1 Name') }}" />
                    <x-input id="file" class="block mt-1 w-full" type="text" name="responder1name" />
                </div>
            </div>

            <div class="mt-4 mb-4 flex justify-between">
                <div>
                    <x-label for="file" value="{{ __('Responder 1 Status') }}" />
                    <x-input id="file" class="block mt-1 w-full" type="text" name="responder1status" />
                </div>
                
                <div>
                    <x-label for="file" value="{{ __('Responder 1 Proximity') }}" />
                    <x-input id="file" class="block mt-1 w-full" type="text" name="responder1proximity"  />
                </div>
            </div>

            <hr />

            <div class="mt-4 flex justify-between">
                <div>
                    <x-label for="doDay1Shift1" value="{{ __('Responder 2 Role') }}" />
                    <x-input id="file" class="block mt-1 w-full" type="text" name="responder2role" />
                </div>
                
                <div>
                    <x-label for="doDay1Shift2" value="{{ __('Responder 2 Name') }}" />
                    <x-input id="file" class="block mt-1 w-full" type="text" name="responder2name" />
                </div>
            </div>

            <div class="mt-4 mb-4 flex justify-between">
                <div>
                    <x-label for="file" value="{{ __('Responder 2 Status') }}" />
                    <x-input id="file" class="block mt-1 w-full" type="text" name="responder2status" />
                </div>
                
                <div>
                    <x-label for="file" value="{{ __('Responder 2 Proximity') }}" />
                    <x-input id="file" class="block mt-1 w-full" type="text" name="responder2proximity" />
                </div>
            </div>

            <hr />

            <div class="mt-4 flex justify-between">
                <div>
                    <x-label for="doDay1Shift1" value="{{ __('Responder 3 Role') }}" />
                    <x-input id="file" class="block mt-1 w-full" type="text" name="responder3role" />
                </div>
                
                <div>
                    <x-label for="doDay1Shift2" value="{{ __('Responder 3 Name') }}" />
                    <x-input id="file" class="block mt-1 w-full" type="text" name="responder3name" />
                </div>
            </div>

            <div class="mt-4 mb-4 flex justify-between">
                <div>
                    <x-label for="file" value="{{ __('Responder 3 Status') }}" />
                    <x-input id="file" class="block mt-1 w-full" type="text" name="responder3status" />
                </div>
                
                <div>
                    <x-label for="file" value="{{ __('Responder 3 Proximity') }}" />
                    <x-input id="file" class="block mt-1 w-full" type="text" name="responder3proximity" />
                </div>
            </div>

            <hr />

            <div class="mt-4 flex justify-between">
                <div>
                    <x-label for="doDay1Shift1" value="{{ __('Responder 4 Role') }}" />
                    <x-input id="file" class="block mt-1 w-full" type="text" name="responder4role" autocomplete="file" />
                </div>
                
                <div>
                    <x-label for="doDay1Shift2" value="{{ __('Responder 4 Name') }}" />
                    <x-input id="file" class="block mt-1 w-full" type="text" name="responder4name" autocomplete="file" />
                </div>
            </div>

            <div class="mt-4 mb-4 flex justify-between">
                <div>
                    <x-label for="file" value="{{ __('Responder 4 Status') }}" />
                    <x-input id="file" class="block mt-1 w-full" type="text" name="responder4status" autocomplete="file" />
                </div>
                
                <div>
                    <x-label for="file" value="{{ __('Responder 4 Proximity') }}" />
                    <x-input id="file" class="block mt-1 w-full" type="text" name="responder4proxmity" autocomplete="file" />
                </div>
            </div>

            <hr />

            <div class="mt-4 flex justify-between">
                <div>
                    <x-label for="doDay1Shift1" value="{{ __('Responder 5 Role') }}" />
                    <x-input id="file" class="block mt-1 w-full" type="text" name="responder5role" autocomplete="file" />
                </div>
                
                <div>
                    <x-label for="doDay1Shift2" value="{{ __('Responder 5 Name') }}" />
                    <x-input id="file" class="block mt-1 w-full" type="text" name="responder5name" autocomplete="file" />
                </div>
            </div>

            <div class="mt-4 mb-4 flex justify-between">
                <div>
                    <x-label for="file" value="{{ __('Responder 5 Status') }}" />
                    <x-input id="file" class="block mt-1 w-full" type="text" name="responder5status" autocomplete="file" />
                </div>
                
                <div>
                    <x-label for="file" value="{{ __('Responder 5 Proximity') }}" />
                    <x-input id="file" class="block mt-1 w-full" type="text" name="responder5status" autocomplete="file" />
                </div>
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Continue') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
