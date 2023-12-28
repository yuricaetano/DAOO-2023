<?php
namespace Classes;

use Classes\Abstract\Pessoa;
class Medico extends Pessoa{

    private $crm, $especialidade;

    public function __construct($nome, $crm,$especialidade, $idade)
    {
        $this->nome = $nome;
        $this->crm = $crm;
        $this->especialidade = $especialidade;
        $this->idade = $idade;
    }

    public function getCRM(){
        return $this->crm;
    }

    public function __toString(): string
    {
        $className = self::class;
        return 	"\n===Dados de $className ==="
            . "\nNome: $this->nome"
            . ($this->idade ? "\nIdade: $this->idade" : "")
            . "\nEspecialidade: $this->especialidade"
            . "\nCRM: $this->crm\n";
    }
}