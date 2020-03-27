<?php
    require_once("functionStationFields.php");
    require_once("checkForm.php");
    function selectionUnique(){
        global $nom;
        global $veloDispo;
        global $placeDispo;
        global $commune;
        global $etat;
		$array=getStationsList();
        $arra=array();
			for($i=0;$i<count($array);$i++){
				if(strcasecmp($array[$i]["fields"]["commune"],$commune)==0 && strcasecmp($array[$i]["fields"]["nom"],$nom)==0 && $veloDispo==-1 && $placeDispo==-1 && $array[$i]["fields"]["etat"]==$etat){ 
                    $arra[]=$array[$i];
                }else{
                    if(strcasecmp($array[$i]["fields"]["nom"],$nom)==0){
                        $arra[]=$array[$i];
                    }else{
                        if(strcasecmp($array[$i]["fields"]["commune"],$commune)==0){
                            $arra[]=$array[$i];
                        }else{
                        if(strcasecmp($array[$i]["fields"]["commune"],$commune)==0 && strcasecmp($array[$i]["fields"]["nom"],$nom)!=0 && $veloDispo!=-1 && $placeDispo!=-1 && $array[$i]["fields"]["etat"]==$etat){ 
                                if($veloDispo<=$array[$i]["fields"]["nbvelosdispo"] && $placeDispo<=$array[$i]["fields"]["nbplacesdispo"]){
                                    $arra[]=$array[$i];
                                }else{
                                        if($array[$i]["fields"]["etat"]=="EN SERVICE" || $array[$i]["fields"]["etat"]=="HORS SERVICE"){
                                            $arra[]=$array[$i];
                                        }else{
                                                if(strcasecmp($array[$i]["fields"]["commune"],$commune)==0 && $nom==NULL && $veloDispo!=-1 && $placeDispo==-1 && $array[$i]["fields"]["etat"]==$etat){ 
                                                    if($veloDispo<=$array[$i]["fields"]["nbvelosdispo"]){
                                                        $arra[]=$array[$i];
                                                    }
                                                        else{
                                                            if(strcasecmp($array[$i]["fields"]["commune"],$commune)==0 && $nom==NULL && $veloDispo==-1 && $placeDispo!=-1 && $array[$i]["fields"]["etat"]==$etat){ 
                                                                if($placeDispo<=$array[$i]["fields"]["nbplacesdispo"]){
                                                                        $arra[]=$array[$i];
                                                                }
                                                            
                                                            }
                                                        }
                                                    }
                                                }
                                        
                                            }
                                    
                                       }

                                     }   
                                }
                            }
            
                           
            if(($array[$i]["fields"]["etat"]==$etat) && ($veloDispo!=-1 && $placeDispo==-1 && strcasecmp($array[$i]["fields"]["commune"],$commune)==0)){
                if($veloDispo<=$array[$i]["fields"]["nbvelosdispo"]){
                    $arra[]=$array[$i];
                }
            }
            if(($array[$i]["fields"]["etat"]==$etat) && ($veloDispo==-1 && $placeDispo!=-1 && strcasecmp($array[$i]["fields"]["commune"],$commune)==0)){
                if($placeDispo<=$array[$i]["fields"]["nbplacesdispo"]){
                    $arra[]=$array[$i];
                }
            }
            if($veloDispo!=-1 && $placeDispo==-1 && $array[$i]["fields"]["etat"]==$etat && $commune==NULL && $nom == NULL){
                if($veloDispo>=$array[$i]["fields"]["nbvelosdispo"]){
                    $arra[]=$array[$i];
                }
            }
            if($veloDispo==-1 && $placeDispo!=-1 && $array[$i]["fields"]["etat"]==$etat && $commune==NULL && $nom == NULL){
                if($placeDispo>=$array[$i]["fields"]["nbplacesdispo"]){
                    $arra[]=$array[$i];
                }
            }

            if($veloDispo!=-1 && $placeDispo!=-1 && $array[$i]["fields"]["etat"]==$etat && $commune==NULL && $nom == NULL){
                if($placeDispo>=$array[$i]["fields"]["nbplacesdispo"] && $veloDispo>=$array[$i]["fields"]["nbvelosdispo"]){
                    $arra[]=$array[$i];
                }

            }
            if($commune==NULL && $nom == NULL && $placeDispo==-1 && $veloDispo==-1 && isset($etat) && $array[$i]["fields"]["etat"]==$etat){
                $arra[]=$array[$i];
            }
                
        }
        
			if($arra==[])
				return $array;
		return $arra;  
    }
    
    //une function qui affiche la liste des stations selon des condition 

   function displayStationsList(){
        $stations = selectionUnique();
        $stations = getFields($stations);
         $ul = "<ul id=\"station\" ><table>";
         $ul.="<thead><tr>";
         $ul.="<th>Nom</th>";
         $ul.="<th>Commune</th>";
         $ul.="<th>Etat</th>";
         $ul.="<th>Nombre de vélo disponible</th>";
         $ul.="<th>Nombre de place libre</th>";
         $ul.="<th>Catre</th>";
         $ul.="</thead><tbody>";
        foreach($stations as $station){
            $ul.="<tr><td data-label=\"nom\">".$station["nom"]."</td>"."<td data-label=\"commune\">".$station["commune"]."</td>"."<td data-label=\"etat\">".$station["etat"]."</td>"."<td data-label=\"nbvelosdispo\">".$station["nbvelosdispo"]."</td>"."<td data-label=\"nbplacesdispo\">".$station["nbplacesdispo"]."</td>";

            $li = "<td data-label=\"adresse\"><li class=\"fields\"   data-etat=\"".$station["etat"]."\"
                    data-etatconnexion=\"".$station["etatconnexion"]."\"
                    data-nbvelosdispo=\"".$station["nbvelosdispo"]."\"
                    data-nbplacesdispo=\"".$station["nbplacesdispo"]."\"
                    date-commune=\"".$station["commune"]."\"
                    data-type=\"".$station["type"]."\"
                    data-libelle=\"".$station["libelle"]."\"
                    data-datemiseajour=\"".$station["datemiseajour"]."\" 
                    data-geo=\""."[".$station["geo"][0].",".$station["geo"][1]."]"."\" 
                    data-nom=\"".$station["nom"]."\" 
                    data-adresse=\"".$station["adresse"]."\">"."<a href=\"#map\"><img src=\"image/icons.png\" class=\"icon\" /></a></td>";
            $ul.=$li;
            
        }
        $li="</tbody></table>";
        $ul.= $li;
        $ul.= "</ul>";
        return $ul;
    }

    function displayStationsListErreur(){
        $stations = selectionUnique();
        $stations = getFields($stations);
        $ul = "<ul id=\"station\" ><table>";
        $ul.="<thead><tr>";
        $ul.="<th>Nom</th>";
        $ul.="<th>Commune</th>";
        $ul.="<th>Etat</th>";
        $ul.="<th>Nombre de vélo disponible</th>";
        $ul.="<th>Nombre de place libre</th>";
        $ul.="<th>Catre</th>";
        $ul.="</thead><tbody>";
        $li="</tbody></table>";
        $ul.= $li;
        $ul.= "</ul>";
        return $ul;
    }

?>