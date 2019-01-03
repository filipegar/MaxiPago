# MaxiPago! gateway PHP SDK

Esta é uma implementação framework agnostic em PHP dos serviços do gateway [MaxiPago!](http://www.maxipago.com), um produto [Rede/Itaú Unibanco](https://www.userede.com.br/).

O gateway MaxiPago! permite transacionar cartões de crédito, débito, transferência bancária, boleto bancário e carterias digitais - ApplePay e PayPal.

A contratação do serviço é feita de forma independente ou em oferta agregada com Rede. Consulte seu executivo de contas.

## Principais recursos

* [x] Pagamentos por cartão de crédito.
* [x] Pagamentos por cartão de débito / autenticação.
* [x] Pagamentos por boleto bancário.
* [x] Pagamentos por transferência eletrônica.
* [x] Captura de autorização / cancelamento.
* [x] Consulta de transações.
* [x] Tokenização (compra com 1-click).
* [x] Pagamentos recorrentes.

## Instalando o SDK

A melhor forma de instalar este pacote é via [Composer](http://getcomposer.org).

Se já possui um arquivo `composer.json`, basta adicionar a seguinte dependência ao seu projeto:

```json
"require": {
    "filipegar/maxipago": "^1.0"
}
```

Com a dependência adicionada ao `composer.json`, basta executar:

```
composer install
```

Alternativamente, você pode executar diretamente em seu terminal:

```
composer require "filipegar/maxipago"
```

---

## Utilizando o SDK

Exemplos de código estão disponíveis no arquivo [docs.md](../docs.md) na raiz deste repositório.

## Cartões para testes
 
Os cartões de teste estão disponíveis na documentação do MaxiPago! [neste link](http://developers.maxipago.com/apidocs/maxipago/cartao-de-credito/).
 
As credenciais de teste são enviadas quando você assinar seu contrato com a MaxiPago!.
 
## Documentação do MaxiPago!
 
A documentação do MaxiPago está disponível no site de Desenvolvedores [neste link](http://developers.maxipago.com).
 
Se você encontrar um comportamento diferente do documentado, por favor, reporte um issue para verificação.
 
## Licença
 
Este pacote de código aberto segue os termos do [MIT license](https://opensource.org/licenses/MIT).
