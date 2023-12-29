<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Roommates</title>
</head>
<body>
<h1>Roommates</h1>
@if ($roommate)
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
                <td>{{$roommate->id}}</td>
                <td>{{$roommate->nome}}</td>
                <td>{{$roommate->telefone}}</td>
                <td>{{$roommate->cpf}}</td>
                <td>{{$roommate->email}}</td>
            </tr>
        </tbody>
    </table>
@else
    <p>Roommates não encontrado! </p>
@endif

<a href="/roommates">Voltar</a>
</body>
</html>
