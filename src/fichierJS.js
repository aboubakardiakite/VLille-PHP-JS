window.addEventListener('DOMContentLoaded', ()=>{
      // 1 : création
  let maCarte = L.map('map');
  
      // 2 : choix du fond de carte
  L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '©️ OpenStreetMap contributors'
  }).addTo(maCarte);
    
      // 3 : réglage de la partie visible (centre, niveau de zoom)
  maCarte.setView([50.61, 3.14], 14);
  
     // ...
      // 4 : placer un marqueur
  let marker = L.marker([50.609614, 3.136635]).addTo(maCarte);
      // 5 : lui associer un popup
  marker.bindPopup('Le bâtiment M5 <strong>Formations en Informatique</strong>');
  
      // autre marqueur :
  L.marker([50.6092, 3.14159]).addTo(maCarte).bindPopup('LILLIAD <strong>Learning center</strong>');


}

);

/*
var initialiser = function(reponse){
        var etat = reponse["fields"]["etat"];
        var 
    
}
*/