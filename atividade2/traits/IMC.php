<?php

namespace traits;


trait IMC
{
    protected float | null $imc;
    public function calcImc(): void {
        if(isset($this->peso)&&isset($this->altura)) {
            $this->imc = $this->peso/$this->altura**2;
        } else {
            echo "Erro, defina peso e altura primeiro!";
        }
    }

    public function classifica(): string {
        $classificacao = "";
        if($this->imc < 18.5) {
            $classificacao = "Abaixo do peso";
        } else if($this->imc >= 18.5 && $this->imc <= 24.9) {
            $classificacao = "Saudável";
        }  else if($this->imc >= 25.0 && $this->imc <= 29.9) {
            $classificacao = "Sobrepeso";
        } else if($this->imc > 30.0) {
            $classificacao = "Obesidade";
        }
        return $classificacao;
    }

    public function isNormal(): ?bool {
        $idadeIntervalos = [
            [19, 24, 19, 24],
            [25, 34, 20, 25],
            [35, 44, 21, 26],
            [45, 54, 22, 27],
            [55, 64, 23, 28],
            [65, PHP_INT_MAX, 24, 29]
        ];

        foreach ($idadeIntervalos as $intervalo) {
            [$idadeMin, $idadeMax, $imcMin, $imcMax] = $intervalo;

            if (isset($this->idade) && $this->idade >= $idadeMin && $this->idade <= $idadeMax &&
                $this->imc >= $imcMin && $this->imc <= $imcMax) {
                return true;
            }
        }
        return false;
    }

}