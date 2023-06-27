let map1 = L.map('map1').setView([23.634501,-102.552784],5)

//Agregar tilelAyer mapa base desde openstreetmap
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map1);

document.getElementById('select-location1').addEventListener('change',function(e){
  let coords = e.target.value.split(",");
  map1.flyTo(coords,13);
})