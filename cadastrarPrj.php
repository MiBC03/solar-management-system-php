<?php

require __DIR__ . '/vendor/autoload.php';

define('TITILE', 'Cadastar vaga');
define('BUTTON', 'Cadastrar');

use App\Entity\Cliente;

// VALIDAÇÃO DO POST 

if (isset($_POST['inputNomeC'], $_POST['inputEmail'], $_POST['inputCPF'], $_POST['inputTelefone'])) {
    $obCliente = new Cliente();
    $obCliente->clt_nome = $_POST['inputNomeC'];
    $obCliente->clt_email = $_POST['inputEmail'];
    $obCliente->clt_CPF = $_POST['inputCPF'];
    $obCliente->clt_telefone = $_POST['inputTelefone'];
    $obCliente->Cadastrar();

    header('location: index.php?status=success');
    exit;

    //echo "<pre>"; print_r($obProduto); echo "</pre>"; exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formClt.php';
include __DIR__ . '/includes/footer.php';
