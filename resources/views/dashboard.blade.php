<x-app-layout>
    @if (session()->has('dashboard'))
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ session('dashboard') }}
        </h2>
    </x-slot>
    @endif
    <body>
        <div class="p-6">
            <div class="m-10 pt-4 pb-10 px-10 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <span class="font-bold text-xl">Dashboard</span>
                <img class="mx-auto" src="{{asset('images')}}/LOGODA.png" alt="logo">
            </div>
        </div>
    </body>

    
</x-app-layout>
