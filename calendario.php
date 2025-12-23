<?php

session_start();
require __DIR__ . '/vendor/autoload.php';


include __DIR__ . '/includes/header.php';?>

        <link href='fullcalendar/css/core/main.min.css' rel='stylesheet'/>
        <link href='fullcalendar/css/daygrid/main.min.css' rel='stylesheet'/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="fullcalendar/css/personalizado.css">

        <script src='fullcalendar/js/core/main.min.js'></script>
        <script src='fullcalendar/js/interaction/main.min.js'></script>
        <script src='fullcalendar/js/daygrid/main.min.js'></script>
        <script src='fullcalendar/js/core/locales/pt-br.js'></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="fullcalendar/js/personalizado.js"></script>
</head>


<?php
include __DIR__ . '/fullcalendar/index.php';
include __DIR__ . '/includes/footer.php';
