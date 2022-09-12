<?php
session_start();
require_once 'auth.php';
$cOfficier=new Auth();

//Session Officier
if(!isset($_SESSION['Off'])){
    header('location:index.php');
    die;
}
    $loginOfficier=$_SESSION['Off'];
    
    $dataOff=$cOfficier->currentOfficier($loginOfficier);
    
    $officierId=$dataOff['idOfficier'];
    $nomOfficier=$dataOff['nomOfficier'];
    $prenom=$dataOff['prenom'];
    $typeUser=$dataOff['typeUser'];
    $communeId=$dataOff['communeId'];
    $commune=$dataOff['commune'];
    
?>