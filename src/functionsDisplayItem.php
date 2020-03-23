<?php
    require_once("functionStationFields.php");
    require_once("checkForm.php");
    
    function selectionUnique(){
        global $nom;
        
		global $commune;
		$array=getStationsList();
        $arra=array();
        
			for($i=0;$i<count($array);$i++){
				if(strcasecmp($array[$i]["fields"]["nom"],$nom)==0 || strcasecmp($array[$i]["fields"]["commune"],$commune)==0){ 
                    $arra[]=$array[$i];
                    
					}
        }
        
			if($arra==[] && !isset($nom) && !isset($commune))
				return $array;
		return $arra;  
	}
    //une function qui affiche la liste des stations selon des condition 

   function displayStationsList(){
        $stations = selectionUnique();
        $stations = getFields($stations);
         $ul = "<ul id=\"station\" >";
        foreach($stations as $station){

            $li = "<li class=\"fields\"   data-etat=\"".$station["etat"]."\"
                    data-etatconnexion=\"".$station["etatconnexion"]."\"
                    data-nbvelosdispo=\"".$station["nbvelosdispo"]."\"
                    data-nbplacesdispo=\"".$station["nbplacesdispo"]."\"
                    date-commune=\"".$station["commune"]."\"
                    data-type=\"".$station["type"]."\"
                    data-libelle=\"".$station["libelle"]."\"
                    data-datemiseajour=\"".$station["datemiseajour"]."\" 
                    data-geo=\""."[".$station["geo"][0].",".$station["geo"][1]."]"."\" 
                    data-nom=\"".$station["nom"]."\" 
                    data-adresse=\"".$station["adresse"]."\">
                    <span class=\"nom\">".$station["nom"]."  </span><br>
                    <span class=\"commune\">".$station["commune"]."</span><br>
                    <span class=\"etat\" >".$station["etat"]."</span>\n";
            $ul.= $li;
        }
        $ul.= "</ul>";
        return $ul;
    }

?>