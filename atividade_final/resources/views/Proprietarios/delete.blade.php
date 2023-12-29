<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de proprietario</title>
</head>
<body>
@if ($proprietario)
    <h1>{{ $proprietario->nome }}</h1>
    <ul>
        <li>email: {{ $proprietario->email}}</li>
    </ul>
    <table>
        <tr>
            <td>
                <form action="{{ route('proprietario_remove',$proprietario->id) }}" method='post'>
                    @csrf
                    <input type="submit" name='confirmar' value="Remover" />
                </form>
            </td>
            <td>
                <a href="/proprietarios"><button>Cancelar</button></a>
            </td>
        </tr>
    </table>
@else
    <p>Contratos não encontrados! </p>
@endif
<a href="/Proprietarios">&#2b58de;Voltar</a>
</body>
</html>
