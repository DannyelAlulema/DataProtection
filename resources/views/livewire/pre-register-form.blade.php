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
                            <img src="{{ ($category->code != 1) ? asset('assets/img/salud.png') : asset('assets/img/empresa.png') }}" alt="..." style="height: 100%">
                        </div>
                        <div class="d-flex justify-content-center">
                            <h3 class="my-2">{{ $category->name }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        @if ($category_id != null && $category_id != 0)
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
                <div class="form-group mt-3">
                    <label for="personal_data_use" class="form-label">¿Tu organización/empresa trata alguno de los
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
                <div class="form-group mt-3">
                    <label for="personal_data_activities" class="form-label">¿Tu organización/empresa realiza alguno
                        de
                        los
                        siguientes actividades con datos personales?</label>
                    <select wire:model="personal_data_activity_id" wire:change="verifySelected" class="form-control"
                        name="personal_data_activities" id="personal_data_activities">
                        <option selected>Seleccione...</option>
                        @foreach ($activities as $activity)
                            <option value="{{ $activity->id }}">{{ $activity->name }}</option>
                        @endforeach
                        @if ($catSelected->code == 1)
                            <option value="0">Ninguna de las anteriores</option>
                        @endif
                    </select>
                </div>
            </div>

            <div class="col-12 mt-3 mb-3 row">
                <div class="col-12 col-lg-4 col-md-4">
                    <label class="form-label my-1" style="margin-bottom: 10px;">
                        ¿Tu organización/empresa trata datos personales de empleados a través de una tercera
                        persona?
                        --- entiéndase como tercera persona a una agencia de manejo de nómina.
                    </label>
                    <div>
                        <input type="radio" name="thirdPartyEmployees" id="thirdPartyEmployees1" value="1"
                            wire:model="thirdPartyEmployees">
                        <label for="thirdPartyEmployees1">Si</label>
                    </div>
                    <div>
                        <input type="radio" name="thirdPartyEmployees" id="thirdPartyEmployees0" value="0"
                            wire:model="thirdPartyEmployees">
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
                        ¿Tu organización trata datos personales de proveedores? --- Entiéndase como proveedores a
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
                        <input value="0" name="customerData" wire:model="customerData" id="customerData0"
                            type="radio">
                        <label for="customerData0">No</label>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-4">
                    <label class="form-label my-1" style="margin-bottom: 10px;">
                        Tu organización/empresa trata datos personales de clientes o potenciales clientes a través
                        de
                        una tercera persona? ---- Entiéndase por clientes a todo tipo de persona natural y como
                        tercera
                        persona a un contratista
                    </label>
                    <div>
                        <input value="1" name="thirdPartyCustomerData" wire:model="thirdPartyCustomerData"
                            id="thirdPartyCustomerData1" type="radio">
                        <label for="thirdPartyCustomerData1">Si</label>
                    </div>
                    <div>
                        <input value="0" name="thirdPartyCustomerData" wire:model="thirdPartyCustomerData"
                            id="thirdPartyCustomerData0" type="radio">
                        <label for="thirdPartyCustomerData0">No</label>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-4">
                    <label class="form-label my-1" style="margin-bottom: 10px;">
                        ¿Tu organización/empresa trata datos personales de empleados?
                    </label>
                    <div>
                        <input value="1" name="employeeData" wire:model="employeeData" id="employeeData1"
                            type="radio">
                        <label for="employeeData1">Si</label>
                    </div>
                    <div>
                        <input value="0" name="employeeData" wire:model="employeeData" id="employeeData0"
                            type="radio">
                        <label for="employeeData0">No</label>
                    </div>
                </div>
            </div>

        @endif
        @if ($all)
            <div class="d-flex justify-content-center col-12 mt-3">
                <buuton wire:load.desabled wire:click="confirmRegister" class="btn-learn-more"
                    style="cursor: pointer;">Continuar con el registro</buuton>
            </div>
        @endif
    </div>

</div>
