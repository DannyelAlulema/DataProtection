<div>
    <div class="flex justify-center items-center mt-3" style="padding: 10px">
        <div class="w-1/2" style="margin: 0 25px 0 25px;">
            <input
                class="shadow appearance-none border mx-3 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="bussines_name" type="text" placeholder="Razón Social">
        </div>
        <div class="w-1/2" style="margin: 0 25px 0 25px;">
            <input
                class="shadow appearance-none border mx-3 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="ruc" type="text" placeholder="RUC">
        </div>
    </div>

    <hr>

    <div class="flex justify-center items-center mt-3" style="padding: 10px">
        <div class="w-1/2" style="margin: 0 25px 0 25px;">
            <label class="block text-gray-700 text-sm font-bold mb-2" style="margin-bottom: 10px;">
                ¿Tu organización/empresa pertenece a alguno de estos sectores?
            </label>
            <select
                class="shadow appearance-none border mx-3 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="sectors" type="text">
                <option selected>Seleccione...</option>
                @foreach ($sectors as $sector)
                    <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                @endforeach
                <option value="0">Ninguna de las anteriores</option>
            </select>
        </div>
        <div class="w-1/2" style="margin: 0 25px 0 25px;">
            <label class="block text-gray-700 text-sm font-bold mb-2" style="margin-bottom: 10px;">
                ¿Tu organización/empresa trata alguno de los datos personales de la lista?
            </label>
            <select
                class="shadow appearance-none border mx-3 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="personal_data_uses" type="text">
                <option selected>Seleccione...</option>
                @foreach ($uses as $use)
                    <option value="{{ $use->id }}">{{ $use->name }}</option>
                @endforeach
                <option value="0">Ninguna de las anteriores</option>
            </select>
        </div>
        <div class="w-1/2" style="margin: 0 25px 0 25px;">
            <label class="block text-gray-700 text-sm font-bold mb-2" style="margin-bottom: 10px;">
                ¿Tu organización/empresa realiza alguno de los siguientes actividades con datos personales?
            </label>
            <select
                class="shadow appearance-none border mx-3 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="personal_data_activities" type="text">
                <option selected>Seleccione...</option>
                @foreach ($activities as $activity)
                    <option value="{{ $activity->id }}">{{ $activity->name }}</option>
                @endforeach
                <option value="0">Ninguna de las anteriores</option>
            </select>
        </div>
    </div>

    <div class="flex justify-start" style="padding: 10px">
            <p class="w-1/2" style="margin: 0 25px 0 25px;">
                <b>Pago: </b>
                <span>Aprobado</span>
            </p>
    </div>

    <div class="flex justify-center" style="padding: 10px">
        <button
            class="inline-flex items-center px-1 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-4">
            <i class="fa-solid fa-floppy-disk mr-2" style="font-size: 20px;"></i>Guardar
        </button>
    </div>
</div>
