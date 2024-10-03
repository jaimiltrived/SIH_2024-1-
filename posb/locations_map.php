<!-- locations_map.php -->
<div id="map" style="height: 400px;"></div>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    var map = L.map('map').setView([22.5726, 88.3639], 8);  // Set to Kolkata's lat-lng

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data © OpenStreetMap contributors'
    }).addTo(map);

    // Add dynamic markers from the database
    var marker = L.marker([22.5726, 88.3639]).addTo(map);  // Example marker for Kolkata
    marker.bindPopup("<b>Kolkata</b><br>Demographic Data").openPopup();
</script>
