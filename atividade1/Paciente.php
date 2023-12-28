<?php
require_once 'Pessoa.php';


class Paciente extends Pessoa
{
    public function __construct($nome, $peso, $altura)
    {
        parent::__construct($nome,null, $peso, $altura);
    }
}