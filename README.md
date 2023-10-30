# Orientação a objetos com PHP

A orientação a objetos é um paradigma de programação que se baseia na organização e estruturação do código em torno de objetos, que são representações de entidades do mundo real. Esses objetos possuem características (atributos) e comportamentos (métodos) que podem ser definidos e manipulados de forma independente.

Os 4 pilares da Programação Orientada a Objetos são:

-   Abstração.
-   Encapsulamento.
-   Herança.
-   Polimorfismo.

## Classes e Objetos

Quando pensamos em orientação a objetos podemos pensar em objetos do mundo real. Por exemplo, se pensamos em um carro ele é um objeto e possui vários atributos, volante, câmbio, rodas... contudo existem varios modelos de carros por isso o carro pode ser classificado e sendo assim ele é uma classe. Uma instância dessa classe seria o nosso objeto, por exemplo, o seu carro.

```php

class Carro {
  public string volante;
  public string cambio;
....
}

$seuCarro = new Carro();

```

## Métodos

Os métodos são as funções da classe, ou seja, métodos executam ações específicas nos objetos da classe.

```php

class Carro {
  public string volante;
  public string cambio;
....
}

```

## Encapsulamento

O encapsulamento diz respeito aos métodos privados de uma classe. Ainda pensando no carro podemos pensar em mecanismos do motor do carro, ele não é algo totalmente acessivel para qualquer um como o painel do carro, pois não deve ser modificado a qualquer momento por qualquer pessoa.

```php

class Carro {
  private string volante;
  private string cambio;
....
}

```

Para acessar atributos privados devemos utilizar os getters e setters.
O método getter retorna o valor do atributo. O método setter recebe um parâmetro e o coloca no atributo.

```php

public function getVolante(): string {

    return this->volate;
}

public function setVolante(): void {

    this->volante = $volante;
}


```

## Henraça

A herança é exatamente o que o nome diz, uma classe que vai herdar os dados de outra classe. Teremos uma classe filha e uma classe pai. A classe filha poderá utilizar os métodos da classe pai, entre outras coisas que pode herdar. Assim uma classe filha pode utilizar os dados da classe pai e ainda ter seus próprios métodos e atributos. Como um modelo específico de carro.

```php
class Fiesta extends Carro {

    ...
}

```

## Polimorfismo

O polimorfismo esta diretamente ligado a herança. Com a herança duas classes podem ter os mesmos métodos mas estes métodos também podem ser alterados e então se comportar de formas diferentes em cada uma destas classes, isso é o polimorfismo.

```php
class Funcionario {

    public function Dados (string $nome, int $idade) {
        echo `O nome é ${nome} e idade de ${idade} anos`;
    }

}

class Diretor extends Funcionario {

    public function Dados (string $nome, int $idade) {
        echo `O nome é ${nome} e idade de ${idade} anos. E é Diretor`;
    }

}

class Diretor extends Funcionario {

    public function Dados (string $nome, int $idade) {
        echo `O nome é ${nome} e idade de ${idade} anos. E é Diretor`;
    }

}

class Vendedor extends Funcionario {

    public function Dados (string $nome, int $idade) {
        echo `O nome é ${nome} e idade de ${idade} anos. E é Vendedor`;
    }

}

```

No exemplo temos a classe pai "Funcionário" e suas classes filhas que herdam o método "Dados" contudo em cada uma delas existe uma pequena diferença no final do "echo".

## Classes e métodos Abstratos

Quando temos uma classe com métodos abstratos isso faz com que sempre que formos implementar uma classe filha que extende essa determina classe abstrata somos obrigados a implementar esse método na classe filha. O método abstrato normalmente é um esboço, um método vazio, que te obriga a implementa-lo na classe final,

```php
    abstract protected function percentualTarifa(): float;

```

## Herança Múltipla

Isso ocorre quando uma classe extende outras duas classes. Contudo isso não é possível em todas as linguagens, C++ tem essa funcionalidade, contudo em PHP e Java, por exemplo, não é possível.

Isso é útil, contudo pode gerar certos problemas. Por exemplo, se tenho métodos com nomes iguais em ambas as classes extendidas, não tem como saber qual método de qual classe será utilizado na classe filha. Conhecido como Diamond Problem. [Para ler mais sobre](https://www.alura.com.br/apostila-python-orientacao-a-objetos/heranca-multipla-e-interfaces?_gl=1*1clvfw7*_ga*MTcxODE4ODU4NC4xNjk3NjY5MDMw*_ga_1EPWSW3PCS*MTY5ODEwNTIyNi4xNS4xLjE2OTgxMDYwOTIuMC4wLjA.*_fplc*Q05WSTRrNmZWQ2FQN2E4RlVIUVN2WGRrVGg5dDd0U01JZEQ1OGxITFlEZ2tMaDl0aENoZFdGblR6MXlYWlRPeVZ5THZ5aVNVNDRHM3hTajV1SEgyRnpyMFREM1hDZ1BtdmNsdiUyQjVVdXJCanZaeG5Bbk1xNjI0STR0SCUyRmIlMkJnJTNEJTNE#problema-do-diamante)

## Interface

Uma interface é basicamente uma classe abstrata com todos os seus métodos abstratos e não possui atributos. Basicamente ao criar uma interface class criamos um contrato, onde ao implementar essa classe será necessário passar todos os métodos dela.

É possível implementar quantas interfaces quiser dentro de uma outra classe utilizando a palavra "implements", seguindo a seguinte sintaxe:

```php

class Diretor extends Funcionario implements Autenticável, \JsonSerializable {
    ...
}

```

## Impedindo herança

Serve para quando queremos informar que uma classe é final, ou seja que não é possível extender ela de forma alguma.

Para isso é bem simples, para dizer que uma determinada classe é o modelo final utilizamos "final".

```php
final class CPF {
    ...
}
```

Isso também pode ser feito nos métodos de uma classe.
Para impedir que sejam editados em classes filhas, assim não é possível sobrescreve-los.

```php

final protected function validaNome(string $nomeTitular) {
    ...
}
```

# Alguns métodos mágicos do PHP

## toString

Método padrão do PHP para retornar uma string da instância da classe.

```php
final class CPF {
    ...
}
```

```php

public function __toString(): string {
    return "{$this->rua}, {$this->numero}, {$this->bairro}, {$this->cidade}";
}

echo $umEndereco;
//Retorno: Rua tal, 123, Centro, São Paulo

```

## get

Permite que seja possível acessar um atributos específico livremente.
Desta forma podemos chamar um atributo sem precisar utilizar diretamente o getter dele.
Recebe um parâmetro que é o nome do atributo que queremos acessar.

```php

/**
 * @property-read string $cidade
 * @property-read string $bairro
 * @property-read string $rua
 * @property-read string $numero
 */

 public function recuperaCidade(): string
    {
        return $this->cidade;
}

public function recuperaBairro(): string
    {
        return $this->bairro;
}

public function recuperaRua(): string
    {
        return $this->rua;
}

public function recuperaNumero(): string
    {
        return $this->numero;
}

public function __get(string $nomeAtributo) {
    $metodo = 'recupera' . ucfirst($nomeAtributo);
    exit();
}

//Acessando o atributo

echo $umEndereco->bairro;
//Retorno: Centro

```

## set

Este mesmo método get mencionado anteriormente também existe para os setters.
Recebendo como parâmetro dois atributos, o nome e o valor.

```php

public function alteraNome(string $nome): void {
    $this->validaNomeTitular($nome);
    $this->nome = $nome;
}

public function __set(string $nomeAtributo, string $value) {
    $metodo = 'altera' . ucfirst($nomeAtributo);
    $this->$metodo($value);
}

```

[Para ler mais sobre métodos mágicos consulte a documentação](https://www.php.net/manual/pt_BR/language.oop5.magic.php)

## Traits

O Traits no PHP ajuda muito na reutilização de código.
Basicamente com o Trait o PHP pega um determinado código e injeta na classe que você quiser.

```php
namespace POO\Banco\Modelo;

trait AcessoPropriedades {

    public function __get(string $nomeAtributo) {
        $metodo = 'recupera' . ucfirst($nomeAtributo);
        exit();
    }
}

```

Na classe Endereco adicionamos:

```php
    use AcessoPropriedades;
```

Com isso basicamente o PHP vai pegar o código e colar na respectiva classe.

[Para saber mais sobre Trais no PHP](https://www.php.net/manual/en/language.oop5.traits.php)

# Sobre a arquitetura de pastas do repositório

## Organização de pastas

Durante os treinamentos de Orientação a Objetos, nós organizamos nossas pastas utilizando uma estrutura bastante comum.

Existe uma pasta raiz para nosso código (src) que inclusive facilita que a gente siga à PSR-4.

Dentro dessa pasta raiz, temos sub pastas que identificam responsabilidades em nosso sistema.

## Arquitetura

Organização de pastas em nosso código é um início bem simplório de um estudo sobre arquitetura.
Como organizar nosso projeto é um estudo muito importante e existem vários livros, palestras e conteúdo em geral sobre isso.

## Alternativas à nossa abordagem

É muito comum e recomendado por muitos que ao invés de separar as sub pastas por responsabilidade (Model, Service, etc.), separemos por conceitos de domínio, parecido com o que fizemos dentro da pasta Model.
Estudos específicos de arquitetura e design de código abordam estes conceitos com muito mais detalhes.
