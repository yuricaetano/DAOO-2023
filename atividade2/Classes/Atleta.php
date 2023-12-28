<?php

namespace Classes;

use Classes\Abstract\Pessoa;
use interfaces\iFuncionario;
use traits\IMC;


class Atleta extends Pessoa implements iFuncionario
{
    use IMC;
    private string $classificacao;
    private bool $isNormal;
    public function __construct($nome, $altura, $peso, $idade = null) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->peso = $peso;
        $this->altura = $altura;
        $this->calcImc();
        $this->classificacao = $this->classifica();
        $this->isNormal = $this->isNormal();
    }

    /**
     * @return mixed
     */
    public function mostrarSalario(): string
    {
        return "Salário: R$ 00.000,00";
    }

    /**
     * @return mixed
     */
    public function mostrarTempoContrato(): string
    {
        return "Contrato de 4 anos.";
    }

    function __toString(): string{
        return "\n===Dados do Atleta==="
            ."\nNome: $this->nome"
            .($this->idade?"\nIdade: $this->idade":"")
            ."\nPessoa: $this->peso"
            ."\nAltura: $this->altura"
            ."\nIMC:"
            ."\n - Valor: " . number_format($this->imc, 2)
            ."\n - Classificação: $this->classificacao"
            ."\n=========================\n"
            ."\nContrato:\n "
            ."\n" . $this->mostrarSalario()
            ."\n" . $this->mostrarTempoContrato();

    }

}