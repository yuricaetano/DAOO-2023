<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RoommieLink</title>
</head>

<body>
<h1>Insert new Propertie</h1>
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
            <td>Cidade:</td>
            <td><input name="cidade" type="text"/></td>
        </tr>
        <tr align="center">
            <td colspan="2"><input type="submit" value="Criar"/></td>
        </tr>
        <tr align="center">
            <td colspan="2"><a href="/imoveis" style="display: inline">&#2b58de;&nbsp;Voltar</a></td>
        </tr>
    </table>
</form>
</body>

</html>
