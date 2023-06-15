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
                @if (session('message'))
                    <div class="bg-{{ session('type') }}-100 border-{{ session('type') }}-400 text-{{ session('type') }}-700 px-4 py-3 rounded relative"
                        role="alert">
                        <span class="block sm:inline">{{ session('message') }}</span>
                    </div>
                    @php session()->forget([ 'message', 'type' ]); @endphp
                @endif
                @if (count($data) == 0)
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
                    @foreach ($data as $value)
                        @if ($value->paid)
                            @if (
                                $value->enterprise->sector_id == null &&
                                    $value->enterprise->personal_data_use_id == null &&
                                    $value->enterprise->personal_data_activity_id == null)
                                <div class="flex justify-between items-center" style="padding: 10px">
                                    <p><b>{{ $value->enterprise->bussines_name }}: </b>
                                        {{ __('Ya puede acceder a la ley de protección de datos.') }}
                                    </p>
                                </div>
                                <div class="flex flex-col" style="padding: 10px">
                                    <div class="my-1">
                                        <a href="{{ route('download', ['document' => 1, 'enterprise_id' => $value->enterprise->id]) }}"
                                            class="inline-flex items-center px-2 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 cursor-pointer">
                                            <i class="fa-solid fa-download"></i>
                                        </a>
                                        <span class="mx-1">
                                            1. POLÍTICA DE PROTECCIÓN DE DATOS PERSONALES
                                        </span>
                                    </div>
                                    <div class="my-1">
                                        <a href="{{ route('download', ['document' => 2, 'enterprise_id' => $value->enterprise->id]) }}"
                                            class="inline-flex items-center px-2 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 cursor-pointer">
                                            <i class="fa-solid fa-download"></i>
                                        </a>
                                        <span class="mx-1">
                                            2. TEXTO PARA OBTENCIÓN DEL CONSENTIMIENTO DE CLIENTES Y POTENCIALES
                                            CLIENTES
                                        </span>
                                    </div>
                                    <div class="my-1">
                                        <a href="{{ route('download', ['document' => 3, 'enterprise_id' => $value->enterprise->id]) }}"
                                            class="inline-flex items-center px-2 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 cursor-pointer">
                                            <i class="fa-solid fa-download"></i>
                                        </a>
                                        <span class="mx-1">
                                            3. CLÁUSULAS PARA EMPRESA/PERSONA A LA QUE SE ENTREGA LOS DATOS LOS CLIENTES
                                            O TRABAJADORES DE LA ORGANIZACIÓN
                                        </span>
                                    </div>
                                    <div class="my-1">
                                        <a href="{{ route('download', ['document' => 4, 'enterprise_id' => $value->enterprise->id]) }}"
                                            class="inline-flex items-center px-2 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 cursor-pointer">
                                            <i class="fa-solid fa-download"></i>
                                        </a>
                                        <span class="mx-1">
                                            4. TEXTO PARA LA OBTENCIÓN DE CONSENTIMIENTO DE TRABAJADORES
                                        </span>
                                    </div>
                                </div>
                            @elseif (
                                $value->enterprise->sector_id != null ||
                                    $value->enterprise->personal_data_use_id != null ||
                                    $value->enterprise->personal_data_activity_id != null)
                                <div class="flex justify-between items-center" style="padding: 10px">
                                    <p class="w-1/2"><b>{{ $value->enterprise->bussines_name }}: </b>
                                        Su negocio/empresa requiere una asesoría personalizada.
                                    </p>
                                    <a style="cursor: pointer;" data-bs-toggle="collapse" href="#appointmentForm"
                                        class="inline-flex items-center px-4 py-2 ml-4 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        <i class="fa-solid fa-code-pull-request mr-2"></i>
                                        <span class="mx-1">
                                            {{ __('Solicitar') }}
                                        </span>
                                    </a>
                                </div>
                            @endif
                            <div>
                                <a class="inline-flex items-center px-4 py-2 ml-4 mb-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 cursor-pointer"
                                    data-bs-toggle="collapse" href="#collapseExample" role="button"
                                    aria-expanded="false" aria-controls="collapseExample">
                                    Déjanos darte una sensoria personalizada
                                </a>
                            </div>
                            <div class="collapse{{ isset($errors) && count($errors->all()) != 0 ?? ' show' }}"
                                id="appointmentForm">
                                <hr>
                                <div class="card card-body" style="border: none !important;">
                                    @if (count($value->appointments) == 0)
                                        <form action="{{ route('appointments.store') }}" method="POST"
                                            class="flex flex-column">
                                            @csrf
                                            <input type="hidden" name="user_enterprise_id"
                                                value="{{ $value->enterprise->id }}">
                                            <div class="flex justify-center items-center" style="padding: 10px">
                                                <div class="w-1/2" style="margin: 0 25px 0 25px;">
                                                    <label class="block text-gray-700 text-sm font-bold mb-2"
                                                        style="margin-bottom: 10px;">
                                                        Elije una Fecha
                                                    </label>
                                                    <input
                                                        class="appearance-none border mx-3 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('date') ? ' is-invalid' : '' }}"
                                                        id="date" name="date" type="date"
                                                        value="{{ old('date') }}">
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('date') }}
                                                    </div>
                                                </div>
                                                <div class="w-1/2" style="margin: 0 25px 0 25px;">
                                                    <label class="block text-gray-700 text-sm font-bold mb-2"
                                                        style="margin-bottom: 10px;">
                                                        Elije la Hora de Inicio
                                                    </label>
                                                    <input
                                                        class="appearance-none border mx-3 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('start_at') ? ' is-invalid' : '' }}"
                                                        id="start_at" name="start_at" type="time"
                                                        value="{{ old('start_at') }}">
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('start_at') }}
                                                    </div>
                                                </div>
                                                <div class="w-1/2" style="margin: 0 25px 0 25px;">
                                                    <label class="block text-gray-700 text-sm font-bold mb-2"
                                                        style="margin-bottom: 10px;">
                                                        Elije la Hora de Finalización
                                                    </label>
                                                    <input
                                                        class="appearance-none border mx-3 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('end_at') ? ' is-invalid' : '' }}"
                                                        id="end_at" name="end_at" type="time"
                                                        value="{{ old('end_at') }}">
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('end_at') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <button
                                                class="inline-flex justify-center items-center px-2 py-2 mt-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                                type="submit">Solicitar</button>
                                        </form>
                                    @else
                                        <p>Ya tiene una cita agendada</p>
                                    @endif
                                </div>
                            </div>
                            <div class="collapse" id="collapseExample">
                                <hr>
                                <div class="card card-body" style="border: none !important;">
                                    Some placeholder content for the collapse component. This panel is hidden by default
                                    but revealed when the user activates the relevant trigger.
                                </div>
                            </div>
                        @else
                            <div class="flex justify-between items-center" style="padding: 10px">
                                <p class="w-1/2"><b>{{ $value->enterprise->bussines_name }}: </b> Antes de acceder a
                                    la ley
                                    de
                                    protección de datos debe cancelar los valores pendientes.</p>
                                <a href="{{ route('pay', ['user_enterprise_id' => $value->id]) }}"
                                    style="cursor: pointer;"
                                    class="inline-flex items-center px-4 py-2 ml-4 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    <i class="fa-solid fa-money-bill mr-2"></i>
                                    <span class="mx-1">
                                        {{ __('Pagar') }}
                                    </span>
                                </a>
                            </div>
                            <div>
                                <a
                                    class="inline-flex items-center px-4 py-2 ml-4 mb-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 cursor-pointer">
                                    <i class="fa-solid fa-file mr-2"></i>
                                    Documento 1
                                </a>
                                <a
                                    class="inline-flex items-center px-4 py-2 ml-4 mb-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 cursor-pointer">
                                    <i class="fa-solid fa-file mr-2"></i>
                                    Documento 2
                                </a>
                                <a
                                    class="inline-flex items-center px-4 py-2 ml-4 mb-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 cursor-pointer">
                                    <i class="fa-solid fa-file mr-2"></i>
                                    Documento 3
                                </a>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
