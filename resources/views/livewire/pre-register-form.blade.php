<div>
    @if (session('message'))
        <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
            <p>{{ session('message') }}</p>
        </div>
        @php session()->forget([ 'message', 'type' ]); @endphp
    @endif

    <div wire:load.disabled class="row content">
        @if ($category_id == null)
            <div class="col-12 mt-3 d-flex justify-content-around">
                @foreach ($categories as $category)
                    <div class="d-flex flex-column" style="cursor: pointer;" wire:click="setCategory({{ $category->id }})">
                        <div class="border" style="width: 175px; height: 175px;">
                            <img src="{{ $category->code != 1 ? asset('assets/img/salud.png') : asset('assets/img/empresa.png') }}"
                                alt="..." style="height: 100%">
                        </div>
                        <div class="d-flex justify-content-center">
                            <h3 class="my-2">{{ $category->name }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        @if ($category_id != null && $category_id != 0)
            @if ($this->catSelected->code == 1)
                <div class="col-12 mt-3">
                    <div class="form-group">
                        <label for="sector" class="form-label">¿Tu organización/empresa pertenece a alguno de estos
                            sectores?</label>
                        <select wire:model="sector_id" wire:change="verifySelected" class="form-control" name="sector"
                            id="sector">
                            <option selected>Seleccione...</option>
                            @foreach ($sectors as $sector)
                                <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                            @endforeach
                            @if ($catSelected->code == 1)
                                <option value="0">Ninguna de las anteriores</option>
                            @endif
                        </select>
                    </div>
                    @if ($sector_id != null || $all)
                        <div class="form-group mt-3">
                            <label for="personal_data_use" class="form-label">¿Tu organización/empresa trata alguno de
                                los
                                datos
                                personales de la lista?</label>
                            <select wire:model="personal_data_use_id" wire:change="verifySelected" class="form-control"
                                name="personal_data_use" id="personal_data_use">
                                <option selected>Seleccione...</option>
                                @foreach ($uses as $use)
                                    <option value="{{ $use->id }}">{{ $use->name }}</option>
                                @endforeach
                                @if ($catSelected->code == 1)
                                    <option value="0">Ninguna de las anteriores</option>
                                @endif
                            </select>
                        </div>
                    @endif
                    @if ($personal_data_use_id != null || $all)
                        <div class="form-group mt-3">
                            <label for="personal_data_activities" class="form-label">¿Tu organización/empresa realiza
                                alguno
                                de
                                los
                                siguientes actividades con datos personales?</label>
                            <select wire:model="personal_data_activity_id" wire:change="verifySelected"
                                class="form-control" name="personal_data_activities" id="personal_data_activities">
                                <option selected>Seleccione...</option>
                                @foreach ($activities as $activity)
                                    <option value="{{ $activity->id }}">{{ $activity->name }}</option>
                                @endforeach
                                @if ($catSelected->code == 1)
                                    <option value="0">Ninguna de las anteriores</option>
                                @endif
                            </select>
                        </div>
                    @endif
                </div>

                @if (
                    $sector_id != null &&
                        $sector_id == 0 &&
                        ($personal_data_activity_id != null && $personal_data_activity_id == 0) &&
                        ($personal_data_use_id != null && $personal_data_use_id == 0))
                    <div class="col-12 mt-3 mb-3 row">
                        <div class="col-12 col-lg-4 col-md-4">
                            <label class="form-label my-1" style="margin-bottom: 10px;">
                                ¿Tu organización/empresa trata datos personales de empleados a través de una tercera
                                persona?
                                --- entiéndase como tercera persona a una agencia de manejo de nómina.
                            </label>
                            <div>
                                <input type="radio" name="thirdPartyEmployees" id="thirdPartyEmployees1"
                                    value="1" wire:model="thirdPartyEmployees">
                                <label for="thirdPartyEmployees1">Si</label>
                            </div>
                            <div>
                                <input type="radio" name="thirdPartyEmployees" id="thirdPartyEmployees0"
                                    value="0" wire:model="thirdPartyEmployees">
                                <label for="thirdPartyEmployees0">No</label>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-md-4">
                            <label class="form-label my-1" style="margin-bottom: 10px;">
                                ¿Tu organización/empresa trata datos personales de candidatos? ---- Entiéndase por
                                candidatos,
                                las personas que envían su hoja de vida a tu organización/empresa.
                            </label>
                            <div>
                                <input type="radio" name="candidateData" id="candidateData1" value="1"
                                    wire:model="candidateData">
                                <label for="candidateData1">Si</label>
                            </div>
                            <div>
                                <input type="radio" name="candidateData" id="candidateData0" value="0"
                                    wire:model="candidateData">
                                <label for="candidateData0">No</label>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-md-4">
                            <label class="form-label my-1" style="margin-bottom: 10px;">
                                ¿Tu organización trata datos personales de proveedores? --- Entiéndase como proveedores
                                a
                                personas naturales, no jurídicas.
                            </label>
                            <div>
                                <input value="1" name="supplierData" wire:model="supplierData" id="supplierData1"
                                    type="radio">
                                <label for="supplierData1">Si</label>
                            </div>
                            <div>
                                <input value="0" name="supplierData" wire:model="supplierData" id="supplierData0"
                                    type="radio">
                                <label for="supplierData0">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-3 mb-3 row">
                        <div class="col-12 col-lg-4 col-md-4">
                            <label class="form-label my-1" style="margin-bottom: 10px;">
                                Tu organización/empresa trata datos personales de clientes o potenciales clientes? ----
                                Entiéndase por clientes a todo tipo de persona natural
                            </label>
                            <div>
                                <input value="1" name="customerData" wire:model="customerData" id="customerData1"
                                    type="radio">
                                <label for="customerData1">Si</label>
                            </div>
                            <div>
                                <input value="0" name="customerData" wire:model="customerData"
                                    id="customerData0" type="radio">
                                <label for="customerData0">No</label>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-md-4">
                            <label class="form-label my-1" style="margin-bottom: 10px;">
                                Tu organización/empresa trata datos personales de clientes o potenciales clientes a
                                través
                                de
                                una tercera persona? ---- Entiéndase por clientes a todo tipo de persona natural y como
                                tercera
                                persona a un contratista
                            </label>
                            <div>
                                <input value="1" name="thirdPartyCustomerData"
                                    wire:model="thirdPartyCustomerData" id="thirdPartyCustomerData1" type="radio">
                                <label for="thirdPartyCustomerData1">Si</label>
                            </div>
                            <div>
                                <input value="0" name="thirdPartyCustomerData"
                                    wire:model="thirdPartyCustomerData" id="thirdPartyCustomerData0" type="radio">
                                <label for="thirdPartyCustomerData0">No</label>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-md-4">
                            <label class="form-label my-1" style="margin-bottom: 10px;">
                                ¿Tu organización/empresa trata datos personales de empleados?
                            </label>
                            <div>
                                <input value="1" name="employeeData" wire:model="employeeData"
                                    id="employeeData1" type="radio">
                                <label for="employeeData1">Si</label>
                            </div>
                            <div>
                                <input value="0" name="employeeData" wire:model="employeeData"
                                    id="employeeData0" type="radio">
                                <label for="employeeData0">No</label>
                            </div>
                        </div>
                    </div>
                @endif
            @elseif ($this->catSelected->code == 2)
                <div class="col-12 mt-3">
                    <div class="form-group">
                        <label for="sector" class="form-label">
                            ¿Tienes un consultorio medico propio?
                        </label>
                        <select wire:model="medic_dependence" wire:change="verifySelected" class="form-control"
                            name="medic_dependence" id="medic_dependence">
                            <option selected>Seleccione...</option>
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    @if ($medic_dependence != null && ((bool) $medic_dependence))
                        <div class="form-group mt-3">
                            <label for="personal_data_use" class="form-label">
                                ¿Con qué finalidad son recogidos los datos de salud de los pacientes son?
                            </label>
                            <select wire:model="medic_data_porpose_id" wire:change="verifySelected"
                                class="form-control" name="medic_data_porpose" id="medic_data_porpose">
                                <option selected>Seleccione...</option>
                                @foreach ($medicDataPorposes as $medicDataPorpose)
                                    <option value="{{ $medicDataPorpose->id }}">{{ $medicDataPorpose->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                </div>
            @endif
        @endif
        @if ($all)
            <div class="col-12 mt-3 row">
                <div class="form-group my-2 col-12 col-lg-3">
                    <input wire:model="bussines_name"
                        class="form-control{{ $errors->has('bussines_name') ? ' is-invalid' : '' }}"
                        id="bussines_name" type="text"
                        placeholder="{{ $catSelected->code == 1 ? __('Razón social') : __('Nombre del médico') }}">
                    <div class="invalid-feedback">
                        {{ $errors->first('bussines_name') }}
                    </div>
                </div>
                <div class="form-group my-2 col-12 col-lg-3">
                    <input wire:model="ci_ruc" class="form-control{{ $errors->has('ci_ruc') ? ' is-invalid' : '' }}"
                        id="ci_ruc" type="text"
                        placeholder="{{ $catSelected->code == 1 ? __('RUC de la empresa') : __('RUC del médico') }}">
                    <div class="invalid-feedback">
                        {{ $errors->first('ci_ruc') }}
                    </div>
                </div>
                <div class="form-group my-2 col-12 col-lg-3">
                    <input wire:model="phone_number"
                        class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" id="phone_number"
                        type="text"
                        placeholder="{{ $catSelected->code == 1 ? __('Nro. telefónico de la empresa') : __('Número telefónico del médico') }}">
                    <div class="invalid-feedback">
                        {{ $errors->first('phone_number') }}
                    </div>
                </div>
                <div class="form-group my-2 col-12 col-lg-3">
                    <input wire:model="email" type="text"
                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email"
                        type="text"
                        placeholder="{{ $catSelected->code == 1 ? __('Email de la empresa') : __('Email del médico') }}">
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                </div>
                @if ($catSelected->code == 1)
                    <div class="form-group my-2 col-12 col-lg-6">
                        <input wire:model="legal_representative" type="text"
                            class="form-control{{ $errors->has('legal_representative') ? ' is-invalid' : '' }}"
                            id="legal_representative" type="text" placeholder="Representante legal">
                        <div class="invalid-feedback">
                            {{ $errors->first('legal_representative') }}
                        </div>
                    </div>
                    <div class="form-group my-2 col-12 col-lg-6">
                        <input wire:model="legal_representative_ci"
                            class="form-control{{ $errors->has('legal_representative_ci') ? ' is-invalid' : '' }}"
                            id="legal_representative_ci" type="text"
                            placeholder="Número de cédula del representante legal">
                        <div class="invalid-feedback">
                            {{ $errors->first('legal_representative_ci') }}
                        </div>
                    </div>
                @endif
                <div class="form-group my-2 col-12 col-lg-6">
                    <textarea wire:model.defer="address" name="address" id="address"
                        class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                        placeholder="{{ $catSelected->code == 1 ? __('Dirección') : __('Dirección del consultorio') }}">{{ $address }}</textarea>
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                </div>
                @if ($catSelected->code == 1)
                    <div class="form-group my-2 col-12 col-lg-6">
                        <textarea wire:model.defer="description" name="description" id="description"
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Descripción de la actividad">{{ $description }}</textarea>
                        <div class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </div>
                    </div>
                @endif
            </div>
            <div class="d-flex justify-content-center col-12 mt-3">
                <button wire:load.desabled wire:click="confirmRegister" class="btn-learn-more"
                    style="cursor: pointer;">Continuar con el registro</button>
            </div>
        @endif
    </div>

</div>
