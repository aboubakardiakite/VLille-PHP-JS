<?php 
try{
	require_once("src/functionStationFields.php");
	require_once("src/checkForm.php");
	require_once("src/functionsDisplayItem.php");
	require_once("views/pageVille.php");
}catch (ParmsException $e){
	$errorMessage = $e->getMessage();
	//require('views/pageTestErreur.php');  // mettre en commentaire pour la partie 2
	require('views/pageErreur.php');
}
?>