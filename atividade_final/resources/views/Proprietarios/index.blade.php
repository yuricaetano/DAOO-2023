<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Proprietarios</title>
</head>
<body>
<h1>Contratos - Quantidade Total de Contratos: {{$totalContratos}}</h1>
@if ($listContratos->count()>0)
    <table>
        <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        @foreach($listProprietarios as $proprietario)
            <tr>
                <td><a href="/proprietario/{{$proprietario->id}}">{{$proprietario->id}}</a></td>
                <td>{{$proprietario->nome}}</td>
                <td>{{$proprietario->email}}</td>
                <td>
                    <a href="{{route('proprietario', $proprietario->id)}}">Editar</a>
                    <a href="{{route('proprietario', $proprietario->id)}}">Excluir</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p>Proprietarios não encontrados! </p>
@endif
<p><a href="{{route('proprietario_create')}}">Novo Proprietario</a></p>
</body>
</html>
