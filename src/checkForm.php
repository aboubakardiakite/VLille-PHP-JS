<?php
 	
	// création de la classe Exception spécifique
	require_once("functionGetParams.php");
	class ParmsException extends Exception{};
	
	// quelques constantes utiles
	const METHOD = INPUT_GET;
	//faire un ensemble de fonctions qui serviras a faire les verification

	function checkCommune($commune,$communes){
				$veri = $_GET[$commune];
			
				return $veri;
	}

	function checkNom($nom,$station){
				$veri = $_GET[$nom];
				
					return $veri;
				/*else{
					throw new ParmsException(" param $veri : valeur incorrecte");
				}*/
               
	}

	function checkVeloDispo($velo,$dispo){
		$veri=$_GET[$velo];
		$p=false;
		if(is_numeric($veri)){
			for($i=0;$i<count($dispo);$i++){
				if($veri<$dispo[$i]){
					$p=true;
				}
			}
			if($p){
				return $veri;
			}
		}
			
		/*else	
			throw new ParmsException(" param $velo : valeur incorrecte");*/
	}

	function checkPlaceLibresDisponibles($libre,$dispo){
		$veri=$_GET[$libre];
		$p=false;
		if(is_numeric($veri)){
			for($i=0;$i<count($dispo);$i++){
				if($veri<$dispo[$i]){
					$p=true;
				}
			}
			if($p){
				return $veri;
			}
		}
	}
	


	
	$station=getNom();
	$nom=checkNom("nom",$station);
	
	
	
	$communes=getCommune();
	$commune=checkCommune("commune",$communes);
	
	
	$dispo=getVeloDispo();
	$veloDispo=checkVeloDispo("veloDispo",$dispo);
	
	
	
	$libre=getPlaceLibre();
	$placeDispo=checkPlaceLibresDisponibles("placeDispo",$libre);	



	



	
		

?>