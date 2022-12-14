<?php
    require_once 'assets/php/session.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Ir Donatien">
        <meta http-equiv="x-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width-device-width, initial-scale=1, shrink-to-fit=no">
        <title>DIVINAS |<?=ucfirst(basename($_SERVER['PHP_SELF'],'.php')); ?></title>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <style type="text/css">
            @import url("https://fonts.googleapis.com/css?family=Maven+Pro:400,500,600,700,800,900&display=swap");

            *{
                font-family:'Maven Pro', sans-serif;
                font-size:20px;
            }

            /*FOOTER*/
            .footer{
            background:#303036;
            color:#d3d3d3;
            height: 70px;
            position: relative;
            }

            .footer .footer-botton{
            background:#343a40;
            color:#686868;
            height: 70px;
            width: 100%;
            border:1px solid red;
            text-align:center;
            position:absolute;
            bottom:0px;
            left: 0px;
            padding-top:20px;
            }

        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-md bg-success navbar-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="assets/php/logout.php"><i class="fa fa-female"></i><i class="fa fa-male"></i>&nbsp;DIVINAS</a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link <?=(basename($_SERVER['PHP_SELF'])=="accueil.php")?"active":"";?>" href="accueil.php"><i class="fa fa-home"></i>&nbsp;Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?=(basename($_SERVER['PHP_SELF'])=="frais_document.php")?"active":"";?>" href="frais_document.php"><i class="fas fa-comment"></i>&nbsp;Frais</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?=(basename($_SERVER['PHP_SELF'])=="nouveau_ne.php")?"active":"";?>" href="nouveau_ne.php"><i class="fas fa-baby"></i>&nbsp;Nouveau-n??</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link <?=(basename($_SERVER['PHP_SELF'])=="acte_naissance.php")?"active":"";?>" href="acte_naissance.php"><i class="fas fa-baby"></i><i class="fas fa-baby"></i>&nbsp;Naissance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?=(basename($_SERVER['PHP_SELF'])=="projet_mariage.php")?"active":"";?>" href="projet_mariage.php"><i class="fa fa-calendar"></i>&nbsp;Projet</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link <?=(basename($_SERVER['PHP_SELF'])=="acte_mariage.php")?"active":"";?>" href="acte_mariage.php"><i class="fa fa-female"></i><i class="fa fa-male"></i>&nbsp;Mariage</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link <?=(basename($_SERVER['PHP_SELF'])=="defunt.php")?"active":"";?>" href="defunt.php"><i class="fas fa-user-slash"></i>&nbsp;D??funt</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link <?=(basename($_SERVER['PHP_SELF'])=="acte_deces.php")?"active":"";?>" href="acte_deces.php"><i class="fas fa-user-slash"></i><i class="fas fa-user-slash"></i>&nbsp;D??c??s</a>
                </li> 
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown" href="#">
                        <i class="fas fa-user"></i>&nbsp;Salut !<?=$clogin;?>
                    </a>
                    <div class="dropdown-menu">
                        <a href="assets/php/logout.php" class="dropdown-item"> <i class="fas fa-sign-out-alt"></i>&nbsp;D??connexion</a>
                    </div>
                </li>
                </ul>
            </div> 
        </nav>