<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Roommates</title>
</head>
<body>
<h1>Roommates - Quantidade Total de Roommates: {{$totalProds}}</h1>
@if ($listRoommates->count()>0)
    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>Rua</th>
            <th>Numero</th>
            <th>Cidade</th>
        </tr>
        </thead>
        <tbody>
        @foreach($listRoommates as $roommate)
            <tr>
                <td><a href="/roommate/{{$roommate->id}}">{{$roommate->id}}</a></td>
                <td>{{$roommate->nome}}</td>
                <td>{{$roommate->telefone}}</td>
                <td>{{$roommate->cpf}}</td>
                <td>{{$roommate->email}}</td>
                <td>
                    <a href="{{route('roommate_edit', $roommate->id)}}">Editar</a>
                    <a href="{{route('roommate_delete', $roommate->id)}}">Excluir</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p>Roommate não encontrados! </p>
@endif
<p><a href="{{route('roommate_create')}}">Novo roommate</a></p>
</body>
</html>
