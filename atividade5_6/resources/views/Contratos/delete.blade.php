<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contratos</title>
</head>
<body>
@if ($contrato)
    <h1>{{ $contrato->tipo }}</h1>
    <ul>
        <li>Valor: {{ $contrato->valor}}</li>
        <li>Imovel do Contrato: {{ $contrato->imovel_contrato}}</li>
        <li>Cliente do Contrato: {{ $contrato->cliente_contrato}}</li>

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
    <p>contratos não encontrados! </p>
@endif
<a href="/contratos">&#9664;Voltar</a>
</body>
</html>
