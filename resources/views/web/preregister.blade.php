@extends('layouts.web')
@section('content')
    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="section-title">
                    <h2>¡Cuéntanos sobre tu empresa!</h2>
                    <p>
                        Selecciona las opciones acordes la actividad de tu empresa y el tratado de datos dentro de la misma
                    </p>
                </div>

                @livewire('pre-register-form')
            </div>
        </section><!-- End About Section -->
    </main><!-- End #main -->
@endsection
