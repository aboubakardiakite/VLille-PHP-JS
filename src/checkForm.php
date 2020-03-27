<?php require_once("functionStationFields.php");?>
<?php
 	
	// création de la classe Exception spécifique
	class ParmsException extends Exception{};
	
	// quelques constantes utiles
	const METHOD = INPUT_GET;
	const ETAT =['EN SERVICE', 'HORS SERVICE'];
	//faire un ensemble de fonctions qui serviras a faire les verification

	function checkCommune($commune,$communes){
				$veri = filter_input(METHOD,$commune,FILTER_SANITIZE_STRING);
				if(!in_array(strtoupper($veri),$communes) && $veri!=NULL)
					throw new ParmsException("param $commune : valeur incorrecte");

				return $veri;
	}

	function checkNom($nom,$station){
		$veri = filter_input(METHOD,$nom,FILTER_SANITIZE_STRING);
		if(!in_array(strtoupper($veri),$station) && $veri!=NULL)
			throw new ParmsExeception("param $nom : valeur incorrecte");

		return $veri;
               
	}

	function checkVeloDispo($velo){
		$veri= filter_input(METHOD,$velo,FILTER_SANITIZE_NUMBER_INT);
		if($veri==NULL){
			$veri=-1;
		}else{
			if(!verifieVeloDispo($veri)){
				throw new ParmsExeception("param $velo : valeur incorrecte");
			}
		}
		
		return $veri;
	}

	function checkPlaceLibresDisponibles($libre){
		$veri= filter_input(METHOD,$libre,FILTER_SANITIZE_NUMBER_INT);
		if($veri==NULL){
			$veri=-1;
		}else{
			if(!verifieVelolibre($veri)){
				throw new ParmsExeception("param $libre : valeur incorrecte");
			}
		}
		
		return $veri;
	}
	function check_etat($nom){
		$veri = filter_input(METHOD,$nom,FILTER_SANITIZE_STRING,['default'=> ETAT]);
		return $veri;
}
		
	$station=getNom();
	$nom=checkNom("nom",$station);
	
	
	$communes=getCommune();
	$commune=checkCommune("commune",$communes);
	
	$veloDispo=checkVeloDispo("veloDispo");
	$placeDispo=checkPlaceLibresDisponibles("placeDispo");
	$etats=getEtat();
	$etat=check_etat("etat");
	
		

?>