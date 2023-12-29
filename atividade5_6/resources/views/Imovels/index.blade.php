<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Imovels</title>
</head>
<body>
<h1>Imovels - Quantidade Total de Imovels: {{$totalImovels}}</h1>
@if ($listImovels->count()>0)
    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Categoria</th>
            <th>Dificuldade</th>

        </tr>
        </thead>
        <tbody>
        @foreach($listImovels as $imovel)
            <tr>
                <td><a href="/imovel/{{$imovel->id}}">{{$imovel->id}}</a></td>
                <td>{{$imovel->rua}}</td>
                <td>{{$imovel->numero}}</td>
                <td>{{$imovel->valor}}</td>

                <td>
                    <a href="{{route('imovel_edit', $imovel->id)}}">Editar</a>
                    <a href="{{route('imovel_delete', $imovel->id)}}">Excluir</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p>Imovels não encontrados! </p>
@endif
<p><a href="{{route('imovel_create')}}">Novo imovel</a></p>
</body>
</html>
