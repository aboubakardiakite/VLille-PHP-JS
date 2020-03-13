<?php

    function getStationsList(){
        $stations = array();
        $json = file_get_contents('http://vlille.fil.univ-lille1.fr');
        $data = json_decode($json,true);
    
        foreach($data as $station){
            $stations[] = $station["fields"];
        }

        return $stations;
    }

    function displayStationsList(){
        $stations = getStationsList();
        $ul = "<ul id='stations'>";
        foreach($stations as $station){
            $li = "<li>".$station["commune"]."</li>";
            $ul.= $li;
        }
        $ul.= "</ul>";
        return $ul;
    }

    function getStationByCommune($commune){

    }