<?php



function recupererNomStation($nom){
	$jason = file_get_contents('http://vlille.fil.univ-lille1.fr');
	$tab = json_decode($jason,true);

	
}



?> 