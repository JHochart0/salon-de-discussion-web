<?php
	require "tags.lib.php";
	session_start();
	$_SESSION["pseudo"]="";
	$title="Page de connexion";
	$css="avis-ajouter";

	$content=tag("h1", "Connectez-vous");
	$content.=form("","", "POST");

	$content.=paragraphe("Nom d'utilisateur");
	$content.=tag("input",null, array("type"=>"text", "name"=>"pseudo"));

	$content.="</br>";

	$content.=tag("input",null,array("type"=>"submit", "value"=>"Se connecter"));
	
	if(isset($_POST['pseudo'])){
		
		$_SESSION["pseudo"]=$_POST['pseudo'];
		header("Location: http://localhost/tp/webClient/tp2/index.php");
		
	}
	
	require "gabarit.php";
?>