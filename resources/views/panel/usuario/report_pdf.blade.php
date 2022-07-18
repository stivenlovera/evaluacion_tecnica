<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ public_path('css/invoice-pdf.css') }}" media="all" />
    <title>Reporte de clientes</title>
</head>

<body>
    <p>Fecha de reporte {{date('Y/m/d')}}</p>
    <p>Total cantidad de clientes {{count($usuarios)}}</p>
    <h3 style="text-align: center;">Clientes registrados</h3>
    <table>
        <thead>
            <tr>
                <th>CI</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>Email</th>
                <th>Celular</th>
                <th>Dirrecion</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($usuarios as $usuario)
            <tr>
                <td>{{$usuario->ci}}</td>
                <td>{{$usuario->nombre}}</td>
                <td>{{$usuario->apellido}}</td>
                <td>{{$usuario->edad}}</td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->celular}}</td>
                <td>{{$usuario->dirrecion}}</td>
            </tr>
            @empty
            <tr>
                <td>no hay registros</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>
