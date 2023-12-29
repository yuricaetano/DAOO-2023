<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
@if ($imovel)
    <h1>{{ $imovel->nome }}</h1>
    <ul>
        <li>Rua: {{ $imovel->rua}}</li>
        <li>Numero: {{ $imovel->numero}}</li>
        <li>Cidade: {{ $imovel->cidade}}</li>
    </ul>
    <table>
        <tr>
            <td>
                <form action="{{ route('imovel_remove',$imovel->id) }}" method='post'>
                    @csrf
                    <input type="submit" name='confirmar' value="Remover" />
                </form>
            </td>
            <td>
                <a href="/imoveis"><button>Cancelar</button></a>
            </td>
        </tr>
    </table>
@else
    <p>Imovels não encontrados! </p>
@endif
<a href="/Imoveis">&#9664;Voltar</a>
</body>
</html>
