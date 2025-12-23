<!-- Modal -->
<div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Excluir Cliente </h5>
            </div>

            <div class="modal-body">
                <form method="post">
                    <div class="form-group">
                        <p> Você realmente deseja excluir o cliente <strong><?= $obCliente->clt_nome ?></strong>?</p>
                    </div>
            </div>
            <div class="modal-footer">
                    <div class="form-group">
                        <a href="index.php"><button type="button" class="btn btn-success mt-3 btn-sm"> Cancelar </button></a>
                        <button class="btn btn-danger mt-3 btn-sm" name="excluir"> Excluir </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/bootstrap.bundle.js"></script>

<script>
    let elemento = document.getElementById("myModal");
    let modal = new bootstrap.Modal(elemento);
    modal.show();
</script>

<!--<main>
    <h2 class="mt-3"> Excluir Produto </h2>

    <form method="post">

        <div class="form-group">
            <p> Você realmente deseja excluir o cliente <strong><?= $obCliente->clt_nome ?></strong></p>

            <div class="form-group">

            <a href="index.php"><button type="button" class="btn btn-success mt-3"> Cancelar </button></a>

                <button class="btn btn-danger mt-3" name="excluir"> Excluir </button>
            </div>

        </div>
    </form>
</main>