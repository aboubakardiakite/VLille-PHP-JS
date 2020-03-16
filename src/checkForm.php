<?php
 	require("fonctions.php");
	// création de la classe Exception spécifique
	class ParmsException extends Exception{};
	
	// quelques constantes utiles
	const METHOD = INPUT_GET;
	//faire un ensemble de fonctions qui serviras a faire les verification

	function checkCommune($nom,$commune){

				$veri = filter_input(METHOD,$nom,FILTER_SANITIZE_STRING,['default'=> $commune]);
               
                if($veri === FALSE)
                        throw new ParmsException("param $nom : valeur incorrecte");
                return $veri;
	}

	function checkNom($nom,$station){

				$veri = filter_input(METHOD,$nom,FILTER_SANITIZE_STRING,['default'=> $station]);
               if($veri === FALSE)
                        throw new ParmsException("param $nom : valeur incorrecte");
                return $veri;
	}

	function checkVeloDispo($dispo){
		$veri=$_GET[$dispo];
		$test=false;
		if(!is_numeric($veri)){
			throw new ParmsException("param $nom : valeur incorrecte");
		}
		for($i=0;$i<count($dispo);$i++){
				if($veri>$dispo[$i]){
					$test=true;
				}
			}
		if(test){
			throw new ParmsException("param $veri : valeur est plus grande");
		}
		return $veri;
	}

	function checkPlaceLibresDisponibles($libre,$dispo){
		$veri=$_GET[$libre];
		$test=false;
		if(is_numeric($veri)==false){
			throw new ParmsException("param $nom : valeur incorrecte");
		}
		for($i=0;$i<count($dispo);$i++){
				if($veri>$dispo[$i]){
					$test=true;

				}
			}
		if(test){
			throw new ParmsException("param $veri : valeur est plus grande");
		}
		return $veri;
	}

	$station=getNom();
	$communes=getCommune();
	$dispo=getVeloDispo();
	$libre=getPlaceLibre();
	///////////////////////////
	$nom=checkNom("nom",$station);
	$commune=checkCommune("commune",$commune);
	$veloDispo=checkVeloDispo("veloDispo",$dispo);
	$placeDispo=checkPlaceLibresDisponibles("placeDispo",$libre);
	

?>