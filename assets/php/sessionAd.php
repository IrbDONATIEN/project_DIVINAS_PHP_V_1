<?php
session_start();
require_once 'auth.php';
$cAdmin=new Auth();

//Session Administrateur
if(!isset($_SESSION['admin'])){
    header('location:index.php');
    die;
}
    $adminlogin=$_SESSION['admin'];
    
    $dataAdmin=$cAdmin->currentAdministrateur($adminlogin);
    
    $adminId=$dataAdmin['id_admin'];
    $type=$dataAdmin['type'];
    $service=$dataAdmin['service'];
    $matricule=$dataAdmin['matricule'];
    $nomAgent=$dataAdmin['nomAgent']; 
?>