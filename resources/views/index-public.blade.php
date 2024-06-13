@extends('layouts.template')

@section('styles')
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">
     <style>
        html, body { 
            height: 100%; 
            width: 100%; 
            margin: 0;
         }
        #map { 
            height: calc(100vh - 56px);
            width: 100%; 
            margin: 0;
         }
         .nav-link i, .navbar-brand i {
            margin-right: 5px; /* Memberikan jarak antara ikon di navbar dengan label */
        }
     </style>
     @endsection

    @section('content')
    <div id="map"></div>
    @endsection

    

    @section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
    <script src="https://unpkg.com/terraformer@1.0.7/terraformer.js"></script>
    <script src="https://unpkg.com/terraformer-wkt-parser@1.1.2/terraformer-wkt-parser.js"></script>
    <script>
        // Map
        var map = L.map('map').setView([-7.7713, 110.3770], 13); // Coordinates for UGM

        //Basemap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        
/* GeoJSON Point */
var point = L.geoJson(null, {
				onEachFeature: function (feature, layer) {
					var popupContent = "Nama: " + feature.properties.name + "<br>" +
						"Deskripsi: " + feature.properties.description + "<br>" + 
            "Gambar: <img src='{{asset('storage/images/')}}/" + feature.properties.image + "'class='img-thumbnail' alt='...'>" 
            ;
					layer.on({
						click: function (e) {
							point.bindPopup(popupContent);
						},
						mouseover: function (e) {
							point.bindTooltip(feature.properties.name);
						},
					});
				},
			});
			$.getJSON("{{route('api.points')}}", function (data) {
				point.addData(data);
				map.addLayer(point);
			});
/* GeoJSON Polyline */
var polyline = L.geoJson(null, {
				onEachFeature: function (feature, layer) {
					var popupContent = "Nama: " + feature.properties.name + "<br>" +
						"Deskripsi: " + feature.properties.description + "<br>" + 
            "Gambar: <img src='{{asset('storage/images/')}}/" + feature.properties.image + "'class='img-thumbnail' alt='...'>" 
            
            ;
					layer.on({
						click: function (e) {
							polyline.bindPopup(popupContent);
						},
						mouseover: function (e) {
							polyline.bindTooltip(feature.properties.name);
						},
					});
				},
			});
			$.getJSON("{{route('api.polylines')}}", function (data) {
				polyline.addData(data);
				map.addLayer(polyline);
			});
/* GeoJSON Polygon */
var polygon = L.geoJson(null, {
				onEachFeature: function (feature, layer) {
					var popupContent = "Nama: " + feature.properties.name + "<br>" +
						"Deskripsi: " + feature.properties.description + "<br>" + 
            "Gambar: <img src='{{asset('storage/images/')}}/" + feature.properties.image + "'class='img-thumbnail' alt='...'>" 
            ;
					layer.on({
						click: function (e) {
							polygon.bindPopup(popupContent);
						},
						mouseover: function (e) {
							polygon.bindTooltip(feature.properties.name);
						},
					});
				},
			});
			$.getJSON("{{route('api.polygons')}}", function (data) {
				polygon.addData(data);
				map.addLayer(polygon);
			});

      //layer control
      var overlayMaps = {
    "Point": point,
    "Polyline": polyline,
    "Polygon": polygon
};
var layerControl = L.control.layers(null, overlayMaps).addTo(map);
    </script>
    @endsection

