<div>
    @if (session('message'))
        <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
            <p>{{ session('message') }}</p>
        </div>
        @php session()->forget([ 'message', 'type' ]); @endphp
    @endif

    <div class="row content">
        <div class="col-12 mt-3 mb-3">
            <div class="form-group">
                <label for="sector" class="form-label">¿Tu organización/empresa pertenece a alguno de estos
                    sectores?</label>
                <select wire:model="sector_id" wire:change="verifySelected" class="form-control" name="sector"
                    id="sector">
                    <option selected>Seleccione...</option>
                    @foreach ($sectors as $sector)
                        <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                    @endforeach
                    <option value="0">Ninguna de las anteriores</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="personal_data_use" class="form-label">¿Tu organización/empresa trata alguno de los datos
                    personales de la lista?</label>
                <select wire:model="personal_data_use_id" wire:change="verifySelected" class="form-control"
                    name="personal_data_use" id="personal_data_use">
                    <option selected>Seleccione...</option>
                    @foreach ($uses as $use)
                        <option value="{{ $use->id }}">{{ $use->name }}</option>
                    @endforeach
                    <option value="0">Ninguna de las anteriores</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="personal_data_activities" class="form-label">¿Tu organización/empresa realiza alguno de los
                    siguientes actividades con datos personales?</label>
                <select wire:model="personal_data_activity_id" wire:change="verifySelected" class="form-control"
                    name="personal_data_activities" id="personal_data_activities">
                    <option selected>Seleccione...</option>
                    @foreach ($activities as $activity)
                        <option value="{{ $activity->id }}">{{ $activity->name }}</option>
                    @endforeach
                    <option value="0">Ninguna de las anteriores</option>
                </select>
            </div>
        </div>

        @if ($all)
            <div class="d-flex justify-content-center col-12 mt-3">
                <buuton wire:load.desabled wire:click="confirmRegister" class="btn-learn-more" style="cursor: pointer;">Continuar con el registro</buuton>
            </div>
        @endif
    </div>

</div>
