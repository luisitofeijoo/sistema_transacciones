<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ficha de Asignación de Uso de Bienes Patrimoniales</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        html {
            margin-top: 4px;
            padding-top: 4px;
            margin-bottom: 4px;
            padding-bottom: 4px;
        }
        .container {
            text-align: center;
        }
        h3 {
            margin: 20px 0;
        }
        .date {
            text-align: right;
            font-size: 12px;
            margin-right: 20px;
        }
        table {
            width: 100%;
            font-size: 10px;
            border-collapse: collapse;
            margin: 0 auto;
        }
        th, td {
            border: 1px solid #000;
            padding: 2px;
        }
        .signatory {
            width: 33%;
            vertical-align: top;
        }
        .signatory p {
            margin: 0;
            border-top: 1px dashed #000;
            padding: 5px;
        }
        .signature {
            border-top: 1px solid #000;
            width: 100%;
            position: relative;
            bottom: 0;
        }
        .note {
            font-size: 10px;
            border: 1px solid #111;
            padding: 10px;
            margin-top: 20px;
            bottom: 0;
        }
        .note strong {
            font-weight: bold;
        }
        .note ol {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>
<body>
<!--<p style="font-size: 10px;text-align: right;">Fecha de actualización: {{ date('d/m/Y H:i:s') }}</p>-->
<div class="container">
    <h4>FICHA DE ASIGNACIÓN EN USO DE BIENES TECNOLÓGICOS<br>.: COAR AREQUIPA :.</h4>
</div>
<!--<p class="date">{{ date('d/m/Y H:i:s') }}</p>-->
<p style="font-size: 12px;"><strong>I. PERSONA RESPONSABLE DEL BIEN</strong></p>
<table>
    <thead>
    <tr>
        <td style="background:#e3e2e2;"><strong>APELLIDOS Y NOMBRES : </strong></td><td>
            {{ $persona->apellido_paterno }} {{ $persona->apellido_materno }}, {{ $persona->nombres }}
        </td>
        <td style="width: 150px;background:#e3e2e2;" ><strong>DNI : </strong></td><td>{{ $persona->nro_documento }}</td>
    </tr>
    <tr>
        <td style="background:#e3e2e2;"><strong>DIRECCIÓN : </strong></td><td>{{ $persona->direccion }}</td>
        <td style="background:#e3e2e2;"><strong>EMAIL : </strong></td><td>{{ $persona->email }}</td>
    </tr>
    <tr>
        <td style="background:#e3e2e2;"><strong>UBIGEO : </strong></td><td>{{ $persona->lugar_domicilio }}</td>
        <td style="background:#e3e2e2;"><strong>CELULAR :  </strong></td><td>{{ $persona->celular }}</td>
    </tr>
    <tr>
        <td style="background:#e3e2e2;"><strong>CARGO : </strong></td><td colspan="3">DOCENTE</td>
    </tr>
    </thead>
</table>
<p style="font-size: 12px;"><strong>II. RELACIÓN DE BIENES PATRIMONIALES</strong></p>
<table>
    <thead>
    <tr>
        <th>N°</th>
        <th>CÓD. PATRIMONIAL</th>
        <th>NOMBRE</th>
        <th>MARCA</th>
        <th>MODELO</th>
        <th>SERIE</th>
        <th>COLOR</th>
        <th>ESTADO<sup>(1)</sup></th>
        <th>OBS.</th>
    </tr>
    </thead>
    <tbody>
    @foreach($prestamos as $index => $prestamo)
        <tr>
            <td>{{ ++$index }}</td>
            <td>{{ $prestamo->codigo_patrimonial }}</td>
            <td style="width:200px">{{ $prestamo->nombre }}</td>
            <td>{{ $prestamo->marca }}</td>
            <td>{{ $prestamo->modelo }}</td>
            <td>{{ $prestamo->serie }}</td>
            <td>{{ $prestamo->color }}</td>
            <td>{{ substr($prestamo->estado, 0, 1) }}</td>
            <td>{{ $prestamo->comentario }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<p style="font-size: 10px">* (1) El estado es consignado en base a la siguiente escala: Bueno, Regular, Malo, Chatarra y RAEE.</p>
<p style="font-size: 12px;"><strong>IV. FIRMA Y SELLOS</strong></p>
<div class="container">
    <table style="width: 100%;font-size: 10px;text-align: center;border-spacing: 0px;margin: 0 auto;">
        <tr>
            <td style="width:100%;">
                <div style="height:100px;"></div>
                <p style="border-top: 1px dashed black;margin-right: 5px;margin-left: 5px;">
                    Andres Avelino Quispe Sulla<br>
                    41601011
                </p>
                <div style="border-top: 1px solid black;width:100%;position: relative;bottom: 0;">V°B° Dirección General</div>
            </td>
            <td style="width: 100%;">
                <div style="height:100px;"></div>
                <p style="border-top: 1px dashed black;margin-right: 5px;margin-left: 5px;">
                    LUIS MIGUEL FEIJOO VALERIANO<br>
                    DNI. 70757711
                </p>
                <div style="border-top: 1px solid black;width:100%;position: relative;bottom: 0;">V°B° Centro de atención al usuario</div>
            </td>
            <td style="width: 100%;">
                <div style="height:100px;"></div>
                <p style="border-top: 1px dashed black;margin-right: 5px;margin-left: 5px;">
                    {{ $persona->apellido_paterno.' '.$persona->apellido_materno.', '.$persona->nombres }}<br>
                    DNI. {{ $persona->nro_documento }}
                </p>
                <div style="border-top: 1px solid black;width:100%;position: relative;bottom: 0;">V°B° Apoderado/Usuario</div>
            </td>
        </tr>
    </table>
</div>
<div class="note">
    <strong>Nota:</strong>
    <table>
        <td style="border:none;padding-right:10px;font-size:10px;">
            <ol>
                <li>Los bienes asignados quedan bajo el cuidado y responsabilidad del responsable del bien asignado, de acuerdo a la normatividad vigente.</li>
                <li>Los movimientos de entrada y salida de bienes asignados deberán ser autorizados por el jefe de área, mediante actas y documentos que sustenten dichos movimientos, incluyendo la firma del Director General.</li>
                <li>En caso de pérdida, robo, sustracción, destrucción total o parcial del bien, el servidor y/o funcionario responsable deberá documentar y sustentar la ocurrencia, de acuerdo con la normatividad vigente. Si un docente o estudiante conscientemente causa daño a los bienes patrimoniales asignados por el COAR para el desarrollo de sus actividades educativas, será responsable de la reparación y/o reemplazo. En ambos casos, los componentes utilizados deberán ser originales y tener iguales o superiores características al bien dañado. El plazo para la reparación y/o reposición no deberá exceder los 30 días desde la fecha de la incidencia.</li>
            </ol>
        </td>
        <td style="border:none;">
            <img src="data:image/png;base64,{{ DNS2D::getBarcodePNG('http://181.176.246.5/doc/'.$persona->nro_documento.'-asignado', 'QRCODE') }}" width="110px"/>
        </td>
    </table>
</div>
</body>
</html>
