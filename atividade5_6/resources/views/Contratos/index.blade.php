<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de contratos</title>
</head>
<body>
<h1>contratos - Quantidade Total de contratos: {{$totalContratos}}</h1>
@if ($listcontratos->count()>0)
    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>Tipo</th>
            <th>Valor</th>
            <th>Imovel do contrato</th>
            <th>Cliente do contrato</th>


        </tr>
        </thead>
        <tbody>
        @foreach($listContratos as $contrato)
            <tr>
                <td><a href="/contrato/{{$contrato->id}}">{{$contrato->id}}</a></td>
                <td>{{$contrato->tipo}}</td>
                <td>{{$contrato->valor}}</td>
                <td>{{$contrato->imovel_contrato}}</td>
                <td>{{$contrato->cliente_contrato}}</td>

                <td>
                    <a href="{{route('contrato_edit', $contrato->id)}}">Editar</a>
                    <a href="{{route('contrato_delete', $contrato->id)}}">Excluir</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p>contratos não encontrados! </p>
@endif
<p><a href="{{route('contrato_create')}}">Novo contrato</a></p>
</body>
</html>
