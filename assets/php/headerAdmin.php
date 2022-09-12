<?php
    require_once 'assets/php/sessionAd.php';
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
                    <a class="nav-link <?=(basename($_SERVER['PHP_SELF'])=="rapports.php")?"active":"";?>" href="rapports.php"><i class="fa fa-female"></i><i class="fa fa-male"></i>&nbsp;Rapport Mariage</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?=(basename($_SERVER['PHP_SELF'])=="rapport_nouveau_ne.php")?"active":"";?>" href="rapport_nouveau_ne.php"><i class="fas fa-baby"></i>&nbsp;Rapport Nouveau-né</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link <?=(basename($_SERVER['PHP_SELF'])=="rapport_deces.php")?"active":"";?>" href="rapport_deces.php"><i class="fas fa-user-slash"></i><i class="fas fa-user-slash"></i>&nbsp;Rapport Décès</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown" href="#">
                        <i class="fas fa-user"></i>&nbsp;Salut !<?=$adminlogin;?>
                    </a>
                    <div class="dropdown-menu">
                        <a href="assets/php/logout.php" class="dropdown-item"> <i class="fas fa-sign-out-alt"></i>&nbsp;Déconnexion</a>
                    </div>
                </li>
                </ul>
            </div> 
        </nav>
