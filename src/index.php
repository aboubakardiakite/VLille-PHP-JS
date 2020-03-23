<?php require_once("functionsDisplayItem.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vlille Projet2</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" crossorigin=""/>
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" crossorigin=""></script>
</head>
<body>
    <div class="formulaire">
        <?php require("formulaire.php") ;?>
    </div>
    <div id="conteneur">
        <pre>
        <div id="listestations" >
            <?php echo displayStationsList();?>
        </div>
        </pre>
        <div id="map"></div>
    </div>
    <script src="fichierJS.js"></script>
</body>
</html>