@extends('Plantillas.Plantilla')

@section('titulo', 'Creacion Atas')

@section('contenido')

    <!DOCTYPE html>
<html>
<head>
    <title>Tabla</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        .divi {
            border: 1px solid black;
        }

        th, td {
            border: 1px solid black;
            padding: 3px;
            text-align: center;
            font-size: 80%;
        }

        th {
            background-color: #f2f2f2;
        }

        .custom-width {
            width: 6%;
        }

        .age-container, .details-container {
            border: 1px solid black;
            width: 30%;
        }

        .age-details, .details-details {
            display: flex;
            justify-content: space-between;
            padding: 2px;
        }

        .age-child, .details-child {
            flex-basis: 25%;
            border-right: 1px solid black;
            border-bottom: 1px solid black;
            font-size: 70%;
        }

        .age-child:last-child, .details-child:last-child {
            border-right: none;
        }

        .vertical-text {
            writing-mode: vertical-rl;
            transform: rotate(180deg);
        }

        .sl {
            width: 15px;
        }

        .narrow-procedencia {
            width: 15%;
        }
    </style>
</head>
<body>
<table>
    <tr>
        <th class="sl">No.</th>
        <th class="custom-width">Número de historia clínica</th>
        <th class="custom-width">Nombres y apellidos</th>
        <th class="custom-width">Número de identidad del paciente</th>
        <th class="sl vertical-text">Sexo (H/M)</th>
        <th class="custom-width">Fecha de nacimiento (dd/mm/aa)</th>
        <th class="custom-width age-container" colspan="3">
            Edad
            <div class="age-details">
                <div class="age-child vertical-text divi">Años</div>
                <div class="age-child vertical-text divi">Meses</div>
                <div class="age-child vertical-text divi">Días</div>
            </div>
        </th>
        <th class="sl vertical-text">Paciente</th>
        <th class="custom-width details-container" colspan="3">
            Procedencia
            <div class="details-details">
                <div class="details-child divi">Departamento</div>
                <div class="details-child divi">Municipio</div>
                <div class="details-child divi">Localidad</div>
            </div>
        </th>
        <th class="custom-width details-container narrow-procedencia" colspan="6">
            Diagnóstico
            <div class="details-details">
                <div class="details-child divi">1</div>
                <div class="details-child vertical-text divi">Condición</div>
                <div class="details-child divi">2</div>
                <div class="details-child vertical-text divi">Condición</div>
                <div class="details-child divi">3</div>
                <div class="details-child vertical-text divi">Condición</div>
            </div>
        </th>
        <th class="custom-width details-container" colspan="2">
            Referencia
            <div class="details-details">
                <div class="details-child">Enviada a</div>
                <div class="details-child">Recibida de</div>
            </div>
        </th>
    </tr>
</table>
</body>
</html>
@endsection
