<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de contratos</title>
</head>
<body>
<h1>contratos</h1>
@if ($contrato)
    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Exercício do contrato</th>
            <th>Atleta do contrato</th>

        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$contrato->id}}</td>
                <td>{{$contrato->tipo}}</td>
                <td>{{$contrato->valor}}</td>
                <td>{{$contrato->imovel_contrato}}</td>
                <td>{{$contrato->cliente_contrato}}</td>

            </tr>
        </tbody>
    </table>
@else
    <p>contratos não encontrado! </p>
@endif

<a href="/contratos">Voltar</a>
</body>
</html>
