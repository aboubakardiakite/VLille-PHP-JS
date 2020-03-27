<?php
    require_once("src/functionsDisplayItem.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>V'lille Projet1</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" crossorigin=""/>
    <link rel="stylesheet" href="jsCss/style.css">
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" crossorigin=""></script>
</head>
<body>
    
    <header>
        <div class="separe">
            <h2 class="titre">V'LILLE</h2>
        <div>
    <header>
    <section id="formulaire">
            <div>
                <?php require_once("formulaire.php");?>
            </div>
    </section>
    
    <div id="map"></div>
    
    <?php echo displayStationsList();?>
    
    
    
    
    <script src="jsCss/fichierJS.js"></script>
    <script src="jsCss/VliveImage.js"></script>
</body>
</html>
