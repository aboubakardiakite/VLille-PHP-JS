<?php




	$jason = file_get_contents('http://vlille.fil.univ-lille1.fr');
	$tab = json_decode($jason,true);

	$fields =array();
	foreach($tab as $key =>$value){

		$fields[$key]=$value["fields"];

	}
	
	

	




?> 