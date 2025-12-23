<div class="p-4">

<div class="meu-hr">
                <h4 class="fw-bolder pb-4" style="color: #2023B6"> <?=TITILE?> </h4> <hr class="meu-hr">
        </div>
    

    <div class="row">
        <div class="col-lg-12">
            <div class="card rounded-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body">
                            <form class="row g-3 px-3" method="POST">

                                <div class="col-md-3 input-group-sm">
                                    <label for="inputTipo" class="col-form-label col-form-label-sm"> Tipo de Cliente </label>
                                    <select id="inputTipo" name="inputTipo" class="form-select form-select-sm opacity-75 rounded-pill">
                                    <?php if(!isset($obCliente->clt_tipo)) { ?>  
                                        <option> Escolha o tipo de Cliente </option>
                                        <option value="PF"> Pessoa Física </option>
                                        <option value="PJ"> Pessoa Jurídica </option>
                                        <?php } else { ?> 
                                            <option value="<?=$obCliente->clt_tipo?>"> <?=$obCliente->clt_tipo?> </option> 
                                            <option value="PF"> Pessoa Física </option>
                                            <option value="PJ"> Pessoa Jurídica </option>
                                        <?php }?>
                                    </select>
                                </div>

                                <div class="col-md-3 input-group-sm">
                                    <label for="inputNomeC" class="col-form-label col-form-label-sm"> Nome do Cliente </label>
                                    <input type="text" <?php if(!isset($obCliente->clt_nome)) { ?> value="" <?php } else { ?> value="<?=$obCliente->clt_nome?>" <?php }?> class="form-control form-control-sm opacity-75 rounded-pill" id="inputNomeC" name="inputNomeC" placeholder="Nome completo">
                                </div>

                                <div class="col-md-3 input-group-sm">
                                    <label for="inputNomeE" class="col-form-label col-form-label-sm"> Nome da Empresa </label>
                                    <input type="text" <?php if(!isset($obCliente->clt_empresa)) { ?> value="" <?php } else { ?> value="<?=$obCliente->clt_empresa?>" <?php }?> class="form-control form-control-sm opacity-75 rounded-pill" id="inputNomeE" name="inputNomeE" placeholder="Nome da Empresa">
                                </div>

                                <div class="col-md-3 input-group-sm">
                                    <label for="inputEmail" class="col-form-label col-form-label-sm"> Email </label>
                                    <input type="email" <?php if(!isset($obCliente->clt_email)) { ?> value="" <?php } else { ?> value="<?=$obCliente->clt_email?>" <?php }?> class="form-control form-control-sm opacity-75 rounded-pill" id="inputEmail" name="inputEmail" placeholder="Email">
                                </div>

                                <div class="col-md-4 input-group-sm">
                                    <label for="inputCPF" class="col-form-label col-form-label-sm"> CPF </label>
                                    <input type="text" <?php if(!isset($obCliente->clt_CPF)) { ?> value="" <?php } else { ?> value="<?=$obCliente->clt_CPF?>" <?php }?> class="form-control form-control-sm opacity-75 rounded-pill" id="inputCPF" name="inputCPF" placeholder="CPF">
                                </div>

                                <div class="col-md-4 input-group-sm">
                                    <label for="inputCNPJ" class="col-form-label col-form-label-sm"> CNPJ </label>
                                    <input type="text" <?php if(!isset($obCliente->clt_CNPJ)) { ?> value="" <?php } else { ?> value="<?=$obCliente->clt_CNPJ?>" <?php }?> class="form-control form-control-sm opacity-75 rounded-pill" id="inputCNPJ" name="inputCNPJ" placeholder="CNPJ">
                                </div>

                                <div class="col-md-4 input-group-sm">
                                    <label for="inputTelefone" class="col-form-label col-form-label-sm"> Telefone </label>
                                    <input type="text" <?php if(!isset($obCliente->clt_telefone)) { ?> value="" <?php } else { ?> value="<?=$obCliente->clt_telefone?>" <?php }?> class="form-control form-control-sm opacity-75 rounded-pill" id="inputTelefone" name="inputTelefone" placeholder="Telefone">
                                </div>

                                <div class="col-md-3 input-group-sm">
                                    <label for="inputCEP" class="col-form-label col-form-label-sm"> CEP </label>
                                    <input type="text" <?php if(!isset($obEndereco->end_CEP)) { ?> value="" <?php } else { ?> value="<?=$obEndereco->end_CEP?>" <?php }?> class="form-control form-control-sm opacity-75 rounded-pill" id="inputCEP" name="inputCEP" placeholder="CEP">
                                </div>

                                <div class="col-md-3 input-group-sm">
                                    <label for="inputCidade" class="col-form-label col-form-label-sm"> Cidade </label>
                                    <select id="inputCidade" name="inputCidade" class="form-select form-select-sm opacity-75 rounded-pill">
                                        <option selected> Escolha uma Cidade </option>
                                        <option>...</option>
                                    </select>
                                </div>

                                <div class="col-md-3 input-group-sm">
                                    <label for="inputEstado" class="col-form-label col-form-label-sm"> Estado </label>
                                    <select id="inputEstado" name="inputEstado" class="form-select form-select-sm  opacity-75 rounded-pill">
                                        <option selected> Escolha um estado </option>
                                        <option>...</option>
                                    </select>
                                </div>

                                <div class="col-md-3 input-group-sm">
                                    <label for="inputBairro" class="col-form-label col-form-label-sm"> Bairro </label>
                                    <input type="text" <?php if(!isset($obEndereco->end_bairro)) { ?> value="" <?php } else { ?> value="<?=$obEndereco->end_bairro?>" <?php }?> class="form-control form-control-sm opacity-75 rounded-pill" id="inputBairro" name="inputBairro" placeholder="Bairro">
                                </div>

                                <div class="col-md-4 input-group-sm">
                                    <label for="inputRua" class="col-form-label col-form-label-sm"> Rua </label>
                                    <input type="text" <?php if(!isset($obEndereco->end_rua)) { ?> value="" <?php } else { ?> value="<?=$obEndereco->end_rua?>" <?php }?> class="form-control form-control-sm opacity-75 rounded-pill" id="inputRua" name="inputRua" placeholder="Rua">
                                </div>

                                <div class="col-md-4 input-group-sm">
                                    <label for="inputNumero" class="col-form-label col-form-label-sm"> Número </label>
                                    <input type="text" <?php if(!isset($obEndereco->end_numero)) { ?> value="" <?php } else { ?> value="<?=$obEndereco->end_numero?>" <?php }?> class="form-control form-control-sm opacity-75 rounded-pill" id="inputNumero" name="inputNumero" placeholder="Número">
                                </div>

                                <div class="col-md-4 input-group-sm">
                                    <label for="inputComplemento" class="col-form-label col-form-label-sm"> Complemento </label>
                                    <input type="text" <?php if(!isset($obEndereco->end_complemento)) { ?> value="" <?php } else { ?> value="<?=$obEndereco->end_complemento?>" <?php }?> class="form-control form-control-sm opacity-75 rounded-pill" id="inputComplemento" name="inputComplemento" placeholder="Complemento">
                                </div>

                                <div class="col-12 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-sm btn-outline-azul rounded-pill" name="submitProjeto" > <?=BUTTON?> </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div> <!-- /.row -->
            </div>
        </div><!-- /# column -->
    </div>


<!-- .animated -->
</div>
        