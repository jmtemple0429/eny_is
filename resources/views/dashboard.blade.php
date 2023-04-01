<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-4 py-4 dark:text-white">
                    @if(auth()->user()->password !== null) 
                       <p>This account is registered as a Data Ingest Account. See links below:</p>

                       <div class="mt-4 flex justify-between">
                            <div><a href="{{ route('ingest.vcn.members') }}"><x-button>Volunteer Connection</x-button></a></div>  
                            <div><a href="{{ route('ingest.rcc.cases') }}"><x-button>RC CARE</x-button></a></div>  
                            <div><a href="{{ route('ingest.rcr.calls') }}"><x-button>RC Respond</x-button></a></div>  
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
