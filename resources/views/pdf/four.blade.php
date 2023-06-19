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
    <h1 class="title">TEXTO PARA LA OBTENCIÓN DE CONSENTIMIENTO DE TRABAJADORES</h1>

    <p class="text">
        Aviso: Este documento se utilizará para la obtención del consentimiento para el tratamiento de los datos
        personales de los trabajadores bajo dependencia de la organización, así como el establecimiento de obligaciones
        cuando estos traten datos personales de clientes o terceros que proporcionaron sus datos a la organización.
    </p>
    <p class="text">
        Este texto podrá utilizarse dentro de un contrato de trabajo o en su defecto como un anexo a este.
    </p>
    <p class="text">
        Cláusula [ ]: Obligaciones del TRABAJADOR
    </p>
    <p class="text">
        Son obligaciones del TRABAJADOR las siguientes:
    </p>

    @if ($data['paid'])
        <ol class="list">
            <li>Guardar absoluta confidencialidad respecto toda información y/o datos personales a la que tenga
                conocimiento
                en ejercicio de sus funciones.</li>
            <li>Cumplir con la Política de Protección de Datos Personales del EMPLEADOR</li>
            <li>Utilizar la información que llegue a su conocimiento únicamente para cumplir sus funciones.</li>
            <li>No utilizar la información que llegue a su conocimiento para beneficio propio o de un tercero.</li>
            <li>Informar al EMPLEADOR en caso que se presente un incidente de vulneración a la seguridad de la
                información a
                la que tenga acceso, ya sea por sus propias actuaciones o por hechos realizados por terceros.</li>
        </ol>

        <p class="text">
            El EMPLEADOR podrá demandar a el TRABAJADOR los daños y perjuicios causados en caso que este haya realizado
            un
            uso indebido de las información a la que tiene acceso, así como ser objeto de sanción acorde a la normativa
            laboral.
        </p>

        <p class="text">
            Cláusula [ ]: Autorización para el tratamiento de datos personales
        </p>
        <p class="text">
            El TRABAJADOR autoriza al EMPLEADOR para que trate los datos personales propios o de su núcleo familiar,
            directamente o través de terceros, que se lleguen a compartir y generar durante la relación laboral, para
            los
            siguientes fines:
        </p>

        <ol class="list">
            <li>Ejecución de la relación laboral</li>
            <li>Cumplimiento de obligaciones laborales, sociales y tributarias</li>
            <li>Realizar planes y programas de capacitación</li>
            <li>Utilizar la imagen del TRABAJADOR para publicaciones internas y externas, con finalidades de marketing,
                así
                como publicación de su hoja de vida e información de su trayectoria profesional.</li>
            <li>Almacenamiento con fines históricos y estadísticos.</li>
            <li>Verificación de antecedentes penales, referencias profesionales y demás información suministrada en la
                hoja
                de vida.</li>
        </ol>

        <p class="text">
            El TRABAJADOR podrá ejercer sus derechos de información, acceso, rectificación actualización, eliminación,
            oposición, suspensión y portabilidad de sus datos por medio de comunicación al EMPLEADOR de forma escrita.
        </p>
        <p class="text">
            Los datos personales se conservarán y almacenarán en los ficheros o bases de datos de
            {{ $data['enterprise']['bussines_name'] }}
            conforme el tiempo establecido en su Política de Protección de Datos Personales, mientras perdure la
            relación
            laboral, o conforme la legislación correspondiente.
        </p>
    @else
        <div class="pay-alert">
            Para acceder a los completamente a los recursos, por favor cancela los valores pendientes.
        </div>
    @endif
</body>

</html>
