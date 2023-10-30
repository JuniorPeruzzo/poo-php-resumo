<?php

require_once 'autoload.php';

use POO\Banco\Service\ControladorDeBonificacoes;
use POO\Banco\Modelo\CPF;
use POO\Banco\Modelo\Funcionario\{Diretor, Gerente, Desenvolvedor};

$umFuncionario = new Desenvolvedor(
    'Vinicius Dias',
    new CPF('123.456.789-10'),
    'Desenvolvedor',
    1000
);

$umFuncionario->sobeDeNivel();

$umaFuncionaria = new Gerente(
    'Patricia',
    new CPF('987.654.321-10'),
    'Gerente',
    3000
);

$umDiretor = new Diretor(
    'Ana Paula',
    new CPF('123.951.789-11'),
    'Diretor',
    5000
);

$controlador = new ControladorDeBonificacoes();
$controlador->adicionaBonificacaoDe($umFuncionario);
$controlador->adicionaBonificacaoDe($umaFuncionaria);
$controlador->adicionaBonificacaoDe($umDiretor);

echo $controlador->recuperaTotal();
