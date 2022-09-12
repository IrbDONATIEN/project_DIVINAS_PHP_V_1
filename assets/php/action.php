<?php
 session_start();
 require_once 'auth.php';
 $user=new Auth();

//Début Login préposé Ajax Request
if(isset($_POST['action'])&& $_POST['action']=='login'){
    $login=$user->test_input($_POST['login']);
    $motdepasse=$user->test_input($_POST['motdepasse']);
    $typeUser=$user->test_input($_POST['typeUser']);

    $loggedInUser=$user->loginPrepose($login,$motdepasse,$typeUser);

    if($loggedInUser !=null){
        $_SESSION['user']=$login;
    }
    else{
        echo $user->showMessage('danger', 'Login, mot de passe et type utilisateur incorrect !');
    }
}

//Début Login Administrateur Ajax Request
if(isset($_POST['action'])&& $_POST['action']=='login_log'){
    $loginAdmin=$user->test_input($_POST['login']);
    $motdepasseAdmin=$user->test_input($_POST['motdepasse']);

    $loggedInAdmin=$user->loginAdministrateur($loginAdmin,$motdepasseAdmin);

    if($loggedInAdmin !=null){
        $_SESSION['admin']=$loginAdmin;
    }
    else{
        echo $user->showMessage('danger', 'Login et mot de passe est incorrect !');
    }

}


//Début Login Officier de la commune Ajax Request
if(isset($_POST['action'])&& $_POST['action']=='login_logs'){
    $loginOfficier=$user->test_input($_POST['login']);
    $motdepasseOfficier=$user->test_input($_POST['motdepasse']);
    $typeOfficier=$user->test_input($_POST['typeUser']);

    $loggedInOff=$user->loginOfficier($loginOfficier,$motdepasseOfficier,$typeOfficier);

    if($loggedInOff !=null){
        $_SESSION['Off']=$loginOfficier;
    }
    else{
        echo $user->showMessage('danger', 'Login, mot de passe et type utilisateur est incorrect !');
       
    }

}


?>


