<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form class="flex justify-between items-center" style="padding: 10px">
                    <p class="w-1/2">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                    <x-button class="ml-4">
                        {{ __('Descargar') }}
                    </x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
