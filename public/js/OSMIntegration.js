/**
 * Created by jhtan on 3/9/15.
 */

// Fuck you OL
(function ($) {
    "use strict";
    $(document).ready(function () {
        var marker, map, claimIndexMap,
            lapaz = new L.LatLng(-16.51361, -68.12447),
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
            // La Paz City latitude and longitude.

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
                    var someMarker = L.marker([$(this).data('latitude'), $(this).data('longitude')]).addTo(claimIndexMap);
                    someMarker.bindPopup('<a href="' + $(this).data('url') + '"><b>' + $(this).data('title') + '</b></a>');
                });
            }

            if ($('#show-claim-map').length) {
                var $claimTitle = $('#claim-title');
                claimIndexMap = L.map('show-claim-map').setView([$claimTitle.data('latitude'), $claimTitle.data('longitude')], 17);

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