// Inicializar el mapa
const map = L.map('map').setView([4.6097, -74.0817], 6); // Centrado en Colombia

// Agregar la capa base de OpenStreetMap
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

// Obtener rutas del backend
fetch('api/obtener_rutas.php')
  .then(response => response.json())
  .then(data => {
    data.forEach(route => {
      // Dibujar las líneas entre los puntos
      L.polyline([
        [route.originLat, route.originLng],
        [route.destinationLat, route.destinationLng]
      ], { color: 'blue', weight: 4 }).addTo(map);

      // Agregar marcadores para origen y destino
      L.marker([route.originLat, route.originLng]).addTo(map)
        .bindPopup(`<b>Origen:</b> ${route.origin}`);
      L.marker([route.destinationLat, route.destinationLng]).addTo(map)
        .bindPopup(`<b>Destino:</b> ${route.destination}`);
    });
  })
  .catch(error => console.error('Error al cargar las rutas:', error));
  fetch('api/obtener_rutas.php')
  .then(response => response.json())
  .then(data => {
    console.log("Rutas cargadas:", data); // Verificar las rutas en la consola
    data.forEach(route => {
      // Dibujar las líneas entre los puntos
      L.polyline([
        [route.originLat, route.originLng],
        [route.destinationLat, route.destinationLng]
      ], { color: 'blue', weight: 4 }).addTo(map);

      // Agregar marcadores para origen y destino
      L.marker([route.originLat, route.originLng]).addTo(map)
        .bindPopup(`<b>Origen:</b> ${route.origin}`);
      L.marker([route.destinationLat, route.destinationLng]).addTo(map)
        .bindPopup(`<b>Destino:</b> ${route.destination}`);
    });
  })
  .catch(error => console.error('Error al cargar las rutas:', error));
