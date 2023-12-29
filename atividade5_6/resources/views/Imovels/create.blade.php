<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
<h1>Insert new Imovel</h1>
<form action="/imovel" method="POST">
    @csrf
    {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"/> --}}
    <table>
        <tr>
            <td>Rua:</td>
            <td><input type="text" name="rua"/></td>
        </tr>
        <tr>
            <td>Numero:</td>
            <td><input name="numero" type="text"/></td>
        </tr>
        <tr>
            <td>Valor:</td>
            <td><input name="valor" type="text"/></td>
        </tr>
        <tr align="center">
            <td colspan="2"><input type="submit" value="Criar"/></td>
        </tr>
        <tr align="center">
            <td colspan="2"><a href="/imovels" style="display: inline">&#9664;&nbsp;Voltar</a></td>
        </tr>
    </table>
</form>
</body>

</html>
