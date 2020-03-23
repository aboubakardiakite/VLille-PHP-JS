<?php
        function getStationsList(){
            $stations = array();
            $json = file_get_contents('http://vlille.fil.univ-lille1.fr');
            $data = json_decode($json,true);
            $data=compareParCommune($data);
            return $data;
        }
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

?>