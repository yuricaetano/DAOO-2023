<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contratos</title>
</head>
<body>
<h1>Contratos - Quantidade Total de Contratos: {{$totalContratos}}</h1>
@if ($listContratos->count()>0)
    <table>
        <thead>
        <tr>
            <th>Descricao</th>
            <th>Valor</th>
        </tr>
        </thead>
        <tbody>
        @foreach($listContratos as $contrato)
            <tr>
                <td><a href="/contrato/{{$contrato->id}}">{{$contrato->id}}</a></td>
                <td>{{$contrato->descricao}}</td>
                <td>{{$contrato->valor}}</td>
                <td>
                    <a href="{{route('contrato_edit', $contrato->id)}}">Editar</a>
                    <a href="{{route('contrato_delete', $contrato->id)}}">Excluir</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p>Contratos não encontrados! </p>
@endif
<p><a href="{{route('contrato_create')}}">Novo Contrato</a></p>
</body>
</html>
