# Utilizando o SDK

A API do MaxiPago! tem três operações e estas foram implementadas no MaxiPagoClient.

1. Transações financeiras - método ```$maxipago->transaction($transacao)```

```php
//classes aceitas pelo método - implementam herança de Gateway\Operations\Transaction\Order\Order;
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Auth; //autorização
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Capture; //captura
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\RecurringPayment; //pagamento recorrente
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Sale; //autorização + captura
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\ZeroDollar; //zero dollar (validação)
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\VoidCapture; //cancelar captura
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\ReturnSale; //estornar venda
```

2. Operações de cadastro - método ```$maxipago->registration($cadastro)```

```php
//classes aceitas pelo método - implementam herança de Gateway\Operations\Registration\ApiRequest;
use Filipegar\Maxipago\Gateway\Operations\Registration\AddCardOnFile; //salva cartão em token
use Filipegar\Maxipago\Gateway\Operations\Registration\AddConsumer; //adiciona um consumer para salvar cartões
use Filipegar\Maxipago\Gateway\Operations\Registration\CancelRecurringPayment; //cancela uma recorrência
use Filipegar\Maxipago\Gateway\Operations\Registration\DeleteCardOnFile; //deleta um token de cartão
use Filipegar\Maxipago\Gateway\Operations\Registration\DeleteConsumer; //deleta um consumer e seus cartões
use Filipegar\Maxipago\Gateway\Operations\Registration\ModifyRecurringPayment; //altera um pagamento recorrente
use Filipegar\Maxipago\Gateway\Operations\Registration\UpdateConsumer; //atualiza um consumer
```

3. Operações de consulta (relatórios) - método ```$maxipago->report($filtro)```

```php
//classes aceitas pelo método - implementam herança de Gateway\Operations\Report\ApiRequest;
use Filipegar\Maxipago\Gateway\Operations\Report\CheckRequestStatus; //consulta o resultado de uma pesquisa em massa
use Filipegar\Maxipago\Gateway\Operations\Report\TransactionDetailReport; //operações de consulta
```

Os parâmetros necessários para as chamadas da API são definidos por métodos fluentes de cada classe com o mesmo nome dos elementos XML da API.

---

## Transações

As transações têm PaymentTypes, que são os métodos de pagamento aceitos pelo gateway.
```php
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities\PaymentTypes\Boleto; //boleto
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities\PaymentTypes\CreditCard; //cartão de crédito
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities\PaymentTypes\DebitCard; //cartão de débito
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities\PaymentTypes\OnFile; //cartão tokenizado
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities\PaymentTypes\OnlineDebit; //transferência bancária
```

Você não precisa criar estes objetos de forma independente. Devido aos métodos fluentes, você pode definir estes objetos como abaixo:
```php
<?php
require 'vendor/autoload.php';
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Sale;

$sale = new Sale();

//boleto
$sale->transactionDetail()->payType()->boleto()
->setExpirationDate("2019-12-30")->setNumber('12345670')
->setInstructions("SR. CAIXA, NAO ACEITAR PAGTO EM CHEQUES.");

//cartão de crédito/débito
$sale->transactionDetail()->payType()->creditCard()
    ->setNumber("4242424242424242")->setCvvNumber("123")
    ->setExpMonth("12")->setExpYear("2022");
                
$sale->transactionDetail()->payType()->debitCard()
    ->setNumber("4242424242424242")->setCvvNumber("123")
    ->setExpMonth("12")->setExpYear("2022");

//cartão tokenizado
$sale->transactionDetail()->payType()->onFile()
    ->setCustomerId('123456')->setToken("/7aIySy/pI4=")->setCvvNumber('123');

//transferência bancária
$sale->transactionDetail()->payType()->onlineDebit()->setParametersURL("id=algoparaaURLdeRetorno");
```

#### Transação de Autorização - auth

```php
<?php
require 'vendor/autoload.php';

use Filipegar\Maxipago\Merchant;
use Filipegar\Maxipago\Gateway\Environment;
use Filipegar\Maxipago\Gateway\MaxipagoClient;
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Auth;
use Filipegar\Maxipago\Gateway\Exceptions\TransactionException;

//Configure suas credenciais - StoreID e token
$merchant = new Merchant("store-id", "token");
//Crie seu cliente da SDK
$maxipago = new MaxipagoClient($merchant, Environment::sandbox());

// Crie uma instância de Auth para pré-autorizar um cartão de crédito
$sale = (new Auth())->setProcessorID(1)->setReferenceNum("IdPedidoNaLoja")
    ->setFraudCheck(false)->setIpAddress("189.38.95.95")
    ->setCustomerIdExt('123.456.789-09');

// Informe os dados do cliente (opcionais em alguns casos)
// billingCustomer() retorna uma instância de Order\Entities\Customer.
$customer = $sale->billingCustomer()->setName("Fulano da Silva")->setAddress("Rua das Fiandeiras, 123")
    ->setDistrict("Pinheiros")->setCity("Sao Paulo")->setState("SP")
    ->setPostalcode("04545002")->setCountry("BR")->setPhone("11999991234")
    ->setEmail("fulano@gmail.com");

// Crie outro cliente para os dados de envio ou use o mesmo cliente que o criado no billing.
// $sale->setShipping($customer);
$sale->shippingCustomer()->setName("Fulano da Silva")->setAddress("Rua das Fiandeiras, 123")
    ->setDistrict("Pinheiros")->setCity("Sao Paulo")->setState("SP")
    ->setPostalcode("04545002")->setCountry("BR")->setPhone("11999991234")
    ->setEmail("fulano@gmail.com");

// Crie um bloco de pagamento
$paytype = $sale->transactionDetail()->payType();
// E defina a forma de pagamento
$paytype->creditCard()->setNumber("4242424242424242")
    ->setExpMonth("12")->setExpYear("2022")->setCvvNumber("123");

// Por último, crie um bloco Payment e configure o valor da transação.
$sale->payment()->setSoftDescriptor("IDnaFatura")->setChargeTotal(99.90)->creditInstallments(2);

try {
    // Por último, envie a transação.
    // $transactionResponse é uma instância de Filipegar\Maxipago\Gateway\Responses\TransactionResponse
    // que tem os mesmos métodos retornados pelo XML do MaxiPago, só que em objeto nativo do PHP.
    $transactionResponse = $maxipago->transaction($sale);

    // Com a venda criada na MaxiPago!, você tem o OrderID e os demais dados retornados pelo adquirente e gateway.
    $orderId = $transactionResponse->getOrderID(); // 0A0104A3:9E1F7F0167FC:183B:84054E62
    $responseCode = $transactionResponse->getResponseCode(); //estado da transação
} catch (TransactionException $e) {
    // Em caso de erros de integração, podemos tratar o erro aqui.
    $error = $e->getMessage();
}
```

#### Transação de Captura - confirmar uma autorização

```php
<?php
require 'vendor/autoload.php';

use Filipegar\Maxipago\Merchant;
use Filipegar\Maxipago\Gateway\Environment;
use Filipegar\Maxipago\Gateway\MaxipagoClient;
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Capture;
use Filipegar\Maxipago\Gateway\Exceptions\TransactionException;

//Configure suas credenciais - StoreID e token
$merchant = new Merchant("store-id", "token");
//Crie seu cliente da SDK
$maxipago = new MaxipagoClient($merchant, Environment::sandbox());

//Crie a instância da Capture
$sale = (new Capture())
    ->setOrderID("0A0104A3:9E1F7F0167FC:183B:84054E62")->setReferenceNum("Pedido XPTO123");

//Confirme o valor da captura, que pode ser menor que o autorizado
$sale->payment()->setChargeTotal(99.90);
try {
    $transactionResponse = $maxipago->transaction($sale);

    $responseCode = $transactionResponse->getResponseCode(); //estado da transação
    $responseString = $transactionResponse->getResponseMessage(); //CAPTURED
} catch (TransactionException $e) {
    $error = $e->getMessage();
}
```

#### Transação de Autorização + Captura Automática (Sale)

```php
<?php
require 'vendor/autoload.php';

use Filipegar\Maxipago\Merchant;
use Filipegar\Maxipago\Gateway\Environment;
use Filipegar\Maxipago\Gateway\MaxipagoClient;
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Sale;
use Filipegar\Maxipago\Gateway\Exceptions\TransactionException;

//Configure suas credenciais - StoreID e token
$merchant = new Merchant("store-id", "token");
//Crie seu cliente da SDK
$maxipago = new MaxipagoClient($merchant, Environment::sandbox());

$sale = (new Sale())->setProcessorID(1)->setReferenceNum("IdPedidoNaLoja")
    ->setFraudCheck(false)->setIpAddress("189.38.95.95")
    ->setCustomerIdExt('123.456.789-09');

$customer = $sale->billingCustomer()->setName("Fulano da Silva")->setAddress("Rua das Fiandeiras, 123")
    ->setDistrict("Pinheiros")->setCity("Sao Paulo")->setState("SP")
    ->setPostalcode("04545002")->setCountry("BR")->setPhone("11999991234")
    ->setEmail("fulano@gmail.com");

$sale->setShipping($customer);

// Crie um bloco de pagamento
$paytype = $sale->transactionDetail()->payType();
$paytype->creditCard()->setNumber("4242424242424242")
    ->setExpMonth("12")->setExpYear("2022")->setCvvNumber("123");

// Por último, crie um bloco Payment e configure o valor da transação.
$sale->payment()->setSoftDescriptor("IDnaFatura")->setChargeTotal(99.90)->creditInstallments(2);

try {
    $transactionResponse = $maxipago->transaction($sale);
    
    $orderId = $transactionResponse->getOrderID(); // 0A0104A3:9E1F7F0167FC:183B:84054E62
    $responseCode = $transactionResponse->getResponseCode(); //estado da transação
} catch (TransactionException $e) {
    $error = $e->getMessage();
}
```
_Note que os parâmetros são os mesmos da chamada Auth. Foi trocado apenas o objeto principal._

#### Transação autenticada por 3DS
_3DS ou 3D Secure é o tipo de transação em que o cliente é redirecionado para o ambiente de seu banco para validar a 
transação com sua senha pessoal. É obrigatório utilizar este tipo de transação para cartões de **débito**.
Dependendo do negócio, você também pode adicionar este bloco para cartões de crédito._

_Você será responsável por redirecionar o usuário. A API e este SDK retornam apenas a URL._

```php
<?php
require 'vendor/autoload.php';

use Filipegar\Maxipago\Merchant;
use Filipegar\Maxipago\Gateway\Environment;
use Filipegar\Maxipago\Gateway\MaxipagoClient;
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities\Authentication;
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Sale;
use Filipegar\Maxipago\Gateway\Exceptions\TransactionException;

//Configure suas credenciais - StoreID e token
$merchant = new Merchant("store-id", "token");
//Crie seu cliente da SDK
$maxipago = new MaxipagoClient($merchant, Environment::sandbox());

$sale = (new Sale())->setProcessorID(1)->setReferenceNum("IdPedidoNaLoja")
    ->setFraudCheck(false)->setIpAddress("189.38.95.95")
    ->setCustomerIdExt('123.456.789-09');

$customer = $sale->billingCustomer()->setName("Fulano da Silva")->setAddress("Rua das Fiandeiras, 123")
    ->setDistrict("Pinheiros")->setCity("Sao Paulo")->setState("SP")
    ->setPostalcode("04545002")->setCountry("BR")->setPhone("11999991234")
    ->setEmail("fulano@gmail.com");

// Crie outro cliente para os dados de envio ou use o mesmo cliente que o criado no billing.
$sale->setShipping($customer);

// Crie um bloco de pagamento
$paytype = $sale->transactionDetail()->payType();
$paytype->debitCard()->setNumber("4000000000000002")
    ->setExpMonth("12")->setExpYear("2022")->setCvvNumber("123");

// Inclua o bloco Authentication e informe o MPI e o que o gateway deve fazer caso a autenticação falhe.
$sale->authentication()->setMpiProcessorId(41)->setOnFailure(Authentication::CONTINUE);

$sale->payment()->setSoftDescriptor("IDnaFatura")->setChargeTotal(99.90)->creditInstallments(2);

try {
    $transactionResponse = $maxipago->transaction($sale);
    
    $orderId = $transactionResponse->getOrderID(); // 0A0104A3:9E1F7F0167FC:183B:84054E62
    $responseCode = $transactionResponse->getResponseCode(); //estado da transação
    $responseString = $transactionResponse->getResponseMessage(); //ENROLLED
    
    // Redirecione o cliente para a URL
    $url = $transactionResponse->getAuthenticationURL();//https://testauthentication.maxipago.net/redirection_service/auth?ref=xxx
} catch (TransactionException $e) {
    $error = $e->getMessage();
}
```

#### Transação Zero Dollar - confirmação de cartão

```php
<?php
require 'vendor/autoload.php';

use Filipegar\Maxipago\Merchant;
use Filipegar\Maxipago\Gateway\Environment;
use Filipegar\Maxipago\Gateway\MaxipagoClient;
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\ZeroDollar;
use Filipegar\Maxipago\Gateway\Exceptions\TransactionException;

// Configure suas credenciais - StoreID e token
$merchant = new Merchant("store-id", "token");
// Crie seu cliente da SDK
$maxipago = new MaxipagoClient($merchant, Environment::sandbox());

// Crie a instância de ZeroDollar
$sale = (new ZeroDollar())->setProcessorID(1)->setReferenceNum("PedidoXPTO");

// Informe os dados do cartão de crédito
$paytype = $sale->transactionDetail()->payType();
$paytype->creditCard()->setNumber("4111111111111111")->setCvvNumber("123")
    ->setExpMonth("12")->setExpYear("2022");

// O valor da cobrança é zero.
$sale->payment()->setSoftDescriptor("ValidacaoXPTO")->setChargeTotal(0);
try {
    $transactionResponse = $maxipago->transaction($sale);

    $responseCode = $transactionResponse->getResponseCode(); //estado da transação
    $responseString = $transactionResponse->getResponseMessage(); //VERIFIED
} catch (TransactionException $e) {
    $error = $e->getMessage();
}
```

#### Cancelamento de captura

Pode ser feito até as 23h59 do dia da captura.

```php
<?php
require 'vendor/autoload.php';

use Filipegar\Maxipago\Merchant;
use Filipegar\Maxipago\Gateway\Environment;
use Filipegar\Maxipago\Gateway\MaxipagoClient;
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\VoidCapture;
use Filipegar\Maxipago\Gateway\Exceptions\TransactionException;

//Configure suas credenciais - StoreID e token
$merchant = new Merchant("store-id", "token");
//Crie seu cliente da SDK
$maxipago = new MaxipagoClient($merchant, Environment::sandbox());

$sale = (new VoidCapture())->setTransactionID('1234567');
try {
    $transactionResponse = $maxipago->transaction($sale);

    $responseCode = $transactionResponse->getResponseCode(); //estado da transação
    $responseString = $transactionResponse->getResponseMessage(); //VOIDED
} catch (TransactionException $e) {
    $error = $e->getMessage();
}
```

#### Estorno de venda

Feito quando a transação está capturada. O prazo depende da adquirente e ramo do negócio
 e pode ser feito de forma parcial ou total.

```php
<?php
require 'vendor/autoload.php';

use Filipegar\Maxipago\Merchant;
use Filipegar\Maxipago\Gateway\Environment;
use Filipegar\Maxipago\Gateway\MaxipagoClient;
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\ReturnSale;
use Filipegar\Maxipago\Gateway\Exceptions\TransactionException;

//Configure suas credenciais - StoreID e token
$merchant = new Merchant("store-id", "token");
//Crie seu cliente da SDK
$maxipago = new MaxipagoClient($merchant, Environment::sandbox());

$sale = (new ReturnSale())->setOrderID("0A0104A3:0167ED56C6B3:52A3:696256F6")
    ->setReferenceNum("Cancel 2322");

// Total do cancelamento
$sale->payment()->setChargeTotal(99.9);
try {
    $transactionResponse = $maxipago->transaction($sale);

    $responseCode = $transactionResponse->getResponseCode(); //estado da transação
    $responseString = $transactionResponse->getResponseMessage(); //CAPTURED
} catch (TransactionException $e) {
    $error = $e->getMessage();
}
```

#### Salvar cartão (tokenização) durante a venda

O MaxiPago! permite salvar cartões à um Consumer durante o processo de uma transação normal.

Pode ser aplicado às transações Auth ou Sale e é definido pelo método ```$sale->saveOnFile()```.
Note que o Consumer precisará existir antes de enviar a transação.
```php
<?php
require 'vendor/autoload.php';

use Filipegar\Maxipago\Merchant;
use Filipegar\Maxipago\Gateway\Environment;
use Filipegar\Maxipago\Gateway\MaxipagoClient;
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities\SaveOnFile;
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Sale;
use Filipegar\Maxipago\Gateway\Exceptions\TransactionException;

//Configure suas credenciais - StoreID e token
$merchant = new Merchant("store-id", "token");
//Crie seu cliente da SDK
$maxipago = new MaxipagoClient($merchant, Environment::sandbox());

$sale = (new Sale())->setProcessorID(1)->setReferenceNum("IdPedidoNaLoja")
    ->setFraudCheck(false)->setIpAddress("189.38.95.95")
    ->setCustomerIdExt('123.456.789-09');

$customer = $sale->billingCustomer()->setName("Fulano da Silva")->setAddress("Rua das Fiandeiras, 123")
    ->setDistrict("Pinheiros")->setCity("Sao Paulo")->setState("SP")
    ->setPostalcode("04545002")->setCountry("BR")->setPhone("11999991234")
    ->setEmail("fulano@gmail.com");

$sale->setShipping($customer);

// Crie um bloco de pagamento
$paytype = $sale->transactionDetail()->payType();
$paytype->creditCard()->setNumber("4242424242424242")
    ->setExpMonth("12")->setExpYear("2022")->setCvvNumber("123");

// Crie um bloco Payment e configure o valor da transação.
$sale->payment()->setSoftDescriptor("IDnaFatura")->setChargeTotal(99.90)->creditInstallments(2);

// Configure os detalhes do cartão armazenado
$sale->saveOnFile()->setCustomerToken('123456')->setOnFileEndDate((new \DateTime())->setDate(2019, 12, 31))
            ->setOnFilePermissions(SaveOnFile::PERMISSION_ONGOING)->setOnFileComment("Visa 4242")->setOnFileMaxChargeAmount(999999.99);

try {
    $transactionResponse = $maxipago->transaction($sale);
    
    $orderId = $transactionResponse->getOrderID(); // 0A0104A3:9E1F7F0167FC:183B:84054E62
    $responseCode = $transactionResponse->getResponseCode(); //estado da transação
} catch (TransactionException $e) {
    $error = $e->getMessage();
}
```

#### Pagamento Recorrente

No pagamento recorrente o cartão é automaticamente armazenado e será cobrado automaticamente conforme o agendamento criado.

Pode ser aplicado às transações Auth ou Sale e é definido pelo método ```$sale->recurring()```.
```php
<?php
require 'vendor/autoload.php';

use Filipegar\Maxipago\Merchant;
use Filipegar\Maxipago\Gateway\Environment;
use Filipegar\Maxipago\Gateway\MaxipagoClient;
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Entities\SaveOnFile;
use Filipegar\Maxipago\Gateway\Operations\Transaction\Order\Sale;
use Filipegar\Maxipago\Gateway\Exceptions\TransactionException;

//Configure suas credenciais - StoreID e token
$merchant = new Merchant("store-id", "token");
//Crie seu cliente da SDK
$maxipago = new MaxipagoClient($merchant, Environment::sandbox());

$sale = (new RecurringPayment())->setProcessorID(1)->setReferenceNum("IdPedidoNaLoja")
    ->setIpAddress("189.38.95.95")
    ->setCustomerIdExt('123.456.789-09');

$customer = $sale->billingCustomer()->setName("Fulano da Silva")->setAddress("Rua das Fiandeiras, 123")
    ->setDistrict("Pinheiros")->setCity("Sao Paulo")->setState("SP")
    ->setPostalcode("04545002")->setCountry("BR")->setPhone("11999991234")
    ->setEmail("fulano@gmail.com");

$sale->setShipping($customer);

// Crie um bloco de pagamento
$paytype = $sale->transactionDetail()->payType();
$paytype->creditCard()->setNumber("4242424242424242")
    ->setExpMonth("12")->setExpYear("2022")->setCvvNumber("123");

// Configure os detalhes do pagamento recorrente
$sale->recurring()->setAction("new")->setPeriod('monthly')
    ->setStartDate((new \DateTime())->setDate(2019, 01, 30))
    ->setFrequency(1)->setInstallments(12)->setFailureThreshold(2)
    ->setFirstAmount(49.90); // funciona para primeira cobrança pro-rata.

// Por último, crie um bloco Payment e configure o valor da transação.
$sale->payment()->setSoftDescriptor("IDnaFatura")->setChargeTotal(99.90)->creditInstallments(2);

try {
    $transactionResponse = $maxipago->transaction($sale);
    
    $orderId = $transactionResponse->getOrderID(); // 0A0104A3:9E1F7F0167FC:183B:84054E62
    $responseCode = $transactionResponse->getResponseCode(); //estado da transação
} catch (TransactionException $e) {
    $error = $e->getMessage();
}
```

## Cadastros

As requisições de cadastro permitem incluir "Consumers", que são clientes que recebem
cartões tokenizados ou operações de pagamento recorrente.

#### Adicionando, editando e removendo um Consumer

```php
<?php
require 'vendor/autoload.php';

use Filipegar\Maxipago\Merchant;
use Filipegar\Maxipago\Gateway\Environment;
use Filipegar\Maxipago\Gateway\MaxipagoClient;
use Filipegar\Maxipago\Gateway\Operations\Registration\AddConsumer;
use Filipegar\Maxipago\Gateway\Operations\Registration\DeleteConsumer;
use Filipegar\Maxipago\Gateway\Operations\Registration\UpdateConsumer;
use Filipegar\Maxipago\Gateway\Operations\Registration\Entities\Consumer;

//Configure suas credenciais - StoreID e token
$merchant = new Merchant("store-id", "token");
//Crie seu cliente da SDK
$maxipago = new MaxipagoClient($merchant, Environment::sandbox());

$consumer = new AddConsumer();
$consumer->consumer()->setFirstName("JOHN")->setLastName("DOE")
    ->setAddress1("Rua das Fianderias, 333")->setAddress2("Pinheiros")->setCity("São Paulo")
    ->setState("SP")->setZip("04545002")->setCountry("BR")->setPhone("5511999999999")
    ->setEmail("fulanosilva@gmail.com")->setDob((new \DateTime())->setDate(1994, 04, 02))
    ->setSex(Consumer::SEX_MALE)->setCustomField1("12345678909")->setCustomerIdExt(time()."12345678909");

$apiResult = $maxipago->registration($consumer);//retorna Filipegar\Maxipago\Gateway\Responses\RegistrationResponse;
$idDoConsumer = $apiResult->getCustomerId(); //281001

//Para atualizar um cadastro
$consumer = new UpdateConsumer();
$consumer->consumer($idDoConsumer)->setCustomerIdExt("12345678909".time())->setFirstName("FULANO");
$apiResult = $maxipago->registration($consumer);

//E para remover um cadastro
$consumer = new DeleteConsumer();
$consumer->consumer($idDoConsumer);
$apiResult = $maxipago->registration($consumer);
```

#### Adicionando e removendo um cartão tokenizado

```php
<?php
require 'vendor/autoload.php';

use Filipegar\Maxipago\Merchant;
use Filipegar\Maxipago\Gateway\Environment;
use Filipegar\Maxipago\Gateway\MaxipagoClient;
use Filipegar\Maxipago\Gateway\Operations\Registration\AddCardOnFile;
use Filipegar\Maxipago\Gateway\Operations\Registration\DeleteCardOnFile;
use Filipegar\Maxipago\Gateway\Operations\Registration\Entities\CardOnFile;

//Configure suas credenciais - StoreID e token
$merchant = new Merchant("store-id", "token");
//Crie seu cliente da SDK
$maxipago = new MaxipagoClient($merchant, Environment::sandbox());
$consumer = new AddCardOnFile();
        
$consumer->cardOnFile("123456"/*id do consumer*/)->setBillingName("FULANO S SAURO")
    ->setBillingAddress1("Rua das Fianderias, 333")->setBillingAddress2("Pinheiros")->setBillingCity("Sao Paulo")
    ->setBillingState("SP")->setBillingZip("04545002")->setBillingCountry("BR")->setBillingPhone("5511988887777")
    ->setOnFilePermissions(CardOnFile::PERMISSION_ONGOING)->setOnFileMaxChargeAmount(99999.99)
    ->setCreditCardNumber("4242424242424242")->setExpirationMonth("05")->setExpirationYear("2020");
               
$apiResult = $maxipago->registration($consumer);//retorna Filipegar\Maxipago\Gateway\Responses\RegistrationResponse;
$idDoConsumer = $apiResult->getToken(); //HwOAk0k87k0=

//E para remover um cartão
$consumer = new DeleteCardOnFile();
$consumer->cardOnFile("123456", "HwOAk0k87k0=");
$apiResult = $maxipago->registration($consumer);
```

#### Modificando e deletando um pagamento recorente

```php
<?php
require 'vendor/autoload.php';

use Filipegar\Maxipago\Merchant;
use Filipegar\Maxipago\Gateway\Environment;
use Filipegar\Maxipago\Gateway\MaxipagoClient;
use Filipegar\Maxipago\Gateway\Operations\Registration\CancelRecurringPayment;
use Filipegar\Maxipago\Gateway\Operations\Registration\ModifyRecurringPayment;

//Configure suas credenciais - StoreID e token
$merchant = new Merchant("store-id", "token");
//Crie seu cliente da SDK
$maxipago = new MaxipagoClient($merchant, Environment::sandbox());

$recurringChange = new ModifyRecurringPayment();
$change = $recurringChange->changeRecurring()->setOrderID(""/*ORDER ID*/);
$change->paymentInfo()->setChargeTotal(99.90)->cardInfo()->setSoftDescriptor("IDdoPEDIDO")
    ->setCreditCardNumber("4242424242424242")->setExpirationMonth(2)->setExpirationYear(2023);
$change->recurring()->setProcessorID(1)->setInstallments(12)->setFireDay(1)
    ->setPeriod("biMonthly")->setNextFireDate((new \DateTime())->setDate(2019, 01, 02));

$cust = $change->billingInfo()->setName("JOHN DOE")
    ->setAddress1("Rua das Palmeiras, 1")->setAddress2("")->setCity("São Paulo")
    ->setState("SP")->setZip("01412002")->setCountry("BR")->setPhone("55111121212");

$apiResult = $maxipago->registration($recurringChange);//retorna Filipegar\Maxipago\Gateway\Responses\RegistrationResponse;

//E para cancelar o pagamento recorrente
$sale = new CancelRecurringPayment();
$sale->changeRecurring()->setOrderID("" /*ORDER ID*/);
$apiResult = $maxipago->registration($sale);
```

## Consultas - ReportAPI

A ReportAPI permite que você faça buscas na base de dados do MaxiPago! e encontre o estado atual das transações.

Recomendo que você leia [este link](http://developers.maxipago.com/wp-content/uploads/2017/11/manual-gateway-consulta.pdf) para entender
tudo que é possível fazer com a API.
Este SDK transforma em objeto todos os campos retornos para fácil acesso aos dados.

Em casos raros, a API retorna um token de requisição para processar sua busca mais tarde.
```php
<?php
require 'vendor/autoload.php';

use Filipegar\Maxipago\Merchant;
use Filipegar\Maxipago\Gateway\Environment;
use Filipegar\Maxipago\Gateway\MaxipagoClient;
use Filipegar\Maxipago\Gateway\Operations\Report\CheckRequestStatus;
use Filipegar\Maxipago\Gateway\Operations\Report\TransactionDetailReport;

//Configure suas credenciais - StoreID e token
$merchant = new Merchant("store-id", "token");
//Crie seu cliente da SDK
$maxipago = new MaxipagoClient($merchant, Environment::sandbox());
$report = new TransactionDetailReport();
$report->filterOptions()//->setOrderId("")
    ->setPeriod("range")
    ->setStartDate((new \DateTime())->setDate(2018, 12, 01))
    ->setEndDate((new \DateTime())->setDate(2018, 12, 31))
    ->setOrderByName('status')->setOrderByDirection('asc');

$apiResponse = $maxipago->report($report);
$apiResponse->getTotalNumberOfRecords(); //25
$apiResponse->getRecords(); //array com o resultado.

//Para acessar resultados paginados
$report = new TransactionDetailReport();
$report->filterOptions()->setPageToken("temp1546145970000.1")->setPageNumber(5);
$novoResultado = $maxipago->report($report)->getRecords();

//Para pesquisas pesadas, pode ser que o gateway não processe naquele momento.
//Nestas situações, você receberá um token para consultar o estado da requisição mais tarde.
$report = (new CheckRequestStatus())->setRequestToken($novoResultado->getRequestToken());
$maxipago->report($report);
```
