<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Cliente;

//Validação do id
if(!isset($_GET['clt_codigo']) or !is_numeric($_GET['clt_codigo'])) {
    header('location: index.php?status=error');
    exit;
}

//Consulta Vaga
$obCliente = Cliente::getCliente($_GET['clt_codigo']);

//Validação do produto
if(!$obCliente instanceof Cliente) {
    header('location: index.php?status=error');
    exit;
}

// VALIDAÇÃO DO POST 

if(isset($_POST['excluir'])){

    $obCliente->Excluir();

    header('location: index.php?status=success');
    exit;

    //echo "<pre>"; print_r($obProduto); echo "</pre>"; exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirmar-exclusao.php';
include __DIR__.'/includes/footer.php';