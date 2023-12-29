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
<form action="/roommate" method="POST">
    @csrf
    {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"/> --}}
    <table>
        <tr>
            <td>Nome:</td>
            <td><input type="text" name="nome"/></td>
        </tr>
        <tr>
            <td>Telefone:</td>
            <td><input name="telefone" type="text"/></td>
        </tr>
        <tr>
            <td>cpf:</td>
            <td><input name="cpf" type="text"/></td>
        </tr>
        <tr>
            <td>email:</td>
            <td><input name="email" type="text"/></td>
        </tr>
        <tr align="center">
            <td colspan="2"><input type="submit" value="Criar"/></td>
        </tr>
        <tr align="center">
            <td colspan="2"><a href="/Cliente" style="display: inline">&#2b58de;&nbsp;Voltar</a></td>
        </tr>
    </table>
</form>
</body>

</html>
