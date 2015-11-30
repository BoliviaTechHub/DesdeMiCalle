/**
 * Created by jhtan on 3/9/15.
 */

// Fuck you OL
(function ($) {
    "use strict";
    $(document).ready(function () {
        var marker, map, claimIndexMap,
            lapaz = new L.LatLng(-16.51361, -68.12447), // La Paz City latitude and longitude.
            actualLatitude = -16.51361,
            actualLongitude = -68.12447;

        // Get the actual latitude and longitude of the user.
        if (navigator.geolocation) {
            var geo = navigator.geolocation.watchPosition(showPosition);
        }

        function showPosition(position) {
            actualLatitude = position.coords.latitude;
            actualLongitude = position.coords.longitude;
        }

        // Function for the Creates Claim Map section.
        // This ensures the functionality of the mobile pin.
        function onMapClick(e) {
            if (marker) {
                map.removeLayer(marker);
            }

            //var texto="<b>hola mundo</b><br>yo soy un marker.<br>"+ e.latlng.toString();

            var markerLocation = new L.LatLng(e.latlng.lat, e.latlng.lng);
            marker = new L.Marker(markerLocation);
            var RedIcon = L.Icon.Default.extend({
                options: {
                    iconUrl: '/leaflet/marker-icon.png'
                }
            });
            var redIcon = new RedIcon();
            marker =  new L.marker( e.latlng ,  { id : "id" , icon : redIcon , draggable : 'true' });
            marker.on('dragend',  function( event ){
                var marker =  event.target ;
                var position = marker.getLatLng();
                //console.log(position.lat);
                $('#latitude').val(position.lat);
                $('#longitude').val(position.lng);
                //marker.setLatLng([ position ],{ id : "id" , draggable : 'true' }).bindPopup( position ).update();
            });

            //map.addLayer(marker).bindPopup('asdfasdf').openPopup();
            marker.bindPopup('LOL').openPopup();
            map.addLayer(marker);

            $('#latitude').val(e.latlng.lat);
            $('#longitude').val(e.latlng.lng);
            //console.log(e.latlng.lat+"  /  "+e.latlng.lng);
        }

        // Init.
        function init() {

            var LeafIcon = L.Icon.extend({
                options: {
                    shadowUrl: 'leaflet/images/marker-shadow.png'
                }
            });

            var basuraMarker = new LeafIcon({iconUrl: 'leaflet/images/basura-marker.png'}),
                aguaMarker = new LeafIcon({iconUrl: 'leaflet/images/agua-marker.png'}),
                calleMarker = new LeafIcon({iconUrl: 'leaflet/images/calle-marker.png'}),
                luzMarker = new LeafIcon({iconUrl: 'leaflet/images/luz-marker.png'}),
                saludMarker = new LeafIcon({iconUrl: 'leaflet/images/salud-marker.png'}),
                obraMarker = new LeafIcon({iconUrl: 'leaflet/images/obra-marker.png'}),
                pluvialMarker = new LeafIcon({iconUrl: 'leaflet/images/pluvial-marker.png'}),
                seguridadMarker = new LeafIcon({iconUrl: 'leaflet/images/seguridad-marker.png'}),
                gasMarker = new LeafIcon({iconUrl: 'leaflet/images/gas-marker.png'}),
                animalMarker = new LeafIcon({iconUrl: 'leaflet/images/animal-marker.png'}),
                markers = new Array();

            markers['basura'] = basuraMarker;
            markers['agua'] = aguaMarker;
            markers['calle'] = calleMarker;
            markers['luz'] = luzMarker;
            markers['salud'] = saludMarker;
            markers['obra'] = obraMarker;
            markers['pluvial'] = pluvialMarker;
            markers['seguridad'] = seguridadMarker;
            markers['gas'] = gasMarker;
            markers['animal'] = animalMarker;

            // Creates Claim Map.
            if ($('#create-claim-map').length) {
                map = L.map('create-claim-map');

                L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors',
                    maxZoom: 18
                }).addTo(map);

                map.attributionControl.setPrefix(''); // Don't show the 'Powered by Leaflet' text. Attribution overload

                map.setView([actualLatitude, actualLongitude], 16);
                map.on('click', onMapClick);
            }


            // Creates the Claims Index Map.
            if ($('#claims-index-map').length) {
                claimIndexMap = L.map('claims-index-map').setView(lapaz, 14);

                L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors',
                    maxZoom: 18
                }).addTo(claimIndexMap);

                $('.claim-title').each(function () {
                    var someMarker = L.marker([$(this).data('latitude'), $(this).data('longitude')], {icon: markers[$(this).data('class')]}).addTo(claimIndexMap);
                    someMarker.bindPopup('<a href="' + $(this).data('url') + '"><b>' + $(this).data('title') + '</b></a>');
                });
            }

            if ($('#show-claim-map').length) {

              // The positions added to this vars is because the pin need to be in the middle of the screen.
                var latitudeDelta = screen.width / -136600000,
                  longitudeDelta = screen.height / 153600,
                  $claimTitle = $('#claim-title'),
                  latitude = $claimTitle.data('latitude'),
                  longitude = $claimTitle.data('longitude');

              // Validation if the device isn't a mobile device.
              if (screen.width >= 768) {
                latitude += latitudeDelta;
                longitude += longitudeDelta;
              }

                claimIndexMap = L.map('show-claim-map').setView([latitude, longitude], 17);

                L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors',
                    maxZoom: 18
                }).addTo(claimIndexMap);

                var someMarker = L.marker([$claimTitle.data('latitude'), $claimTitle.data('longitude')]).addTo(claimIndexMap);
                someMarker.bindPopup('<a href="' + $claimTitle.data('url') + '"><b>' + $claimTitle.data('title') + '</b></a>');
            }

        }
        // Call to the init function
        init();
    });
})(jQuery);