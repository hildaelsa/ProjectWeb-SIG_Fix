<html>
    <head>
    <!--sisipkan kode pemuatan disini -->
    <link rel="stylesheet" href="leaflet/leaflet.css"/>
    <script src="leaflet/leaflet.js"></script>
	
	<!--menghubungkan html dengan leaflet location control -->
	<link rel="stylesheet"type="text/css" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js" charset="utf-8"></script>
	
	<!--menghubungkan html dengan plugin leafletlinearmeasure -->
	<link rel="stylesheet" href="leaflet/DefaultExtent/leaflet.defaultextent.css">
	<script src="leaflet/DefaultExtent/leaflet.defaultextent.js"></script>
	
	<!--menghubungkan html dengan plugin leaflet search atau geocoder -->
	<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
	
	<!--menghubungkan html dengan plugin leafletlinearmeasure -->
	<link rel="stylesheet" href="leaflet/Leaflet.LinearMeasurement.css"/>
	<script src="leaflet/Leaflet.LinearMeasurement.js"></script>
	
	<!--menghubungkan html dengan plugin leafletminimap-->
	<link rel="stylesheet" href="leaflet/Control.MiniMap.css"/> 
	<script src="leaflet/Control.MiniMap.js"></script>
	
	<!--menghubungkan html dengan plugin Lcontrolmouseposition -->
	<link rel="stylesheet" href="leaflet/L.Control.MousePosition.css"/> 
	<script src="leaflet/L.Control.MousePosition.js"></script>
	
	<!--menghubungkan html dengan plugin leafletgroupedlayercontrol--> 
	<link rel="stylesheet" href="leaflet/leaflet.groupedlayercontrol.css"/>
    <script src="leaflet/leaflet.groupedlayercontrol.js"></script>

    </head>
    <body>
    <!-- peta akan ditampilkan disini -->
    <div style="height:650px" id="mapid"></div>
	<script src="jambi.js"></script>
	<script>
	 //Mengaktifkan basemaps
	 var mymap = L.map('mapid', 'drawcontrol').setView([-1.610123, 103.613120], 13);
	 var GoogleMaps = new
     L.TileLayer('https://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
     opacity: 1.0, attribution: 'Ketrampilan Berkehidupan dan WEBSIG UMS'
    }).addTo(mymap);
    var GoogleSatelliteHybrid =
    L.tileLayer('https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
	maxZoom: 30,
    attribution: 'Ketrampilan Berkehidupan dan WEBSIG UMS'
    });
    var baseLayers = {
   'Google Satellite Hybrid': GoogleSatelliteHybrid,
   'Google Maps': GoogleMaps,
   };
   //Mengaktifkan plugin groupedlayercontrol sehingga basemap bisa muncul 
   L.control.groupedLayers(baseLayers).addTo(mymap);
   var polyg2 = L.geoJson(polygons.features).addTo(mymap);
   var marker = L.marker([-1.602902, 103.580218]).addTo(mymap);
   //Supaya marker yang ada jika diklik akan memunculkan pop up
   marker.bindPopup("<b>Informasinya disini !!</b><br>Raden Mattaher Hospital");
   var marker = L.marker([ -1.640776, 103.579650]).addTo(mymap);
   marker.bindPopup("<b>Informasinya disini !!</b><br>RSUD H. Abdul Manap Jambi"); 
   var marker = L.marker([ -1.605886, 103.605350]).addTo(mymap);
   marker.bindPopup("<b>Informasinya disini !!</b><br>Hospital Baiturrahim");    
   var marker = L.marker([ -1.631643, 103.605792]).addTo(mymap);
   marker.bindPopup("<b>Informasinya disini !!</b><br>Mitra Hospital Jambi");   
   var marker = L.marker([ -1.589397, 103.617781]).addTo(mymap);
   marker.bindPopup("<b>Informasinya disini !!</b><br>Rumah Sakit Bhayangkara Jambi");    
   var marker = L.marker([ -1.640286, 103.623879]).addTo(mymap);
   marker.bindPopup("<b>Informasinya disini !!</b><br>Rumah Sakit Royal Prima Jambi");    
   var marker = L.marker([-1.616792, 103.589505]).addTo(mymap);
   marker.bindPopup("<b>Informasinya disini !!</b><br>Hospital Kambang");    
   var marker = L.marker([ -1.628599, 103.635647]).addTo(mymap);
   marker.bindPopup("<b>Informasinya disini !!</b><br>Siloam Hospitals Jambi");    
   var marker = L.marker([ -1.592145,103.617312]).addTo(mymap);
   marker.bindPopup("<b>Informasinya disini !!</b><br>Rumah Sakit Santa Theresia"); 
   var marker = L.marker([ -1.593275,103.618417]).addTo(mymap);
   marker.bindPopup("<b>Informasinya disini !!</b><br>Rumah Sakit Dr. Bratanata Jambi (DKT Hospital) "); 
   
   //Menambahkan scale bar
    L.control.scale({
	   position:"bottomright",
	   maxWidth:300,
	   metric:false 
	   }).addTo(mymap);
	   
	//Menambahkan informasi koordinat mouse dalam satuan GCS
    L.control.mousePosition( {position:"bottomright", numDigits:8, prefix:"koordinat"} ).addTo(mymap);
	
	//Menambahkan arah utara pada leaflet
	var north = L.control({position: "bottomleft"});
    north.onAdd = function(mymap) {
    var div = L.DomUtil.create("div", "info legend");
    div.innerHTML = '<img src="North arroww.jpg">';
    return div;
    }
    north.addTo(mymap);
	
	//Menampakkan plugin leaflet minimap (insert)
	var osmUrl='http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
	var osmAttrib='Map data &copy; OpenStreetMap contributors';
	var osm = new L.TileLayer(osmUrl, {minZoom: 5, maxZoom: 18, attribution: osmAttrib});

	mymap.addLayer(osm);
	mymap.setView(new L.LatLng(-1.610123, 103.613120),13);
		
	//Plugin magic goes here! Note that you cannot use the same layer object again, as that will confuse the two map controls
	var osm2 = new L.TileLayer(osmUrl, {minZoom: 0, maxZoom: 13, attribution: osmAttrib });
	var miniMap = new L.Control.MiniMap(osm2, { position:"bottomright", toggleDisplay: true }).addTo(mymap);
	
	//Kode untuk mengaktifkan plugin leaflet linearmeasure
	mymap.addControl(new L.Control.LinearMeasurement({
        unitSystem: 'metric',
        color: '#ed3e4f',
        type: 'line'
    }));
	
	//memanggil search atau geocoder
	L.Control.geocoder({
	position: 'topleft'
    }).addTo(mymap);
	
	//memanggil extent//menampilkan tampilan semula tanpa merefresh
	L.control.defaultExtent({
	position:'topright'
    }).addTo(mymap);
	
    //memanggil lokasi kita
    L.control.locate({
	position: 'topright'
	}).addTo(mymap);
	

	
    </script>
</html>