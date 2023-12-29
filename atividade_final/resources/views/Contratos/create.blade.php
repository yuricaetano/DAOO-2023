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
<form action="/contrato" method="POST">
    @csrf
    {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"/> --}}
    <table>
        <tr>
            <td>Descricao:</td>
            <td><input type="text" name="descricao"/></td>
        </tr>
        <tr>
            <td>Valor:</td>
            <td><input name="valor" type="text"/></td>
        </tr>
        <tr align="center">
            <td colspan="2"><input type="submit" value="Criar"/></td>
        </tr>
        <tr align="center">
            <td colspan="2"><a href="/contratos" style="display: inline">&#9664;&nbsp;Voltar</a></td>
        </tr>
    </table>
</form>
</body>

</html>
