<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RoommieLink</title>
</head>

<body>
<h1>Insert new Imovel</h1>
<form action="{{route('imovel_update',$imovel->id)}}" method="POST">
    @csrf
    <table>
        <tr>
            <td>Rua:</td>
            <td><input type="text" name="rua" value="{{$imovel->rua}}"/></td>
        </tr>
        <tr>
            <td>Numero:</td>
            <td><input type="text" name="numero" value="{{$imovel->numero}}"/></td>
        </tr>
        <tr>
            <td>Cidade:</td>
            <td><input type="text" name="cidade" value="{{$imovel->cidade}}"/></td>
        </tr>


        <tr align="center">
            <td colspan="2">
                <input type="submit" value="Salvar"/>
                <a href="/imoveis"><button form=cancel >Cancelar</button></a>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
