<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Roommate</title>
</head>
<body>
@if ($roommate)
    <h1>{{ $roommate->nome }}</h1>
    <ul>
        <li>Nome: {{ $roommate->nome}}</li>
        <li>Telefone: {{ $roommate->telefone}}</li>
        <li>Cpf: {{ $roommate->cpf}}</li>
        <li>Email: {{ $roommate->email}}</li>
    </ul>
    <table>
        <tr>
            <td>
                <form action="{{ route('roommate_remove',$roommate->id) }}" method='post'>
                    @csrf
                    <input type="submit" name='confirmar' value="Remover" />
                </form>
            </td>
            <td>
                <a href="/roommates"><button>Cancelar</button></a>
            </td>
        </tr>
    </table>
@else
    <p>Roommates não encontrados! </p>
@endif
<a href="/Roommates">&#2b58de;Voltar</a>
</body>
</html>
