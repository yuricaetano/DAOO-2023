<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Imoveis</title>
</head>
<body>
<h1>Imoveis</h1>
@if ($imovel)
    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Rua</th>
            <th>Numero</th>
            <th>Cidade</th>

        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$imovel->id}}</td>
                <td>{{$imovel->rua}}</td>
                <td>{{$imovel->numero}}</td>
                <td>{{$imovel->cidade}}</td>
            </tr>
        </tbody>
    </table>
@else
    <p>Imovels não encontrado! </p>
@endif

<a href="/imoveis">Voltar</a>
</body>
</html>
