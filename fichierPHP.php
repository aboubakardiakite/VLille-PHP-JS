<?php



function recupererNomStation($nom){
	$jason = file_get_contents('http://vlille.fil.univ-lille1.fr');
	$tab = json_decode($jason,true);

	$fields='<ul>';

	foreach ($tab as $keys => $value) {
		foreach ($value['fields'] as $key => $values) {
			if($key == $nom){
				$fields.="<li>$values</li> \n";
			}
			
		}
		
	}
	$fields.="</ul>\n";

	echo $fields;

}

recupererNomStation('commune');

?> 