<x-app-layout>
    @section('custom-css')
        <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    @endsection

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if (count($enterprises) == 0)
                    <div class="flex justify-between items-center" style="padding: 10px">
                        <p class="w-1/2">No ha registrado a su empresa.</p>
                        <a href="{{ route('enterprises') }}"
                            class="inline-flex items-center px-4 py-2 ml-4 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            <i class="fa-solid fa-cash-register mr-2"></i>
                            <span class="mx-1">
                                {{ __('Registrar') }}
                            </span>
                        </a>
                    </div>
                @else
                    @foreach ($enterprises as $enterprise)
                        @if ($enterprise->paid)
                            @if (
                                $enterprise->sector_id == null &&
                                    $enterprise->personal_data_use_id == null &&
                                    $enterprise->personal_data_activity_id == null)
                                <form action="{{ route('download', ['enterprise_id' => $enterprise->enterprise_id]) }}"
                                    class="flex justify-between items-center" style="padding: 10px">
                                    <p class="w-1/2"><b>{{ $enterprise->bussines_name }}: </b> Ya puede acceder a la
                                        ley
                                        de protección de datos.</p>
                                    <x-button class="ml-4">
                                        <i class="fa-solid fa-download mr-2"></i>
                                        <span class="mx-1">
                                            {{ __('Descargar') }}
                                        </span>
                                    </x-button>
                                </form>
                            @elseif (
                                $enterprise->sector_id != null ||
                                    $enterprise->personal_data_use_id != null ||
                                    $enterprise->personal_data_activity_id != null)
                                <div class="flex justify-between items-center" style="padding: 10px">
                                    <p class="w-1/2"><b>{{ $enterprise->bussines_name }}: </b> Su negocio/empresa
                                        requiere una
                                        asesoría personalizada.</p>
                                    <a style="cursor: pointer;"
                                        class="inline-flex items-center px-4 py-2 ml-4 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        <i class="fa-solid fa-code-pull-request mr-2"></i>
                                        <span class="mx-1">
                                            {{ __('Solicitar') }}
                                        </span>
                                    </a>
                                </div>
                            @endif
                            <div>
                                <a class="inline-flex items-center px-4 py-2 ml-4 mb-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" data-bs-toggle="collapse" href="#collapseExample"
                                    role="button" aria-expanded="false" aria-controls="collapseExample">
                                    Déjanos darte una sensoria personalizada
                                </a>
                            </div>
                            <hr>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body" style="border: none !important;">
                                    Some placeholder content for the collapse component. This panel is hidden by default
                                    but revealed when the user activates the relevant trigger.
                                </div>
                            </div>
                        @else
                            <div class="flex justify-between items-center" style="padding: 10px">
                                <p class="w-1/2"><b>{{ $enterprise->bussines_name }}: </b> Antes de acceder a la ley de
                                    protección de datos debe cancelar los valores pendientes.</p>
                                <a href="{{ route('paids', ['enterprise_id' => $enterprise->id]) }}"
                                    style="cursor: pointer;"
                                    class="inline-flex items-center px-4 py-2 ml-4 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    <i class="fa-solid fa-money-bill mr-2"></i>
                                    <span class="mx-1">
                                        {{ __('Pagar') }}
                                    </span>
                                </a>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
