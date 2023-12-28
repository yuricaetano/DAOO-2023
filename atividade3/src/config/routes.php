<?php

use Daoo\Aula03\controller\api\Imovel;
use Daoo\Aula03\controller\api\Contrato;
use Daoo\Aula03\controller\api\Cliente;

$routes = [
    'api' => [
        'contratos' => Contrato::class,
        'clientes' => Cliente::class,
        'imovels' => Imovel::class
    ],
    // 'web' => [
    //     'produtos' => WebProduto::class
    // ]
];
