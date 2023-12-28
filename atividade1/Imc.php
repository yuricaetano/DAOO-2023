<?php

require_once 'Paciente.php';

class IMC
{
    public static function calcImc(Paciente $paciente): string {
        $peso = $paciente->getPeso();
        $altura = $paciente->getAltura();
        if(isset($peso)&&isset($altura)) {
            $imc = $peso / ($altura * $altura);
            return number_format($imc, 2);
        } else {
            return "Favor fornecer o peso e altura";
        }
    }

    public static function classificaPorImc(Paciente $paciente): string {
        $imc = IMC::calcImc($paciente);
        $classificacao = "";
        if($imc < 18.5) {
            $classificacao = "Abaixo do peso";
        } else if($imc >= 18.5 && $imc <= 24.9) {
            $classificacao = "Saudável";
        }  else if($imc >= 25.0 && $imc <= 29.9) {
            $classificacao = "Sobrepeso";
        } else if($imc > 30.0) {
            $classificacao = "Obesidade";
        }
        return $classificacao;
    }

}