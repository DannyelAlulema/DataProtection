<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pagos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex-column" style="padding: 10px">
                    <div class="flex justify-center items-center">
                        <strong>{{ $userEnterprise->enterprise->bussines_name }}</strong>
                    </div>
                    <p>Detalle de la transaccion</p>
                    <div class="flex justify-center items-center" style="padding: 10px">
                        <div class="w-1/2" style="margin: 0 25px 0 25px;">
                            <strong>Tranferencia:</strong>
                            <br>
                            Subtotal: $XX.XX
                            <br>
                            IVA: $XX.XX
                            <br>
                            Total: $XX.XX
                        </div>
                        <div class="w-1/2" style="margin: 0 25px 0 25px;">
                            <strong>Tarjeta de Crédito o Débito:</strong>
                            <br>
                            Subtotal: $XX.XX
                            <br>
                            IVA: $XX.XX
                            <br>
                            Uso de tarjeta: $XX.XX
                            <br>
                            Total: $XX.XX
                        </div>
                    </div>
                    <i class="mt-2" style="color: red;">Tener en cuenta los valores a pagar según el tipo de transacción a ejecutar</i>
                    <hr>
                    @if (count($payRequests) == 0)
                        <p class="mt-3">Pago con tarjeta</p>
                        <form action="{{-- route('') --}}" class="flex justify-center items-center" style="padding: 10px"
                            method="POST">
                            @csrf
                            <input type="hidden" name="user_enterprise_id" value="{{ $userEnterprise->id }}">
                            <div class="w-1/2" style="margin: 0 25px 0 25px;">
                                <input name="card"
                                    class="shadow appearance-none border mx-3 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('bussines_name') ? ' is-invalid' : '' }}"
                                    id="card" type="text" placeholder="Número de tarjeta">
                                <div class="invalid-feedback">
                                    {{ $errors->first('card') }}
                                </div>
                            </div>
                            <div class="w-1/3" style="margin: 0 25px 0 25px;">
                                <input name="expiration"
                                    class="shadow appearance-none border mx-3 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('cu_cvv') ? ' is-invalid' : '' }}"
                                    id="expiration" type="text" placeholder="Fecha de Expiración">
                                <div class="invalid-feedback">
                                    {{ $errors->first('expiration') }}
                                </div>
                            </div>
                            <div class="w-1/3" style="margin: 0 25px 0 25px;">
                                <input name="cvv"
                                    class="shadow appearance-none border mx-3 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('cu_cvv') ? ' is-invalid' : '' }}"
                                    id="cvv" type="text" placeholder="CVV">
                                <div class="invalid-feedback">
                                    {{ $errors->first('cvv') }}
                                </div>
                            </div>
                            <button type="button"
                                class="inline-flex items-center px-2 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-15">
                                Pagar
                            </button>
                        </form>
                        <hr>
                        <p class="mt-3">Pago vía transferencia bancaria</p>
                        <div class="flex justify-center items-center" style="padding: 10px">
                            <div class="flex-column" style="margin: 0 10px 0 10px">
                                <b>Banco Pichincha:</b>
                                <p>N° de cuenta: xxxxxxx</p>
                                <p>Tipo de cuenta: Corriente</p>
                                <p>Titular: Xxxxxxx Xxxxx</p>
                                <p>Cédula RUC: 1700000000001</p>
                                <p>Email: xxx@xxx.xxx</p>
                            </div>
                            <div class="flex-column" style="margin: 0 10px 0 10px">
                                <b>Banco Guayaquil:</b>
                                <p>N° de cuenta: xxxxxxx</p>
                                <p>Tipo de cuenta: Corriente</p>
                                <p>Titular: Xxxxxxx Xxxxx</p>
                                <p>Cédula RUC: 1700000000001</p>
                                <p>Email: xxx@xxx.xxx</p>
                            </div>
                            <div class="flex-column" style="margin: 0 10px 0 10px">
                                <b>Produbanco:</b>
                                <p>N° de cuenta: xxxxxxx</p>
                                <p>Tipo de cuenta: Corriente</p>
                                <p>Titular: Xxxxxxx Xxxxx</p>
                                <p>Cédula RUC: 1700000000001</p>
                                <p>Email: xxx@xxx.xxx</p>
                            </div>
                        </div>
                        <hr>
                        <p class="mt-3">Subir Comprobante</p>
                        @if ($errors->any())
                            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form action="{{ route('pay-requests.store') }}" class="flex justify-center items-center"
                            style="padding: 10px" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_enterprise_id" value="{{ $userEnterprise->id }}">
                            <input type="file" name="voucher" id="voucher" style="margin-top: 10px;"
                                class="{{ $errors->has('voucher') ? ' is-invalid' : '' }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('end_at') }}
                            </div>
                            <div class="flex justify-center" style="margin: 10px 10px 0 10px">
                                <button type="submit"
                                    class="inline-flex items-center px-2 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-15">
                                    Enviar
                                </button>
                            </div>
                        </form>
                    @else
                        <p>Gracias por tu pago, por seguridad lo validaremos en un plazo máximo de 24 horas, una vez
                            revisado y aprobado recibirás un aviso vía correo electrónico caso contrario un asesor se
                            contactará contigo por medio los números de telefónicos proporcionados.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
