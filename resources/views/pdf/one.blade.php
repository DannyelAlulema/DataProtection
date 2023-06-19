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
    <div class="container">
        <h1 class="title">POLÍTICA DE PROTECCIÓN DE DATOS PERSONALES</h1>
        <h2 class="section-header">1. IDENTIFICACIÓN DEL RESPONSABLE DEL TRATAMIENTO DE LA INFORMACIÓN:</h2>
        <p class="text"><strong>{{ $data['enterprise']['bussines_name'] }}</strong>, que para efectos de la presente política se
            denominará como la “Organización”, es
            una
            empresa dedicada a <strong>{{ $data['enterprise']['description'] }}</strong>.</p>
        <p class="text">Identificación: <strong>{{ $data['enterprise']['bussines_name'] }}</strong></p>

        <table class="tbl">
            <tr>
                <td>RUC</td>
                <td><strong>{{ $data['enterprise']['ci_ruc'] }}</strong></td>
            </tr>
            <tr>
                <td>Domicilio</td>
                <td><strong>{{ $data['enterprise']['address'] }}</strong></td>
            </tr>
            <tr>
                <td>Teléfono</td>
                <td><strong>{{ $data['enterprise']['phone_number'] }}</strong></td>
            </tr>
            <tr>
                <td>Correo electrónico</td>
                <td><strong>{{ $data['enterprise']['email'] }}</strong></td>
            </tr>
        </table>

        <p class="text">
            La actual política es de estricto cumplimiento tanto de trabajadores, colaboradores,
            contratistas y terceros que actúan como encargados del tratamiento de los datos en nombre de la Compañía.
        </p>

        <h2 class="section-header">2. FINALIDADES Y TRATAMIENTO AL CUAL SERÁN SOMETIDOS LOS DATOS PERSONALES:</h2>

        @if ($data['paid'])
            <p class="text">
                Los datos personales que la Compañía realice acciones de tratamiento tienen las siguientes
                finalidades:
            </p>
            <ul class="list">
                <li>
                    Realizar todas las operaciones o ejecución de relaciones comerciales y contractuales
                    con clientes, proveedores, colaboradores, empleados y cualquier tercero en general.
                </li>
                <li>
                    Establecer y mantener relaciones para las actividades administrativas, de recursos
                    humanos, contables, tributarias propias del desarrollo del negocio y cumplimiento de la normativa
                    aplicable a la Compañía.
                </li>
                <li>
                    Con propósitos de seguridad de la información o prevención de fraude.
                </li>
                <li>
                    Mantener contacto permanente con el Titular de los datos personales; (ii) realizar
                    publicaciones y/o anuncios de su interés; (iii) Generar estudios de mercado y encuestas para conocer
                    su
                    opinión respecto a nuestros productos y/o servicios y cualquier proceso en función de mercadeo o
                    venta
                    que este previamente autorizada por el titular; iv) Participar en campañas y beneficios de
                    fidelización;
                    v) oferta de productos y/o servicios.
                </li>
                <li>
                    Para satisfacer un interés legítimo originado en la actividad comercial de la
                    Compañía.
                </li>
                <li>
                    Otras finalidades que resulten de las actividades del ejercicio de la operación del
                    negocio.
                </li>
            </ul>

            <h2 class="section-header">3. DEFINICIONES:</h2>
            <p class="text">Con el objetivo de ayudar a determinar de una forma clara y sencilla el significado del
                vocablo técnico utilizado frecuentemente en materia de protección de datos personales, se definen los
                siguientes términos:</p>

            <ul class="list">
                <li>
                    Autoridad de Protección de Datos Personales: Autoridad pública independiente encargada
                    de supervisar la aplicación de la Ley Orgánica de Protección de Datos Personales, reglamento y
                    resoluciones emitidas por la autoridad de protección de datos personales, con el fin de proteger los
                    derechos y libertades fundamentales de las personas naturales, en cuanto al tratamiento de sus datos
                    personales.
                </li>
                <li>
                    Consentimiento: Manifestación de la voluntad, libre, específica, informada e
                    inequívoca, por el que el titular de los datos personales autoriza al responsable del tratamiento de
                    los
                    datos personales a tratar los mismos.
                </li>
                <li>
                    Base De Datos: Conjunto estructurado de datos cualquiera que fuera la forma, modalidad
                    de creación, almacenamiento, organización, tipo de soporte, tratamiento, procesamiento, localización
                    o
                    acceso, centralizado o descentralizado o repartido de forma funcional o geográfica.
                </li>
                <li>
                    Dato Personal: Se refiere a cualquier información asociada a una persona natural que
                    la identifica o la hace identificable, ya sea directa o indirectamente.
                </li>
                <li>
                    Dato Sensible: Para los propósitos de la presente Política, se entiende por dato
                    sensible todo aquel que afecta la intimidad del titular o cuyo uso indebido puede generar su
                    discriminación, o pueda atentar contra sus derechos y libertades fundamentales, tales como aquellos
                    relativos al origen racial o étnico, la filiación política, las convicciones religiosas o
                    filosóficas,
                    la ideología, así como los datos relativos a la salud, la orientación sexual y los datos biométricos
                    y
                    genéticos.
                </li>
                <li>
                    Derechos del titular: Son los correspondientes a la posibilidad de solicitar el
                    acceso, eliminación, rectificación y actualización, oposición, anulación, limitación del tratamiento
                    que
                    tiene el titular de la información frente a la Compañía
                </li>
                <li>
                    Encargado del tratamiento: Es quien realiza el tratamiento de datos personales a
                    nombre y por cuenta de un responsable del tratamiento de datos personales.
                </li>
                <li>
                    Entidad Certificadora: Entidad reconocida por la Autoridad de Protección de Datos
                    Personales, que podrá, de manera no exclusiva, proporcionar certificaciones en materia de protección
                    de
                    datos personales.
                </li>
                <li>
                    Responsable de los datos personales: Persona natural o jurídica, pública o privada,
                    que por sí misma o en asociación con otros, decida sobre la finalidad y/o el tratamiento de los
                    datos
                    personales.
                </li>
                <li>
                    Transferencia o comunicación: Manifestación, declaración, entrega, consulta,
                    interconexión, cesión, transmisión, difusión, divulgación o cualquier forma de revelación de datos
                    personales realizada a una persona distinta al titular, responsable o encargado del tratamiento de
                    datos
                    personales. Los datos personales que comuniquen deben ser exactos, completos y actualizados.
                </li>
                <li>
                    Tratamiento: Cualquier operación o conjunto de operaciones realizadas sobre datos
                    personales ya sean físicas o automatizadas que permitan, entre otras cosas, recoger, recopilar,
                    obtener,
                    registrar, organizar, estructurar, conservar, custodiar, adaptar, modificar, eliminar, aprovechar,
                    distribuir los datos de carácter personal.
                </li>
                <li>
                    Titular de los datos personales: Es la persona natural cuyos datos personales son
                    objeto de tratamiento por parte de un tercero.
                </li>
                <li>
                    Vulneración de la seguridad de los datos personales: Incidente de seguridad que afecta
                    la confidencialidad, disponibilidad o integridad de los datos personales.
                </li>
            </ul>

            <h2 class="section-header">4. DERECHOS DE LOS TITULARES</h2>
            <p class="text">Todo titular de datos personales tiene los siguientes derechos frente a la Compañía</p>
            <p class="text">
                <b>4.1. Información:</b> Recibir datos personales sobre aspectos como: responsable de los datos, los
                fines del tratamiento de los datos, la existencia de bases de datos en donde conste su información, la
                posibilidad de revocar el consentimiento para el tratamiento de los datos y sus excepciones, la manera y
                medios de hacer efectivos sus derechos.
            </p>
            <p class="text">
                Esta información deberá ser comunicada al titular de datos personales de forma previa a la
                recolección del dato.
            </p>
            <p class="text">
                <b>4.2. Acceso:</b> El titular puede acceder a sus datos presentados para su tratamiento sin necesidad
                de
                tener que
                presentar ningún tipo de justificación para el efecto. Toda solicitud para estos efectos será respondida
                por
                la Compañía dentro de los diez (10) días siguientes a su presentación a través de los canales que se
                mencionan en esta Política.
            </p>
            <p class="text">
                El acceso está permitido solamente a los titulares de datos personales que correspondan a personas
                naturales, previa acreditación de su identidad como titular, legitimidad, poniendo a su disposición, sin
                costo, de manera pormenorizada y detallada, los respectivos datos personales tratados, a través de
                cualquier
                medio de comunicación, incluyendo los electrónicos que permitan el acceso directo del titular.
            </p>
            <p class="text">
                <b>4.3. Rectificación </b>y actualización: Todo titular de datos personales tiene frente a la Compañía
                la
                posibilidad de solicitar la corrección o actualización de su información frente a datos inexactos o
                incompletos y presentar reclamos, no solo frente a la entidad sino ante la autoridad de protección de
                datos
                personales.
            </p>
            <p class="text">
                <b>4.4. Eliminación: El </b>titular tiene el derecho en todo momento a solicitar a la Compañía la
                eliminación de
                sus datos personales de sus bases de datos de la empresa, siempre y cuando, no lo impida una disposición
                legal o mantenga una relación contractual con la Compañía o el tratamiento no sea necesario o pertinente
                para el cumplimiento de la finalidad de la que se trate a criterio de la Compañía.
            </p>
            <p class="text">
                <b>4.5. Oposición.</b> El titular puede oponerse o negarse al tratamiento de sus datos personales cuando
                los
                mismos
                sean utilizados para la realización de actividades de marketing o mercadeo por parte de la Compañía, la
                oposición no afecte derechos y libertades de terceros y no haya para la Compañía una obligación legal o
                una
                situación que se fundamente en el interés legítimo para realizar el tratamiento de los datos
            </p>
            <p class="text">
                Los derechos de rectificación, actualización, eliminación, oposición, anulación y portabilidad de los
                datos
                personales no podrán ser ejercidos cuando se presenten los casos establecidos en el artículo 18 de la
                Ley
                Orgánica de Protección de Datos Personales.
            </p>
            <p class="text">
                En caso que la Compañía actúe como encargado del tratamiento de datos personales, el titular debe
                realizar
                los derechos definidos en este apartado al responsable de tratamiento de datos personales, conforme lo
                establecido en la Ley Orgánica de Protección de Datos Personales.
            </p>

            <h2 class="section-header">5. ATENCIÓN DE REQUERIMIENTOS DEL TITULAR</h2>
            <p class="text">
                El Titular de los datos personales, puede dirigir sus requerimientos al correo electrónico [correo
                electrónico para el ejercicio de derechos].
            </p>

            <h2 class="section-header">6. PROCEDIMIENTO PARA QUE LOS TITULARES PUEDAN EJERCER SUS DERECHOS</h2>

            <p class="text">
                Conforme la legislación vigente, los legitimados y quienes podrán ejercer los derechos de los Titulares,
                corresponden a:
            </p>

            <ul class="list">
                <li>El Titular, quien deberá acreditar su identidad</li>
                <li>Los herederos quienes deberán acreditar tal calidad.</li>
                <li>El representante y/o apoderado del Titular.</li>
                <li>Trabajadores o extrabajadores de la Compañía.</li>
                <li>Proveedores debidamente legitimados.</li>
                <li>Por pedido de otra persona con la debida autorización.</li>
            </ul>

            <p class="text">
                En función de la anterior usted como titular o legitimado debe enviar un email a [correo electrónico
                para el
                ejercicio de derechos] indicando su petición o consulta, teniendo en cuenta las siguientes
                consideraciones:
            </p>
            <p class="text">
                La solicitud debe estar dirigida a la Compañía según la denominación indicada en el numeral 1 de la
                presente
                política y debe contener como mínimo los siguientes datos:
            </p>

            <ol class="list lower-alpha-list">
                <li>Nombres y apellidos del titular.</li>
                <li>Número de identificación del titular.</li>
                <li>Datos de localización del titular.</li>
                <li>Descripción de los hechos que dan lugar a la consulta o reclamo.</li>
                <li>Documentos que considere soportan su consulta o reclamo.</li>
                <li>Medio por el cual desea recibir respuesta.</li>
                <li>Nombre del peticionario, el cual, si es diferente al titular, debe adjuntar los documentos que le
                    permitan actuar en su nombre.</li>
            </ol>

            <ul class="list">
                <li>Si el Titular actúa por sí mismo, deberá adjuntar su cédula de ciudadanía o pasaporte. </li>
                <li>Si se trata de herederos, deberá adjuntar copia de su cédula de ciudadanía o pasaporte y el acta de
                    defunción del Titular. </li>
                <li>En caso que el Titular actué mediante representación o apoderado deberá acreditarse tal calidad
                    mediante
                    poder especial. </li>
                <li>En caso de actuar por medio de otra persona, se deberá aportar poder y/o autorización debidamente
                    conferida por el Titular, y se deberá manifestar de manera clara y expresa el motivo de la solicitud
                    y
                    el derecho que le asiste.</li>
                <li>Para el caso de los menores de quince (15) años de edad se solicitará a su representante o acudiente
                    la
                    presentación del documento que acredite el parentesco o patria potestad del menor.</li>
            </ul>

            <p class="text">
                Todas las solicitudes que realicen las personas legitimadas para ejercer cualquiera de los derechos
                previamente mencionados con relación a la protección de los datos se atenderán en el término de diez
                (10)
                días. En caso que el requerimiento estuviere incompleto, la Compañía deberá comunicar este evento al
                Titular
                para que este sea completado en el término de dos (2) días hábiles. En caso de no realizar esta acción,
                se
                entenderá como desistimiento del requerimiento.
            </p>

            <h2 class="section-header">7. AUTORIZACIÓN DEL TITULAR DE LOS DATOS PERSONALES</h2>
            <p class="text">La Compañía como responsable o encargado del tratamiento de información, sin menoscabo de
                las
                excepciones previstas en la legislación vigente, tiene los siguientes deberes:</p>

            <ul class="list">
                <li>Garantizar al titular, en todo tiempo, el pleno y efectivo ejercicio de sus derechos. </li>
                <li>Tratar los datos personales conforme la legislación nacional vigente.</li>
                <li>Conservar la información bajo las condiciones de seguridad necesarias para impedir su modificación,
                    pérdidas o disponibilidad. </li>
                <li>Atender los requerimientos de los titulare de datos personales en los términos legales previstos en
                    la
                    normativa ecuatoriana. </li>
                <li>Informar a la autoridad de protección de datos personales nacional cuando se presenten vulneraciones
                    a
                    la seguridad de los datos personales de los Titulares en el término de cinco (5) días de ocurrido el
                    incidente. </li>
                <li>Implementar todas las medidas jurídicas, técnicas y organizativas para la protección de los datos
                    personales de los Titulares. </li>
            </ul>

            <h2 class="section-header">8. TRATAMIENTO E INTERÉS LEGÍTIMO</h2>
            <h3 class="text">8.1 Tratamiento legítimo</h3>
            <p class="text">
                El tratamiento de datos personales por parte de <strong>{{ $data['enterprise']['bussines_name'] }}</strong> es legítimo y
                lícito cuando se cumple
                una de las siguientes condiciones:
            </p>
            <ol class="list lower-alpha-list">
                <li>Por consentimiento del titular para una o varias finalidades específicas.</li>
                <li>En cumplimiento de una obligación legal.</li>
                <li>Por orden judicial.</li>
                <li>En cumplimiento de una obligación realizadas en interés público, sujeto al cumplimiento de los
                    estándares internacionales de derechos humanos aplicables a la materia, principios de la Ley
                    Orgánica de
                    Protección de Datos Personales, y criterios de legalidad, proporcionalidad y necesidad.</li>
                <li>Para la ejecución de medidas precontractuales por pedido del titular o para el cumplimiento de
                    obligaciones contractuales.</li>
                <li>Para proteger intereses vitales del titular o de otra persona natural.</li>
                <li>Para satisfacer un interés legítimo.</li>
            </ol>
            <p class="text">
                El consentimiento del titular para para tratar sus datos personales, será válido cuando el
                consentimiento
                sea:
            </p>
            <ol class="list lower-alpha-list">
                <li>Libre: voluntario, sin ningún tipo de intimidación o error.</li>
                <li>Específico: determinación concreta de los medios, fines del tratamiento y transferencia para el
                    tratamiento.</li>
                <li>Informado: fácil de entender, en un lenguaje sencillo y claro.</li>
                <li>Inequívoco: no se presente dudas respecto al alcance de la autorización.</li>
            </ol>
            <p class="text">
                El consentimiento de las personas que han entregado datos personales a los proveedores de [Nombre de la
                Empresa], será obtenido por estas organizaciones en calidad de responsables del tratamiento de datos
                personales. La Compañía no es responsable de la obtención de todo tipo de autorización para tratamiento
                de
                los datos de estas personas en calidad de encargado.
            </p>
            <h3 class="text">8.2 Interés Legítimo</h3>
            <p class="text">
                Cuando el tratamiento de datos personales tiene como fundamento un interés legítimo por parte de la
                Compañía, se sujetará a las siguientes condiciones:
            </p>
            <ol class="list lower-alpha-list">
                <li>Pueden ser tratados aquellos que sean estrictamente necesarios para la realización de la finalidad.
                </li>
                <li>Se debe garantizar al titular la transparencia del tratamiento</li>
                <li>La Autoridad de Protección de Datos, puede requerir a la Compañía un informe a fin de verificar si
                    no
                    hay amenazas concretas a las expectativas legítimas de los titulares y sus derechos.</li>
            </ol>

            <h2 class="section-header">9. POLITICAS INTERNAS EFECTIVAS Y HERRAMIENTAS PARA LA SEGURIDAD DE LA
                INFORMACION:
            </h2>
            <p class="text">
                La Compañía declara que la información se encuentra salvaguardada en nuestras bases de datos manteniendo
                niveles adecuados de confidencialidad, integridad y disponibilidad con base en las medidas efectivas y
                apropiadas de seguridad y confidencialidad de la información, por lo tanto solo puede ser accedida por
                personal calificado en función de su rol y desempeño dentro de la Compañía, que mantenemos una
                estructura
                administrativa y tecnológica proporcional al tamaño empresarial y hemos adoptado mecanismos internos
                para
                poner en práctica estas políticas incluyendo herramientas de implementación, entrenamiento y programas
                de
                educación. Sin embargo, todo sistema informático puede ser sujeto de ataques, ajenos al control de la
                Compañía, caso en el cual se informará al Titular o Responsable, según corresponda en los términos
                establecidos en la legislación vigente en la materia en la jurisdicción aplicable.
            </p>

            <h2 class="section-header">10. TRANSFERENCIA DE DATOS:</h2>
            <p class="text">
                La Compañía podrá transferir o comunicar los datos personales de los titulares a terceros cuando se
                realice
                para el cumplimiento de fines directamente relacionados con sus operaciones, y cuando la transferencia
                se
                encuentre configurada dentro de una de las causales de legitimidad establecidas en la legislación
                nacional,
                además, con el consentimiento del Titular.
            </p>

            <h2 class="section-header">11. VIGENCIA DE LAS BASES DE DATOS.</h2>
            <p class="text">
                [Nombre de la Empresa], tratará los datos personales del titular durante el tiempo necesario para
                cumplir
                con las finalidades autorizadas por el titular o hasta por 7 años una vez finalizado su tratamiento. No
                obstante, la Compañía conservará lo datos personales cuando así se requiera para el cumplimiento de una
                obligación legal o contractual.
            </p>

            <h2 class="section-header">12. RESPUESTA A VIOLACIONES DE SEGURIDAD DE DATOS:</h2>
            <p class="text">
                Cuando la Compañía tenga conocimiento de una violación de seguridad de datos personales tanto presunta
                como
                real, deberá realizar una investigación interna y tomar las medidas correctivas adecuadas a tiempo.
                Cuando
                exista un riesgo para los derechos y las libertades de los titulares, la Compañía debe notificar a la
                autoridad de protección de datos personales nacional, los responsables y titulares de los datos
                personales
                según lo ordene la norma nacional aplicable en la materia.
            </p>

            <h2 class="section-header">13. LEGISLACIÓN APLICABLE Y VIGENTE:</h2>
            <ul class="list">
                <li>Ley Orgánica de Protección de Datos Personales del Ecuador.</li>
                <li>Constitución de la República del Ecuador.</li>
            </ul>
        @else
            <div class="pay-alert">
                Para acceder a los completamente a los recursos, por favor cancela los valores pendientes.
            </div>
        @endif
    </div>
</body>

</html>
