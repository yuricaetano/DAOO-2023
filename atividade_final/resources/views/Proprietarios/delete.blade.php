<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contrato</title>
</head>
<body>
@if ($contrato)
    <h1>{{ $contrato->descricao }}</h1>
    <ul>
        <li>valor: {{ $contrato->valor}}</li>
    </ul>
    <table>
        <tr>
            <td>
                <form action="{{ route('contrato_remove',$contrato->id) }}" method='post'>
                    @csrf
                    <input type="submit" name='confirmar' value="Remover" />
                </form>
            </td>
            <td>
                <a href="/contratos"><button>Cancelar</button></a>
            </td>
        </tr>
    </table>
@else
    <p>Contratos não encontrados! </p>
@endif
<a href="/Contratos">&#9664;Voltar</a>
</body>
</html>
