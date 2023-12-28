<?php
class Pessoa
{
    private string $nome;
    private int | null $idade;
    private float | null $peso;
    private float | null $altura;

    public function __construct(string $nome, ?int $idade, ?float $peso, ?float $altura)
    {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->peso = $peso;
        $this->altura = $altura;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getIdade(): ?int
    {
        return $this->idade;
    }

    public function setIdade(?int $idade): void
    {
        $this->idade = $idade;
    }

    public function getPeso(): ?float
    {
        return $this->peso;
    }

    public function setPeso(?float $peso): void
    {
        $this->peso = $peso;
    }

    public function getAltura(): ?float
    {
        return $this->altura;
    }

    public function setAltura(?float $altura): void
    {
        $this->altura = $altura;
    }

}