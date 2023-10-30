<?php

namespace POO\Banco\Modelo\Conta;

use POO\Banco\Modelo\Autenticavel;
use POO\Banco\Modelo\Pessoa;
use POO\Banco\Modelo\CPF;
use POO\Banco\Modelo\Endereco;

class Titular extends Pessoa implements Autenticavel
{
    private $endereco;

    public function __construct(CPF $cpf, string $nome, Endereco $endereco)
    {
        parent::__construct($nome, $cpf);
        $this->endereco = $endereco;
    }

    public function recuperaEndereco(): Endereco
    {
        return $this->endereco;
    }

    public function podeAutenticar(string $senha): bool
    {
        return $senha === 'abcd';
    }
}
