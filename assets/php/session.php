<?php
session_start();
require_once 'auth.php';
$cuser=new Auth();

//Session Préposé
if(!isset($_SESSION['user'])){
    header('location:index.php');
    die;
}
    $clogin=$_SESSION['user'];

    $data=$cuser->currentUser($clogin);

    $cid=$data['id'];
    $ctypePrepose=$data['typePrepose'];
    $ctypeUser=$data['typeUser'];
    $cidCommune=$data['idcommune'];
    $cCommune=$data['commune'];   

    if($ctypePrepose==1){
        $ctypePrepose='Prepose mariage';
    }
    else if($ctypePrepose==4){
        $ctypePrepose='Prepose naissance';
    }
    else{
        $ctypePrepose='Prepose deces';
    }
    
?>