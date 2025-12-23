<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Cliente;
use \App\Db\Paginacao;

//Busca
$busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

//Condições Mysql
$condicao = [
 strlen($busca) ? 'clt_nome LIKE "%'. str_replace(' ', '%', $busca).'%"' : null
];

//Where
$where = implode(' AND ', $condicao);

//Order

//Quantidade total de produtos
$quantidadeClientes = Cliente::getQuantidadeClientes($where);

/*echo'<pre>';
print_r($quantidadeProdutos);
echo'</pre>'; exit;
*/

$obPaginacao = new Paginacao($quantidadeClientes, $_GET['pagina'] ?? 1, 5);

$clientes = Cliente::getClientes($where,null,$obPaginacao->getLimite());

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';