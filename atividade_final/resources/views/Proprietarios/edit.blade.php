<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
<h1>Inserir novo Proprietario</h1>
<form action="{{route('proprietario_update',$proprietario->id)}}" method="POST">
    @csrf
    <table>
    <tr>
            <td>Nome:</td>
            <td><input type="text" name="nome" value="{{$proprietario->nome}}"/></td>
        </tr>
        <tr>
            <td>Telefone:</td>
            <td><input type="text" name="telefone" value="{{$proprietario->telefone}}"/></td>
        </tr>
        <tr>
            <td>Cpf:</td>
            <td><input type="text" name="cpf" value="{{$proprietario->cpf}}"/></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="text" name="email" value="{{$proprietario->email}}"/></td>
        </tr>
        <tr align="center">
            <td colspan="2">
                <input type="submit" value="Salvar"/>
                <a href="/Proprietarios"><button form=cancel >Cancelar</button></a>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
