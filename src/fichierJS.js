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
  let pointsList=[];
  for(let item of document.querySelectorAll('#station>li')){
    let nom = item.textContent;
    let geoloc = JSON.parse(item.dataset.geo);
    let marker = L.marker(geoloc).addTo(maCarte).bindPopup(nom);
    pointsList.push(geoloc);
    setupListeners(item,marker);

  }

  if(pointsList.length>0){
    maCarte.fitBounds(pointsList) ;
  }
}

);

function setupListeners(item,marker){
  item.addEventListener('click',()=>{
    marker.openPopup();
    setCurrent(item);
    maCarte.setView(marker.getLatLng(),13);
  });
  marker.on("click",()=>{
    setCurrent(item);
    maCarte.setView(marker.getLatLng(),13);
  });
}

{
  let itemCourant = null;
  function setCurrent(item){
    if(itemCourant){
        itemCourant.classList.toggle('setCurrent');
      }
      itemCourant=item;
      itemCourant.classList.toggle('current');
    
  }
}









/*
var initialiser = function(reponse){
      JSON.p4arse(reponse,(key,value)=>{
        reponse[]
      })
        var etat = reponse["etat"];
        var etatconnexion = reponse["etatconnexion"];
        var nbvelosdispo =reponse["nbvelosdispo"];
        var nbplacesdispo =reponse["nbplacesdispo"];
        var commune = reponse["commune"];
        var type = reponse["type"];
        var libelle = reponse["libelle"];
        var 

    
}
*/

/*
  let marker = L.marker([50.609614, 3.136635]).addTo(maCarte);
      // 5 : lui associer un popup
  marker.bindPopup('Le bâtiment M5 <strong>Formations en Informatique</strong>');
  
      // autre marqueur :
  L.marker([50.6092, 3.14159]).addTo(maCarte).bindPopup('LILLIAD <strong>Learning center</strong>');

  L.marker([50.6000, 3.14159]).addTo(maCarte).bindPopup('LIL <strong>Learning </strong>');

*/