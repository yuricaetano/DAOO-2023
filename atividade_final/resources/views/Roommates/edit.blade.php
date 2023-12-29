<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
<h1>Inserir novo Roommate</h1>
<form action="{{route('roommate_update',$roommate->id)}}" method="POST">
    @csrf
    <table>
        <tr>
            <td>Nome:</td>
            <td><input type="text" name="nome" value="{{$roommate->nome}}"/></td>
        </tr>
        <tr>
            <td>Telefone:</td>
            <td><input type="text" name="telefone" value="{{$roommate->telefone}}"/></td>
        </tr>
        <tr>
            <td>Cpf:</td>
            <td><input type="text" name="cpf" value="{{$roommate->cpf}}"/></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="text" name="email" value="{{$roommate->email}}"/></td>
        </tr>

        <tr align="center">
            <td colspan="2">
                <input type="submit" value="Salvar"/>
                <a href="/roommates"><button form=cancel >Cancelar</button></a>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
