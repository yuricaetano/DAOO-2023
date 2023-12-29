<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
</head>
<body>
<h1>Clientes</h1>
@if ($cliente)
    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>CPF</th>

        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$cliente->id}}</td>
                <td>{{$cliente->nome}}</td>
                <td>{{$cliente->telefone}}</td>
                <td>{{$cliente->cpf}}</td>
                <td>{{$cliente->email}}</td>
            </tr>
        </tbody>
    </table>
@else
    <p>Clientes não encontrado! </p>
@endif

<a href="/clientes">Voltar</a>
</body>
</html>
