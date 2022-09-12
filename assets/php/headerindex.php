<?php
  session_start();
  require_once 'assets/php/connexion.php';
  if(isset($_SESSION['user'])){
      header('location:accueil.php');
  }
  if(isset($_SESSION['admin'])){
    header('location:rapports.php');
  }
  if(isset($_SESSION['Off'])){
    header('location:rapport_officier.php');
  }
  
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
        <style type="text/css">
            html,body{
                height:100%;
            }
            /*FOOTER*/
            .footer{
            background:#303036;
            color:#d3d3d3;
            height: 70px;
            position: relative;
            }

             /* Make the image fully responsive */
            .carousel-inner {
                width: 100%;
                height: 100%;
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
    <body class="bg-white">

    <nav class="navbar navbar-expand-md bg-success navbar-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="index.php"><i class="fa fa-female"></i><i class="fa fa-male"></i>&nbsp;DIVINAS</a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link <?=(basename($_SERVER['PHP_SELF'])=="index.php")?"active":"";?>" href="index.php"><i class="fa fa-home"></i>&nbsp;Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?=(basename($_SERVER['PHP_SELF'])=="projets.php")?"active":"";?>" href="projets.php"><i class="fa fa-calendar"></i>&nbsp;Projet de mariage</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?=(basename($_SERVER['PHP_SELF'])=="mariages.php")?"active":"";?>" href="mariages.php"><i class="fa fa-female"></i><i class="fa fa-male"></i>&nbsp;Mariages</a>
                </li> 
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown" href="#">
                        <i class="fas fa-user-cog"></i>&nbsp;Administration
                    </a>
                    <div class="dropdown-menu">
                        <a href="utilisateur_login.php" class="dropdown-item <?=(basename($_SERVER['PHP_SELF'])=="utilisateur_login.php")?"active":"";?>"><i class="fas fa-user"></i>&nbsp;Préposé</a>
                        <a href="officier.php" class="dropdown-item <?=(basename($_SERVER['PHP_SELF'])=="officier.php")?"active":"";?>"><i class="fas fa-sign"></i>&nbsp;Officier</a>
                        <a href="administrateur.php" class="dropdown-item <?=(basename($_SERVER['PHP_SELF'])=="administrateur.php")?"active":"";?>"><i class="fas fa-user-cog"></i>&nbsp;Administrateur</a>
                    </div>
                </li>
                </ul>
            </div> 
        </nav>