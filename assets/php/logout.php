<?php
    session_start();
    unset($_SESSION['user']);
    unset($_SESSION['admin']);
    unset($_SESSION['Off']);
    header('location:../../index.php');
?>