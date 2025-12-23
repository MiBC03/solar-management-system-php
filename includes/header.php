<!doctype html>
<html lang="en">

<head>
    <title> Norte Sol </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="images/painel-solar.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <style>
        .meu-hr {
            width: 50%;
            display: flex;
            align-items: center;
        }

        .meu-hr hr {
            flex: 1;
            border-color: #2023B6;
            margin-left: .5em;
        }

        .btn-outline-azul {
            border-color: #2023B6;
            color: #2023B6;
        }

        .btn-outline-azul:hover {
            color: #fff;
            border-color: #2023B6;
            background-color: #2023B6;
        }
    </style>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar" class="active bg-dark">
            <h1><a href="index.php" class="logo"><span class="bx bxs-sun"></span></a></h1>
            <ul class="list-unstyled components mb-5">
                <li class="nav-item">
                    <a href="index.php" class="nav-link py-3">
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

                    <img src="images/Ns_logo.png" width="150px">

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