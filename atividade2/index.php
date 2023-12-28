<?php
include 'autoload.php';

use Classes\Atleta;
use Classes\Medico;
use Classes\Logs\Relatorio;

$jogador = new Atleta("Pedro Geromel", 1.90,84, 35);
$medico = new Medico("Paulo Paixão", 12345, "Fisiologista", 65);
$relatorio = new Relatorio;
$relatorio->add($medico);
$relatorio->add($jogador);
$relatorio->imprime();