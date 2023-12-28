<?php

require 'Paciente.php';
require 'IMC.php';

$pessoaUm = new Paciente("Maria", 60, 1.6);
$imcPessoaUm = IMC::calcImc($pessoaUm);

$classificacaoPessoaUm = IMC::classificaPorImc($pessoaUm);


var_dump($imcPessoaUm);
var_dump($classificacaoPessoaUm);

