<?php session_start()?>

<!doctype html>
<html lang="en">

<head>
    <title> Norte Sol </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../images/painel-solar.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">

    <link href='css/core/main.min.css' rel='stylesheet' />
    <link href='css/daygrid/main.min.css' rel='stylesheet' />

    <script src='js/core/main.min.js'></script>
    <script src='js/interaction/main.min.js'></script>
    <script src='js/daygrid/main.min.js'></script>
    <script src='js/core/locales/pt-br.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="js/personalizado.js"></script>
</head>

<body>

<style>
    #calendar {
    max-width: 900px;
    margin: 0 auto;
}
.visevent{
    display: block;
}
.formedit{
    display: none;
}
</style>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar" class="active bg-dark">
            <h1><a href="../index.php" class="logo"><span class="bx bxs-sun"></span></a></h1>
            <ul class="list-unstyled components mb-5">
                <li class="nav-item">
                    <a href="../index.php" class="nav-link py-3">
                        <span class="bx bxs-home"></span> Início </a>
                </li>
                <li class="nav-item">
                    <a href="fullcalendar/teste.php" class="nav-link py-3">
                        <span class="bx bxs-calendar"></span> Agenda </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link py-3">
                        <span class="bx bxs-dashboard"></span> Gráficos </a>
                </li>
                <li class="nav-item">
                    <a href="cadastrarClt.php" class="nav-link py-3">
                        <span class="bx bxs-user"></span> Clientes </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link py-3">
                        <span class="bx bxs-plug"></span> Módulos </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link py-3">
                        <span class="bx bxs-car-battery"></span> Inversores </a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-white">
                <div class="container-fluid">

                    <img src="../images/Ns_logo.png" width="150px">

                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="bx bx-list-ul"></i>
                    </button>

                    <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">

                        <ul class="navbar-nav ml-auto mb-sm-0 mx-3">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdown03">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form>
                            <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                        </form>

                    </div>
                </div>
            </nav>

            <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
<div>
<div id='calendar' class="bg-white"></div>
</div>

            <div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detalhes do Evento</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="visevent">
                                <dl class="row">
                                    <dt class="col-sm-3">ID do evento</dt>
                                    <dd class="col-sm-9" id="id"></dd>

                                    <dt class="col-sm-3">Título do evento</dt>
                                    <dd class="col-sm-9" id="title"></dd>

                                    <dt class="col-sm-3">Início do evento</dt>
                                    <dd class="col-sm-9" id="start"></dd>

                                    <dt class="col-sm-3">Fim do evento</dt>
                                    <dd class="col-sm-9" id="end"></dd>
                                </dl>
                                <button class="btn btn-warning btn-canc-vis">Editar</button>
                                <a href="proc_apagar_evento.php" id="apagar_evento" class="btn btn-danger">Apagar</a>
                            </div>
                            <div class="formedit">
                                <span id="msg-edit"></span>
                                <form id="editevent" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" id="id">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Título</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title" class="form-control" id="title" placeholder="Título do evento">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Color</label>
                                        <div class="col-sm-10">
                                            <select name="color" class="form-control" id="color">
                                                <option value="">Selecione</option>
                                                <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                                                <option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
                                                <option style="color:#FF4500;" value="#FF4500">Laranja</option>
                                                <option style="color:#8B4513;" value="#8B4513">Marrom</option>
                                                <option style="color:#1C1C1C;" value="#1C1C1C">Preto</option>
                                                <option style="color:#436EEE;" value="#436EEE">Royal Blue</option>
                                                <option style="color:#A020F0;" value="#A020F0">Roxo</option>
                                                <option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
                                                <option style="color:#228B22;" value="#228B22">Verde</option>
                                                <option style="color:#8B0000;" value="#8B0000">Vermelho</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Início do evento</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="start" class="form-control" id="start" onkeypress="DataHora(event, this)">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Final do evento</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="end" class="form-control" id="end" onkeypress="DataHora(event, this)">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="button" class="btn btn-primary btn-canc-edit">Cancelar</button>
                                            <button type="submit" name="CadEvent" id="CadEvent" value="CadEvent" class="btn btn-warning">Salvar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Cadastrar Evento</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <span id="msg-cad"></span>
                            <form id="addevent" method="POST" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Título</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="title" class="form-control" id="title" placeholder="Título do evento">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Color</label>
                                    <div class="col-sm-10">
                                        <select name="color" class="form-control" id="color">
                                            <option value="">Selecione</option>
                                            <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                                            <option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
                                            <option style="color:#FF4500;" value="#FF4500">Laranja</option>
                                            <option style="color:#8B4513;" value="#8B4513">Marrom</option>
                                            <option style="color:#1C1C1C;" value="#1C1C1C">Preto</option>
                                            <option style="color:#436EEE;" value="#436EEE">Royal Blue</option>
                                            <option style="color:#A020F0;" value="#A020F0">Roxo</option>
                                            <option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
                                            <option style="color:#228B22;" value="#228B22">Verde</option>
                                            <option style="color:#8B0000;" value="#8B0000">Vermelho</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Início do evento</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="start" class="form-control" id="start" onkeypress="DataHora(event, this)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Final do evento</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="end" class="form-control" id="end" onkeypress="DataHora(event, this)">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" name="CadEvent" id="CadEvent" value="CadEvent" class="btn btn-success">Cadastrar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/sidebars.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>