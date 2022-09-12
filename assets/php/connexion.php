<?php
	try{
		$db= new PDO('mysql:host=localhost;dbname=db_divinas','root','');
	}
	catch(Exception $e ){
		die('votre connection a échouée');
	}
?>