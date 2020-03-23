<?php
    require_once("functionStationFields.php");
    function getNom(){
            $stations=getStationsList();
            $stations=getFields($stations);
            $noms=array();
    
            for($i=0;$i<count($stations);$i++){
                            $noms[]=$stations[$i]["nom"];
                            
                        }
            $noms=array_unique($noms);
            return $noms;
        }

    function getPlaceLibre(){
        $stations=getStationsList();
        $stations=getFields($stations);
        $place=array();
    
        for($i=0;$i<count($stations);$i++){
                        $place[]=$stations[$i]["nbplacesdispo"];
                    
                    }
        
        return $place;
    }

     //je recupere la commune des stations avec cette fonction
     function getCommune(){
        $stations=getStationsList();
        $stations=getFields($stations);
        $commune=array();
        $j=0;
        for($i=0;$i<count($stations);$i++){
                        $commune[]=$stations[$i]["commune"];
                    }
        $commune=array_unique($commune);
        return $commune;
    }

    function getVeloDispo(){
        $stations=getStationsList();
        $stations=getFields($stations);
        $velo=array();
    
        for($i=0;$i<count($stations);$i++){
                        $velo[]=$stations[$i]["nbvelosdispo"];
                    
                    }
        
        return $velo;
    }
    
  



?>