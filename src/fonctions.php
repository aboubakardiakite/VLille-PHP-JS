<?php
    //recupere le tableau contenant les valeur de fields
    function getStationsList(){
        $stations = array();
        $json = file_get_contents('http://vlille.fil.univ-lille1.fr');
        $data = json_decode($json,true);
        $data=compareParCommune($data);
            foreach($data as $station){
            $stations[] = $station["fields"];
        }

        return $stations;
    }

    //je recupere le nombre de velo disponible des stations avec cette function
    function getVeloDispo(){
        $stations=getStationsList();
        $velo=array();
        $j=0;
        for($i=0;$i<count($stations);$i++){
                        $velo[$i]=$stations[$i]["nbvelosdispo"];
                        $j=$j+1;
                    }
        
        return $velo;
    }
    //je recupere le nombre de place libres disponible des stations avec cette function
    function getPlaceLibre(){
        $stations=getStationsList();
        $place=array();
        $j=0;
        for($i=0;$i<count($stations);$i++){
                        $place[$i]=$stations[$i]["nbplacesdispo"];
                        $j=$j+1;
                    }
        
        return $place;
    }
        //je recupere le nom des stations avec cette function

    function getNom(){
        $stations=getStationsList();
        $nom=array();
        $j=0;
        for($i=0;$i<count($stations);$i++){
                        $nom[$i]=$stations[$i]["nom"];
                        $j=$j+1;
                    }
        $nom=array_unique($nom);
        return $nom;
    }
    //je recupere la commune des stations avec cette fonction
    function getCommune(){
        $stations=getStationsList();
        $commune=array();
        $j=0;
        for($i=0;$i<count($stations);$i++){
                        $commune[$i]=$stations[$i]["commune"];
                        $j=$j+1;
                    }
        $commune=array_unique($commune);
        return $commune;
    }
    //cette fonction sert a classer mes nom de commune par ordre alphabetique
    function compareParCommune($array){
    $temp;
    for($i=0;$i<count($array);$i++){
        for($j=0;$j<count($array);$j++){
            if((strcmp($array[$i]["fields"]["commune"],$array[$j]["fields"]["commune"]))<0){
                $temp=$array[$i];
                $array[$i]=$array[$j];
                $array[$j]=$temp;
            }
        }
    }
    return ($array);
}
   


