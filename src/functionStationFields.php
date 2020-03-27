<?php
        function getStationsList(){
            $stations = array();
            $json = file_get_contents('http://vlille.fil.univ-lille1.fr');
            $data = json_decode($json,true);
            $data=compareParCommune($data);
            return $data;
        }
        $array=getStationsList();
        function getFields($data){
                $stations = array(); 
                for($i=0;$i<count($data);$i++){
                    $stations[] = $data[$i]["fields"];
                }
                return $stations;
        }
    
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

        
        function verifieVeloDispo($nombre){
            $array=getStationsList();
            $test=FALSE;
            for($i=0;$i<count($array);$i++){
                if($nombre<=$array[$i]["fields"]["nbvelosdispo"]){
                    $test=TRUE;
                }
            }
            
            return $test;
        }

        function verifieVelolibre($nombre){
            global $array;
            $test=FALSE;
            for($i=0;$i<count($array);$i++){
                if($nombre<=$array[$i]["fields"]["nbplacesdispo"]){
                    $test=TRUE;
                }
            }
            return $test;
        }


        function getNom(){
            $stations=getStationsList();
            $stations=getFields($stations);
            $noms=array();
            for($i=0;$i<count($stations);$i++){
                            $noms[]=$stations[$i]["nom"];
                            
                        }
            
            return $noms;
        }

        function getEtat(){
            $stations=getStationsList();
            $stations=getFields($stations);
            $noms=array();
            for($i=0;$i<count($stations);$i++){
                            $noms[]=$stations[$i]["etat"];
                            
                        }
            
            return $noms;
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
?>
