<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
</head>
<body>
<h1>Clientes - Quantidade Total de Clientes: {{$totalClientes}}</h1>
@if ($listClientes->count()>0)
    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Email</th>

        </tr>
        </thead>
        <tbody>
        @foreach($listClientes as $cliente)
            <tr>
                <td><a href="/cliente/{{$cliente->id}}">{{$cliente->id}}</a></td>
                <td>{{$atleta->nome}}</td>
                <td>{{$atleta->email}}</td>
                <td>
                    <a href="{{route('cliente_edit', $cliente->id)}}">Editar</a>
                    <a href="{{route('cliente_delete', $cliente->id)}}">Excluir</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p>Clientes não encontrados! </p>
@endif
<p><a href="{{route('cliente_create')}}">Novo Cliente</a></p>
</body>
</html>
