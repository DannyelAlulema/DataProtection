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
    </style>
</head>

<body>
    <h1 class="title">CLÁUSULAS PARA EMPRESA/PERSONA A LA QUE SE ENTREGA LOS DATOS LOS CLIENTES O TRABAJADORES DE LA
        ORGANIZACIÓN</h1>

    <p class="text">
        Aviso: Estas cláusulas se insertarán en los contratos a celebrarse con las personas naturales o jurídicas a
        quienes se entregue datos personales de los clientes, potenciales clientes o trabajadores de la organización.
    </p>
    <p class="text">
        En el campo denominado [Empresa Encargada] se colocará el nombre de la persona natural o jurídica a la que se
        remitieron los datos.
    </p>
    <p class="text">
        Cláusula [ ]: Confidencialidad
    </p>
    <p class="text">
        Para propósito de este Contrato, se considerará como Información Confidencial, cualquier información verbal o
        contenida en documentos escritos o en cualquier otro tipo de soporte, de cualquier naturaleza, ya sea a través
        de medios magnéticos y/o electrónicos, que tenga relación con el objeto de este contrato y que sea entregada a
        [Empresa Encargada]
    </p>
    <p class="text">
        La Información Confidencial podrá ser entregada, revelada o difundida a terceros por [Empresa Encargada] siempre
        que {{ $data['enterprise']['bussines_name'] }} lo haya autorizado previamente y por escrito. Asimismo, las [Empresa Encargada]
        se compromete a devolver y destruir la Información Confidencial que esté en su poder siempre que {{ $data['enterprise']['bussines_name'] }} así lo disponga y se lo comuniquen por escrito.
    </p>
    <p class="text">
        En caso de incumplimiento de lo dispuesto en esta cláusula por parte de [Empresa Encargada] será responsable
        frente a {{ $data['enterprise']['bussines_name'] }} de los daños y perjuicios que le ocasiones, sin perjuicio de la
        responsabilidad penal que eso conlleve.
    </p>

    <p class="text">
        Cláusula [ ]: Obligaciones de [Empresa Encargada]
    </p>
    <p class="text">
        [Empresa Encargada] se obliga a:
    </p>

    <ol class="list">
        <li>Utilizar los datos personales compartidos por {{ $data['enterprise']['bussines_name'] }}, únicamente para la ejecución de
            las actividades objeto de este contrato. En caso de que {{ $data['enterprise']['bussines_name'] }} requiera que [Empresa
            Encargada] realice otro tipo de tratamiento de los datos personales, se suscribirá una adenda a este
            contrato.</li>
        <li>Trata los datos personales proporcionados, de acuerdo a las instrucciones de {{ $data['enterprise']['bussines_name'] }}.
        </li>
        <li>No comunicar los datos personales a terceras personas, salvo que cuente con la autorización expresa de {{ $data['enterprise']['bussines_name'] }}</li>
        <li>Mantener la confidencialidad de todos los datos personales proporcionados por {{ $data['enterprise']['bussines_name'] }}
        </li>
        <li>Garantizar que sus trabajadores y terceros relacionados que tengan acceso a los datos personales, respetarán
            la confidencialidad y cumplirán con las medidas de seguridad correspondientes.</li>
        <li>Adoptar las medidas de seguridad adecuadas para proteger los datos personales, teniendo en cuenta su tipo y
            naturaleza. Tales medidas deberán garantizar como mínimo un grado de seguridad y protección apropiado para
            proteger la confidencialidad, integridad, disponibilidad y resiliencia de los sistemas.</li>
        <li>Verificar, evaluar y valorar constantemente la eficacia de las medidas implementadas.</li>
        <li>Notificar a {{ $data['enterprise']['bussines_name'] }} en el máximo de 48 horas, a través de correo electrónico, cualquier
            evento de vulneración de seguridad de los datos personales objeto del tratamiento.</li>
        <li>Cuando los titulares de los datos personales ejerzan ante el [Empresa Encargada] los
            derechos de acceso, rectificación, supresión, oposición, limitación del tratamiento, portabilidad de datos u
            otros similares, este deberá comunicarlo a {{ $data['enterprise']['bussines_name'] }} de forma inmediata.</li>
    </ol>



</body>

</html>
