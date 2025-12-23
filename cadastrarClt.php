<?php

require __DIR__ . '/vendor/autoload.php';

define('TITILE', 'Cadastar Cliente');
define('BUTTON', 'Cadastrar');

use App\Entity\Cliente;

// VALIDAÇÃO DO POST 

if (isset($_POST['inputNomeC'], $_POST['inputEmail'], $_POST['inputCPF'], $_POST['inputTelefone'])) {
    $obCliente = new Cliente();
    $obCliente->clt_nome = $_POST['inputNomeC'];
    $obCliente->clt_email = $_POST['inputEmail'];
    $obCliente->clt_CPF = $_POST['inputCPF'];
    $obCliente->clt_telefone = $_POST['inputTelefone'];
    $obCliente->clt_tipo = $_POST['inputTipo'];
    $obCliente->clt_CNPJ = $_POST['inputCNPJ'];
    $obCliente->clt_empresa = $_POST['inputNomeE'];

    $obCliente->end_estado = $_POST['inputEstado'];
    $obCliente->end_cidade = $_POST['inputCidade'];
    $obCliente->end_rua = $_POST['inputRua'];
    $obCliente->end_CEP = $_POST['inputCEP'];
    $obCliente->end_bairro = $_POST['inputBairro'];
    $obCliente->end_numero = $_POST['inputNumero'];
    $obCliente->end_complemento = $_POST['inputComplemento'];

    $obCliente->Cadastrar();

    header('location: index.php?status=success');
    exit;

    //echo "<pre>"; print_r($obProduto); echo "</pre>"; exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formClt.php';
include __DIR__ . '/includes/footer.php';
