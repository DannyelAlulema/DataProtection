<div>
    <div class="faq-list">
        @if (session('register-message'))
            <div class="alert alert-{{ session('type') }} alert-dismissible fade show"
                role="alert">
                <p>{{ session('register-message') }}</p>
                {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>--}}
            </div>
            @php session()->forget([ 'register-message', 'type' ]); @endphp
        @endif
        <form method="POST" action="{{ route('register') }}">
            <ul wire:ignore>
                <li data-aos="fade-up">
                    <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">
                        Formulario de Usuario
                        <i class="bx bx-chevron-down icon-show"></i>
                        <i class="bx bx-chevron-up icon-close"></i>
                    </a>
                    <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="form-label" for="name">
                                    {{ __('Razón Social') }}
                                </label>
                                <input wire:model="name" id="name" class="form-control mt-1" type="text"
                                    name="name" :value="old('name')" required autofocus autocomplete="name" />
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="form-label" for="ruc">
                                    {{ __('RUC') }}
                                </label>
                                <input wire:model="ruc" id="ruc" class="form-control mt-1" type="text"
                                    name="ruc" :value="old('ruc')" required autocomplete="ruc" />
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="form-label" for="email">
                                    {{ __('Email') }}
                                </label>
                                <input wire:model="email" id="email" class="form-control mt-1" type="email"
                                    name="email" :value="old('email')" required autocomplete="username" />
                            </div>

                            <div class="form-group col-md-6 mt-3">
                                <label wire:model="password" class="form-label" for="password">
                                    {{ __('Password') }}
                                </label>
                                <input id="password" class="form-control mt-1" type="password" name="password" required
                                    autocomplete="new-password" />
                            </div>

                            <div class="form-group col-md-6 mt-3">
                                <label wire:model="password_confirmation" class="form-label"
                                    for="password_confirmation">
                                    {{ __('Confirm Password') }}
                                </label>
                                <input id="password_confirmation" class="form-control mt-1" type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
                            </div>
                        </div>
                    </div>
                </li>

                <li data-aos="fade-up" data-aos-delay="100">
                    <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">
                        Datos corporativos
                        <i class="bx bx-chevron-down icon-show"></i>
                        <i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                        <div class="row">
                            <div class="form-group col-md-6 mt-3">
                                <label class="form-label" for="enterpriseType">
                                    {{ __('Tipo de empresa') }}
                                </label>
                                <select wire:model="enterpriseType" wire:change="validateTypes" class="form-select"
                                    name="enterpriseType" id="enterpriseType">
                                    <option selected>Seleccione...</option>
                                    <option value="NA">Otro...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 mt-3">
                                <label class="form-label" for="serviceType">
                                    {{ __('Tipo de servicio') }}
                                </label>
                                <select wire:model="serviceType" wire:change="validateTypes" class="form-select"
                                    name="serviceType" id="serviceType">
                                    <option selected>Seleccione...</option>
                                    <option value="NA">Otro...</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </form>
    </div>

    <div class="d-flex justify-content-around align-items-center mt-4">
        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div>
                <label class="form-label" for="terms">
                    <div class="d-flex justify-items-center">
                        <input type="checkbox" name="tems" id="terms"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" required>

                        <div class="mx-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' =>
                                    '<a target="_blank" href="' .
                                    route('terms.show') .
                                    '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                    __('Terms of Service') .
                                    '</a>',
                                'privacy_policy' =>
                                    '<a target="_blank" href="' .
                                    route('policy.show') .
                                    '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                    __('Privacy Policy') .
                                    '</a>',
                            ]) !!}
                        </div>
                    </div>
                </label>
            </div>
        @endif

        <a href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>
    </div>

    <div class="d-flex justify-content-center mt-4">
        <button class="btn btn-outline-primary">
            {{ __('Register') }}
        </button>
    </div>
</div>
