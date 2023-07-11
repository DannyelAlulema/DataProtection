<div>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-3">
        @if (session('enterprise-message'))
            <div class="bg-{{ session('type') }}-100 border border-{{ session('type') }}-400 text-{{ session('type') }}-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('enterprise-message') }}</span>
            </div>
            @php session()->forget([ 'enterprise-message', 'type' ]); @endphp
        @endif

        <div class="flex justify-center items-center mt-3" style="padding: 10px">
            <div class="w-1/2" style="margin: 0 25px 0 25px;">
                <input wire:model="bussines_name"
                    class="shadow appearance-none border mx-3 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('bussines_name') ? ' is-invalid' : '' }}"
                    id="bussines_name" type="text" placeholder="Razón social">
                <div class="invalid-feedback">
                    {{ $errors->first('bussines_name') }}
                </div>
            </div>
            <div class="w-1/2" style="margin: 0 25px 0 25px;">
                <input wire:model="ci_ruc"
                    class="shadow appearance-none border mx-3 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('ci_ruc') ? ' is-invalid' : '' }}"
                    id="ci_ruc" type="text" placeholder="RUC de la empresa">
                <div class="invalid-feedback">
                    {{ $errors->first('ci_ruc') }}
                </div>
            </div>
            <div class="w-1/2" style="margin: 0 25px 0 25px;">
                <input wire:model="phone_number"
                    class="shadow appearance-none border mx-3 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('phone_number') ? ' is-invalid' : '' }}"
                    id="phone_number" type="text" placeholder="Número telefónico de la empresa">
                <div class="invalid-feedback">
                    {{ $errors->first('phone_number') }}
                </div>
            </div>
            <div class="w-1/2" style="margin: 0 25px 0 25px;">
                <input wire:model="email" type="text"
                    class="shadow appearance-none border mx-3 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('email') ? ' is-invalid' : '' }}"
                    id="email" type="text" placeholder="Email de la empresa">
                <div class="invalid-feedback">
                    {{ $errors->first('email') }}
                </div>
            </div>
        </div>

        <div class="flex justify-center items-center mt-3" style="padding: 10px">
            <div class="w-1/2" style="margin: 0 25px 0 25px;">
                <input wire:model="legal_representative" type="text"
                    class="shadow appearance-none border mx-3 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('legal_representative') ? ' is-invalid' : '' }}"
                    id="legal_representative" type="text" placeholder="Representante legal">
                <div class="invalid-feedback">
                    {{ $errors->first('legal_representative') }}
                </div>
            </div>
            <div class="w-1/2" style="margin: 0 25px 0 25px;">
                <input wire:model="legal_representative_ci"
                    class="shadow appearance-none border mx-3 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('legal_representative_ci') ? ' is-invalid' : '' }}"
                    id="legal_representative_ci" type="text" placeholder="Número de cédula del representante legal">
                <div class="invalid-feedback">
                    {{ $errors->first('legal_representative_ci') }}
                </div>
            </div>
        </div>

        {{--<div class="flex justify-center items-center mt-3" style="padding: 10px">
            <div class="w-1/2" style="margin: 0 25px 0 25px;">
                <input wire:model="legal_representative_ci"
                    class="shadow appearance-none border mx-3 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('legal_representative_ci') ? ' is-invalid' : '' }}"
                    id="legal_representative_ci" type="text" placeholder="Número de cédula del representante legal">
                <div class="invalid-feedback">
                    {{ $errors->first('legal_representative_ci') }}
                </div>
            </div>
            <div class="w-1/2" style="margin: 0 25px 0 25px;">
                <input wire:model="legal_representative_phone"
                    class="shadow appearance-none border mx-3 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('legal_representative_phone') ? ' is-invalid' : '' }}"
                    id="legal_representative_phone" type="text" placeholder="Número telefónico del representante legal">
                <div class="invalid-feedback">
                    {{ $errors->first('legal_representative_phone') }}
                </div>
            </div>
            <div class="w-1/2" style="margin: 0 25px 0 25px;">
                <input wire:model="legal_representative_email"
                    class="shadow appearance-none border mx-3 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('legal_representative_email') ? ' is-invalid' : '' }}"
                    id="legal_representative_email" type="text" placeholder="Email del representante legal ">
                <div class="invalid-feedback">
                    {{ $errors->first('legal_representative_email') }}
                </div>
            </div>
        </div>--}}

        <div class="flex justify-center items-center mt-3" style="padding: 10px">
            <div class="w-1/2" style="margin: 0 25px 0 25px;">
                <textarea wire:model.defer="address" name="address" id="address"
                    class="shadow appearance-none border mx-3 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('address') ? ' is-invalid' : '' }}"
                    placeholder="Dirección">{{ $address }}</textarea>
                <div class="invalid-feedback">
                    {{ $errors->first('address') }}
                </div>
            </div>
            <div class="w-1/2" style="margin: 0 25px 0 25px;">
                <textarea wire:model.defer="description" name="description" id="description"
                    class="shadow appearance-none border mx-3 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('email') ? ' is-invalid' : '' }}"
                    placeholder="Descripción de la actividad">{{ $description }}</textarea>
                <div class="invalid-feedback">
                    {{ $errors->first('description') }}
                </div>
            </div>
        </div>

        <hr>

        <div class="flex justify-center items-center mt-3" style="padding: 10px">
            <div class="w-100" style="margin: 0 25px 0 25px;">
                <label class="block text-gray-700 text-sm font-bold mb-2" style="margin-bottom: 10px;">
                    ¿Cual es la categoria de tu organización/empresa?
                </label>
                <select wire:model="category_id" wire:change="setCategory"
                    class="shadow appearance-none border mx-3 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('category_id') ? ' is-invalid' : '' }}"
                    id="categories" type="text">
                    @if ($enterpriseId == 0)
                        <option value="0" selected>Seleccione...</option>
                    @endif
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    {{ $errors->first('category_id') }}
                </div>
            </div>
        </div>

        @if ($category_id != null && $category_id != 0)
            <hr>

            @if ($catSelected->code == 1)
                <div class="flex justify-center items-center mt-3" style="padding: 10px">
                    <div class="w-1/2" style="margin: 0 25px 0 25px;">
                        <label class="block text-gray-700 text-sm font-bold mb-2" style="margin-bottom: 10px;">
                            ¿Tu organización/empresa pertenece a alguno de estos sectores?
                        </label>
                        <select wire:model="sector_id"
                            class="shadow appearance-none border mx-3 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('sector_id') ? ' is-invalid' : '' }}"
                            id="sectors" type="text">
                            @if ($enterpriseId == 0 && !session('sector_id'))
                                <option selected>Seleccione...</option>
                            @endif
                            @foreach ($sectors as $sector)
                                <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                            @endforeach
                            @if ($catSelected->code == 1)
                                <option value="0">Ninguna de las anteriores</option>
                            @endif
                        </select>
                        <div class="invalid-feedback">
                            {{ $errors->first('sector_id') }}
                        </div>
                    </div>
                    <div class="w-1/2" style="margin: 0 25px 0 25px;">
                        <label class="block text-gray-700 text-sm font-bold mb-2" style="margin-bottom: 10px;">
                            ¿Tu organización/empresa trata alguno de los datos personales de la lista?
                        </label>
                        <select wire:model="personal_data_use_id"
                            class="shadow appearance-none border mx-3 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('personal_data_use_id') ? ' is-invalid' : '' }}"
                            id="personal_data_uses" type="text">
                            @if ($enterpriseId == 0 && !session('personal_data_use_id'))
                                <option selected>Seleccione...</option>
                            @endif
                            @foreach ($uses as $use)
                                <option value="{{ $use->id }}">{{ $use->name }}</option>
                            @endforeach
                            @if ($catSelected->code == 1)
                                <option value="0">Ninguna de las anteriores</option>
                            @endif
                        </select>
                        <div class="invalid-feedback">
                            {{ $errors->first('personal_data_use_id') }}
                        </div>
                    </div>
                    <div class="w-1/2" style="margin: 0 25px 0 25px;">
                        <label class="block text-gray-700 text-sm font-bold mb-2" style="margin-bottom: 10px;">
                            ¿Tu organización/empresa realiza alguno de los siguientes actividades con datos personales?
                        </label>
                        <select wire:model="personal_data_activity_id"
                            class="shadow appearance-none border mx-3 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('personal_data_activity_id') ? ' is-invalid' : '' }}"
                            id="personal_data_activities" type="text">
                            @if ($enterpriseId == 0 && !session('personal_data_activity_id'))
                                <option selected>Seleccione...</option>
                            @endif
                            @foreach ($activities as $activity)
                                <option value="{{ $activity->id }}">{{ $activity->name }}</option>
                            @endforeach
                            @if ($catSelected->code == 1)
                                <option value="0">Ninguna de las anteriores</option>
                            @endif
                        </select>
                        <div class="invalid-feedback">
                            {{ $errors->first('personal_data_activity_id') }}
                        </div>
                    </div>
                </div>

                <hr>

                <div class="flex justify-center items-center mt-3" style="padding: 10px">

                    <div class="w-1/2" style="margin: 0 25px 0 25px;">
                        <label class="block text-gray-700 text-sm font-bold mb-2" style="margin-bottom: 10px;">
                            ¿Tu organización/empresa trata datos personales de empleados a través de una tercera persona? --- entiéndase como tercera persona a una agencia de manejo de nómina.
                        </label>
                        <div>
                            <input type="radio" name="thirdPartyEmployees" id="thirdPartyEmployees1" value="1" wire:model="thirdPartyEmployees">
                            <label for="thirdPartyEmployees1">Si</label>
                        </div>
                        <div>
                            <input type="radio" name="thirdPartyEmployees" id="thirdPartyEmployees0" value="0" wire:model="thirdPartyEmployees">
                            <label for="thirdPartyEmployees0">No</label>
                        </div>
                    </div>
                    <div class="w-1/2" style="margin: 0 25px 0 25px;">
                        <label class="block text-gray-700 text-sm font-bold mb-2" style="margin-bottom: 10px;">
                            ¿Tu organización/empresa trata datos personales de candidatos? ---- Entiéndase por candidatos, las personas que envían su hoja de vida a tu organización/empresa.
                        </label>
                        <div>
                            <input type="radio" name="candidateData" id="candidateData1" value="1" wire:model="candidateData">
                            <label for="candidateData1">Si</label>
                        </div>
                        <div>
                            <input type="radio" name="candidateData" id="candidateData0" value="0" wire:model="candidateData">
                            <label for="candidateData0">No</label>
                        </div>
                    </div>
                    <div class="w-1/2" style="margin: 0 25px 0 25px;">
                        <label class="block text-gray-700 text-sm font-bold mb-2" style="margin-bottom: 10px;">
                            ¿Tu organización trata datos personales de proveedores? --- Entiéndase como proveedores a personas naturales, no jurídicas.
                        </label>
                        <div>
                            <input value="1" name="supplierData" wire:model="supplierData" id="supplierData1" type="radio">
                            <label for="supplierData1">Si</label>
                        </div>
                        <div>
                            <input value="0" name="supplierData" wire:model="supplierData" id="supplierData0" type="radio">
                            <label for="supplierData0">No</label>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center items-center mt-3" style="padding: 10px">
                    <div class="w-1/2" style="margin: 0 25px 0 25px;">
                        <label class="block text-gray-700 text-sm font-bold mb-2" style="margin-bottom: 10px;">
                            Tu organización/empresa trata datos personales de clientes o potenciales clientes? ---- Entiéndase por clientes a todo tipo de persona natural
                        </label>
                        <div>
                            <input value="1" name="customerData" wire:model="customerData" id="customerData1" type="radio">
                            <label for="customerData1">Si</label>
                        </div>
                        <div>
                            <input value="0" name="customerData" wire:model="customerData" id="customerData0" type="radio">
                            <label for="customerData0">No</label>
                        </div>
                    </div>
                    <div class="w-1/2" style="margin: 0 25px 0 25px;">
                        <label class="block text-gray-700 text-sm font-bold mb-2" style="margin-bottom: 10px;">
                            Tu organización/empresa trata datos personales de clientes o  potenciales clientes a través de una tercera persona? ---- Entiéndase por clientes a todo tipo de persona natural y como tercera persona a un contratista
                        </label>
                        <div>
                            <input value="1" name="thirdPartyCustomerData" wire:model="thirdPartyCustomerData" id="thirdPartyCustomerData1" type="radio">
                            <label for="thirdPartyCustomerData1">Si</label>
                        </div>
                        <div>
                            <input value="0" name="thirdPartyCustomerData" wire:model="thirdPartyCustomerData" id="thirdPartyCustomerData0" type="radio">
                            <label for="thirdPartyCustomerData0">No</label>
                        </div>
                    </div>
                    <div class="w-1/2" style="margin: 0 25px 0 25px;">
                        <label class="block text-gray-700 text-sm font-bold mb-2" style="margin-bottom: 10px;">
                            ¿Tu organización/empresa trata datos personales de empleados?
                        </label>
                        <div>
                            <input value="1" name="employeeData" wire:model="employeeData" id="employeeData1" type="radio">
                            <label for="employeeData1">Si</label>
                        </div>
                        <div>
                            <input value="0" name="employeeData" wire:model="employeeData" id="employeeData0" type="radio">
                            <label for="employeeData0">No</label>
                        </div>
                    </div>
                </div>
            @elseif ($catSelected->code == 2)
                <div class="flex justify-center items-center mt-3" style="padding: 10px">
                    <div class="w-1/2" style="margin: 0 25px 0 25px;">
                        <label class="block text-gray-700 text-sm font-bold mb-2" style="margin-bottom: 10px;">
                            ¿Tu organización/empresa pertenece a alguno de estos sectores?
                        </label>
                        <select wire:model="medic_dependence"
                            class="shadow appearance-none border mx-3 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('medic_dependence') ? ' is-invalid' : '' }}"
                            id="medic_dependence" type="text">
                            <option selected>Seleccione...</option>
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                        <div class="invalid-feedback">
                            {{ $errors->first('medic_dependence') }}
                        </div>
                    </div>
                    <div class="w-1/2" style="margin: 0 25px 0 25px;">
                        <label class="block text-gray-700 text-sm font-bold mb-2" style="margin-bottom: 10px;">
                            ¿Con qué finalidad son recogidos los datos de salud de los pacientes son?
                        </label>
                        <select wire:model="medic_porpose_data"
                            class="shadow appearance-none border mx-3 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('medic_porpose_data') ? ' is-invalid' : '' }}"
                            id="medic_porpose_data" type="text">
                            <option selected>Seleccione...</option>
                            <option value="1">Prestación de Servicios Médicos</option>
                            <option value="2">Elaboración y conservación de Historias Clínicas</option>
                            <option value="3">Fines de Investigación Científica</option>
                        </select>
                        <div class="invalid-feedback">
                            {{ $errors->first('medic_porpose_data') }}
                        </div>
                    </div>
                </div>
            @endif
        @endif

        <div class="flex justify-start" style="padding: 10px">
            <p class="w-1/2" style="margin: 0 25px 0 25px;">
                <b>Pago: </b>
                <span>{{ $paid ? __('Pagado') : __('Pendiente de pago') }}</span>
            </p>
        </div>

        <div class="flex justify-center" style="padding: 10px">
            @if (!$paid && $enterpriseId != 0)
                <a href="{{ route('pay', ['user_enterprise_id' => $userEnterpriseId]) }}"
                    class="inline-flex items-center px-1 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-4">
                    <i class="fa-solid fa-money-bill mr-2" style="font-size: 20px;"></i>Pagar
                </a>
            @endif
            @if (!$paid && $catSelected->code != 2)
                <button wire:click="save"
                    class="inline-flex items-center px-1 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-4">
                    <i class="fa-solid fa-floppy-disk mr-2" style="font-size: 20px;"></i>Guardar
                </button>
            @endif
        </div>
    </div>
</div>
