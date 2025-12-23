<?php
//<td>'.date('d/m/Y à\s H:i:s', strtotime($cliente->data)).'</td>
$mensagem = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'success':
            $mensagem = '<div class="alert alert-success">Ação executada com sucesso</div>';
            unset($_GET['status']);
            break;
        case 'error':
            $mensagem = '<div class="alert alert-danger">Ação não executada</div>';
            unset($_GET['status']);
            break;
    }
};

$resultados = '';

foreach ($clientes as $cliente) {
    $resultados .= '<tr> 
                    <td>' . $cliente->clt_nome . '</td> 
                    <td>' . $cliente->clt_empresa . '</td>
                    <td>' . $cliente->clt_telefone . '</td>
                    <td>' . $cliente->clt_email . '</td>
                    <td>
                        <a href="editar.php?clt_codigo=' . $cliente->clt_codigo . '"> <i class="bx bxs-pencil"></i> </a>
                        <a href="excluir.php?clt_codigo=' . $cliente->clt_codigo . '">
                        <i class="bx bxs-trash"></i>
                        </a>
                    </td> 
                    </tr>';
}

$resultados = strlen($resultados) ? $resultados : '<tr> <td colspan="6" class="text-center"> Nenhum produto encontrado </td> </tr>';

unset($_GET['pagina']);
$gets = http_build_query($_GET);

$paginacao = '';
$paginas = $obPaginacao->getPaginas();
foreach ($paginas as $key => $pagina) {
    $class = $pagina['atual'] ? 'btn-outline-azul' : 'btn-light';
    $paginacao .= '<a href="?pagina=' . $pagina['pagina'] . '&' . $gets . '"><button type="button" class="btn ' . $class . ' btn-sm rounded-pill m-1">' . $pagina['pagina'] . '</button></a>';
}

?>
<div class="p-4">

<?= $mensagem ?>

<h4 class="fw-bold my-4" style="color: #2023B6"> Clientes </h4>

<section>
    <form method="GET">
        <div class="row">

            <div class="col input-group mb-3">
                <span class="input-group-text rounded-end rounded-5" id="basic-addon1"> <i class="bx bx-search"></i> </span>
                <input type="text" name="busca" class="form-control form-control-sm rounded-start rounded-5" placeholder="Buscar Cliente" value="<?= $busca ?>">
            </div>

            <div class="col d-flex align-items-end input-group mb-3">
                <span class="input-group-text rounded-end rounded-5" id="basic-addon1"> <i class="bx bx-list-plus"></i> </span>
                <a href="cadastrarClt.php">
                    <button class="btn btn-white text-secondary btn-sm border border-1 bg-white rounded-start rounded-5" type="button"> Novo Cliente </button>
                </a>
            </div>

        </div>
    </form>
</section>

<div class="row">
    <div class="col-lg-12">
        <div class="card rounded-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body">
                        <main>

                            <section class="bg-light">
                                
                                <table class="table table-striped table-hover table-sm mt-3 bg-white">

                                    <thead class="table-secondary">
                                        <tr class="text-secondary">
                                            <th>NOME</th>
                                            <th>EMPRESA</th>
                                            <th>TELEFONE</th>
                                            <th>EMAIL</th>
                                            <th>AÇÕES</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?= $resultados ?>
                                    </tbody>

                                </table>
                                
                            </section>

                        </main>

                    </div>
                </div>
            </div> <!-- /.row -->
        </div>
    </div><!-- /# column -->
</div>

<center>
<section>
    <?= $paginacao ?>
</section>
</center>


</div>
<!-- .animated -->
</div>