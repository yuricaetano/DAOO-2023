<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
<h1>Insert new Contrato</h1>
<form action="{{route('contrato_update',$contrato->id)}}" method="POST">
    @csrf
    <table>
        <tr>
            <td>Descricao:</td>
            <td><input type="text" name="descricao" value="{{$contrato->descricao}}"/></td>
        </tr>
        <tr>
            <td>Valor:</td>
            <td><input type="text" name="valor" value="{{$contrato->valor}}"/></td>
        </tr>
        <tr align="center">
            <td colspan="2">
                <input type="submit" value="Salvar"/>
                <a href="/contratos"><button form=cancel >Cancelar</button></a>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
