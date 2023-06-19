<html>

<head>
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            text-align: justify;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
        }

        .title {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }

        .section-header {
            font-size: 15px;
            text-indent: 1.27cm;
            margin-bottom: 10px;
        }

        .text {
            text-indent: 1.27cm;
            font-size: 13px;
        }

        .list {
            margin-left: 1.27cm;
        }

        .lower-alpha-list {
            list-style: lower-alpha;
        }

        .upper-alpha-list {
            list-style: upper-alpha;
        }

        .list>li {
            font-size: 13px;
        }

        .tbl {
            max-width: 100%;
            margin: 0 auto;
            border: 1px solid black;
            border-collapse: collapse;
        }

        .tbl th,
        .tbl td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
            font-size: 13px;
        }

        .tbl tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .tbl th {
            font-weight: bold;
        }

        .tbl td {
            padding: 8px;
        }

        .sign-space {
            margin-top: 450px;
            display: block;
            text-align: center;
            width: 100%;
            font-size: 12px;
        }

        .sign {
            display: inline-block;
            vertical-align: middle;
            width: 35%;
            border-top: 1px solid #000;
        }

        .pay-alert {
            margin-top: 250px;
            display: block;
            text-align: center;
            width: 100%;
            font-size: 20px;
            color: red;
        }
    </style>
</head>

<body>
    <h1 class="title">TEXTO PARA OBTENCIÓN DEL CONSENTIMIENTO DE CLIENTES Y POTENCIALES CLIENTES</h1>

    <p class="text">
        Aviso: Este documento se utilizará para la obtención del consentimiento para el tratamiento de los datos
        personales de los titulares, ya sean estos clientes, potenciales clientes o terceros que no sean trabajadores.
        Este texto podrá utilizarse dentro de un documento propio de la organización en el que se recopilen datos
        personales, o como un documento aparte, en cuyo caso se deberán recopilar los datos al final del mismo.
    </p>
    <p class="text">
        En el campo denominado <strong>{{ $data['enterprise']['legal_representative'] }}</strong> se colocará el nombre de la persona que entrega sus datos
        personales.
    </p>
    <p class="text">
        En caso que el titular de datos personales no acepte el consentimiento, no podrá realizarse ningún tipo de
        Tratamiento.
    </p>
    <p class="text">
        El consentimiento deberá archivarse por parte de la organización como constancia de otorgamiento del
        consentimiento.
    </p>

    @if ($data['paid'])
        <p class="text">
            <strong>{{ $data['enterprise']['legal_representative'] }}</strong> otorgo mi consentimiento para que
            <strong>{{ $data['enterprise']['bussines_name'] }}</strong> con RUC número <strong>{{ $data['enterprise']['ci_ruc'] }}</strong>,
            ubicado en <strong>{{ $data['enterprise']['address'] }}</strong>, trate mis datos personales facilitados,
            con el fin de proveer
            del servicio y/o bienes solicitados, y cumplir con las obligaciones contractuales acordadas. Así también,
            autorizo para que mis datos sean tratados con el fin que <strong>{{ $data['enterprise']['bussines_name'] }}</strong> oferte
            sus servicios y bienes y realice encuestas de satisfacción, a través de aplicaciones de mensajería
            instantánea, correo
            electrónico y redes sociales. También autorizo para que la organización pueda compartir mis datos personales
            con
            terceros relacionados para que realicen el tratamiento como encargados.
        </p>
        <p class="text">
            La no entrega de los datos solicitados y consentimiento, no me permitirá gozar de los beneficios ofrecidos
            por
            <strong>{{ $data['enterprise']['bussines_name'] }}</strong>, así como limitará la prestación del servicio y contratación de
            bienes.
        </p>
        <p class="text">
            Mis datos personales se conservarán y almacenarán en los ficheros o bases de datos de
            <strong>{{ $data['enterprise']['bussines_name'] }}</strong>
            conforme el tiempo establecido en su Política de Protección de Datos Personales
        </p>
        <p class="text">
            Como titular de sus datos personales, podré ejercer los derechos de acceso, rectificación, oposición al
            tratamiento y eliminación reconocidos en el Ley Orgánica de Protección de Datos Personales, mediante una
            comunicación escrita a la dirección de correo electrónico <strong>{{ $data['enterprise']['email'] }}</strong>, o a las
            oficinas de <strong>{{ $data['enterprise']['bussines_name'] }}</strong> antes indicadas.
        </p>

        <div class="sign-space">
            <div class="sign">
                <p>
                    <span><strong>{{ $data['enterprise']['legal_representative'] }}</strong></span>
                    <br>
                    <span><strong>{{ $data['enterprise']['legal_representative_ci'] }}</strong></span>
                    <br>
                    <span><strong>{{ $data['enterprise']['legal_representative_phone'] }}</strong></span>
                    <br>
                    <span><strong>{{ $data['enterprise']['legal_representative_email'] }}</strong></span>
                </p>
            </div>
        </div>
    @else
        <div class="pay-alert">
            Para acceder a los completamente a los recursos, por favor cancela los valores pendientes.
        </div>
    @endif

</body>

</html>
