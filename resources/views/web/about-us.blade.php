@extends('layouts.web')

@section('content')
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center ">
        <div class="container-fluid d-flex align-items-center justify-content-lg-between">

            <h1 class="logo me-auto me-lg-0"><a href="index.html">LPD</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto" href="{{ url('/') }}#hero">Inicio</a></li>
                    <li><a class="nav-link scrollto" href="{{ url('/') }}#about">Nosotros</a></li>
                    <li><a class="nav-link scrollto" href="{{ url('/') }}#services">Servicios</a></li>
                    <li><a class="nav-link scrollto" href="{{ url('/') }}#team">Equipo</a></li>
                    <li><a class="nav-link scrollto" href="{{ url('/') }}#contact">Contacto</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <div class="header-social-links d-flex align-items-center">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
            </div>

        </div>
    </header><!-- End Header -->
    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">
                <div class="section-title">
                    <h2>LPD</h2>
                    <p>
                        Herramienta de ayuda para empresas que realicen un tratamiento de datos personales de escaso riesgo
                        para el cumplimiento del Reglamento General de Protección de Datos
                    </p>
                </div>

                <div class="row container">
                    <div class="col-12">
                        <p>
                            La mera obtención de los documentos que proporcionan las herramientas de la AEPD no supone, en
                            ningún caso, el cumplimiento automático de las obligaciones que el RGPD y la LOPDGDD establecen
                            para los responsables y encargados de los tratamientos de datos personales, en particular lo
                            referido al principio de responsabilidad activa que el RGPD desarrolla en su Capítulo IV. Se
                            trata de documentos iniciales de ayuda orientados a facilitar la comprensión de dichas
                            obligaciones y abordarlas, inicialmente, de forma adecuada.
                        </p>

                        <p>
                            Sobre la base de los documentos obtenidos los responsables y encargados de los tratamientos de
                            datos personales deberán llevar a cabo cuantas adaptaciones fueran necesarias de forma
                            particularizada para cada tratamiento de datos personales; teniendo en cuenta los riesgos que
                            para los derechos y libertades de las personas físicas pudieran derivar de dichos tratamientos
                            en función de su naturaleza, su alcance, su contexto y sus finalidades (Considerando 76 y
                            Artículo 35.1 del RGPD).
                        </p>

                        <p>
                            El Reglamento General de Protección de Datos (RGPD) se aplica desde el 25 de mayo de 2018. Con
                            la finalidad de facilitar la adecuación al RGPD a las empresas y profesionales (personas
                            responsables o encargadas de tratamientos) que traten datos personales de escaso riesgo para los
                            derechos y libertades de las personas, la Agencia Española de Protección de Datos pone a su
                            disposición la herramienta.
                        </p>

                        <p>
                            LPD es una herramienta fácil y gratuita. Una vez finalizada su ejecución, los datos
                            aportados durante el desarrollo de la misma se eliminan, por lo que la Agencia en ningún caso
                            puede conocer la información que haya sido aportada.
                        </p>

                        <p>
                            Ha sido diseñada como un recurso útil para cualquier empresa o profesional, ya que con tan solo
                            tres pantallas de preguntas muy concretas permite a quien la utiliza valorar su situación
                            respecto del tratamiento de datos personales que lleva a cabo: si se adapta a los requisitos
                            exigidos para utilizar LPD o si debe realizar un análisis de riesgos.
                        </p>

                        <p>
                            LPD no podrá utilizarse para tratamientos que impliquen un alto riesgo para los
                            derechos y libertades de las personas, como datos de salud o tratamientos masivos de datos,
                            entre otros.
                        </p>

                        <p>
                            La herramienta genera diversos documentos adaptados a la empresa concreta, cláusulas
                            informativas que debe incluir en sus formularios de recogida de datos personales, cláusulas
                            contractuales para anexar a los contratos de encargado de tratamiento, el registro de
                            actividades de tratamiento, y un anexo con medidas de seguridad orientativas consideradas
                            mínimas.
                        </p>

                        <p>
                            LPD está orientada a empresas que tratan datos personales de escaso riesgo, como por
                            ejemplo, datos personales de clientes, proveedores o recursos humanos.
                        </p>

                        <p>
                            Tenga en cuenta que LPD es una ayuda y, por tanto, la documentación resultante deberá
                            estar adaptada y actualizada a la situación de los tratamientos que se lleven a cabo en su
                            entidad. La obtención de los documentos no implica el cumplimiento automático del RGPD.
                        </p>

                        <a href="{{ route('login') }}">
                            Enlace a la herramienta.
                        </a>
                    </div>
                </div>
            </div>
        </section><!-- End About Section -->
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">

            <div class="container">

                <div class="row  justify-content-center">
                    <div class="col-lg-6">
                        <h3>LPD</h3>
                    </div>
                </div>

                <div class="social-links">
                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>

            </div>
        </div>

        <div class="container footer-bottom clearfix">
            <div class="copyright">
                &copy; Copyright <strong><span>LPD</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer><!-- End Footer -->
@endsection
