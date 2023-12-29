<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
</head>
<body>
@if ($cliente)
    <h1>{{ $cliente->nome }}</h1>
    <ul>
        <li>Nome: {{ $cliente->nome}}</li>
        <li>Telefone: {{ $cliente->telefone}}</li>
        <li>Cpf: {{ $cliente->cpf}}</li>
        <li>Email: {{ $cliente->email}}</li>
    </ul>
    <table>
        <tr>
            <td>
                <form action="{{ route('cliente_remove',$cliente->id) }}" method='post'>
                    @csrf
                    <input type="submit" name='confirmar' value="Remover" />
                </form>
            </td>
            <td>
                <a href="/clientes"><button>Cancelar</button></a>
            </td>
        </tr>
    </table>
@else
    <p>Clientes não encontrados! </p>
@endif
<a href="/Clientes">&#9664;Voltar</a>
</body>
</html>
