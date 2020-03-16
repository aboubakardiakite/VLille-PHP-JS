<?php


    //une function qui affiche la liste des stations selon des condition 
   function displayStationsList(){
        $stations = getStationsList();
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