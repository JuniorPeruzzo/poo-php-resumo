<?php

namespace POO\Banco\Service;

use POO\Banco\Modelo\Funcionario\Funcionario;

class ControladorDeBonificacoes
{
    private $totalBonificacoes = 0;

    public function adicionaBonificacaoDe(Funcionario $funcionario)
    {
        $this->totalBonificacoes += $funcionario->calculaBonificacao();
    }

    public function recuperaTotal(): float
    {
        return $this->totalBonificacoes;
    }
}
