<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Proprietarios</title>
</head>
<body>
<h1>Proprietarios</h1>
@if ($proprietario)
    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>nome</th>
            <th>email</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$proprietario->id}}</td>
                <td>{{$proprietario->nome}}</td>
             </tr>
        </tbody>
    </table>
@else
    <p>Proprietarios não encontrado! </p>
@endif

<a href="/proprietario">Voltar</a>
</body>
</html>
