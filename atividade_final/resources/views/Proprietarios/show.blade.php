<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contratos</title>
</head>
<body>
<h1>Contratos</h1>
@if ($contrato)
    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>Descricao</th>
            <th>Valor</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$contrato->id}}</td>
                <td>{{$contrato->descricao}}</td>
             </tr>
        </tbody>
    </table>
@else
    <p>Contratos não encontrado! </p>
@endif

<a href="/contratos">Voltar</a>
</body>
</html>
