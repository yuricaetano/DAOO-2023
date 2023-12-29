<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
<h1>Insert new Cliente</h1>
<form action="{{route('cliente_update',$cliente->id)}}" method="POST">
    @csrf
    <table>
        <tr>
            <td>Nome:</td>
            <td><input type="text" name="nome" value="{{$cliente->nome}}"/></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="text" name="email" value="{{$cliente->email}}"/></td>
        </tr>
        <tr align="center">
            <td colspan="2">
                <input type="submit" value="Salvar"/>
                <a href="/clientes"><button form=cancel >Cancelar</button></a>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
