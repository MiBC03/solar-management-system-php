<?php

require __DIR__.'/vendor/autoload.php';

define('TITILE', 'Editar Cliente');
define('BUTTON', 'Atualizar');

use \App\Entity\Cliente;

//Validação do id
if(!isset($_GET['clt_codigo']) or !is_numeric($_GET['clt_codigo'])) {
    header('location: index.php?status=error');
    exit;
}

//Consulta Vaga
$obCliente = Cliente::getCliente($_GET['clt_codigo']);
$obEndereco = Cliente::getEndereco($_GET['clt_codigo']);

//echo "<pre>"; print_r($obCliente); echo "</pre>"; exit;

//Validação do produto
if(!$obCliente instanceof Cliente) {
    header('location: index.php?status=error');
    exit;
}

// VALIDAÇÃO DO POST 

if(isset($_POST['inputNomeC'], $_POST['inputEmail'], $_POST['inputCPF'], $_POST['inputTelefone'])) {

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

    $obCliente->Atualizar();

    header('location: index.php?status=success');
    exit;

    //echo "<pre>"; print_r($obProduto); echo "</pre>"; exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formClt.php';
include __DIR__.'/includes/footer.php';