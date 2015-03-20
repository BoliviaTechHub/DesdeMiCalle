/**
 * Created by jhtan on 3/9/15.
 */

(function ($) {
    "use strict";
    $(document).ready(function () {
//        var map = new ol.Map("map");
//        map.addLayer(new ol.Layer.OSM());
//        map.addLayer(new ol.source.OSM());
//        map.zoomToMaxExtent();



        //var exampleNS = {};
        //
        //exampleNS.getRendererFromQueryString = function() {
        //    var obj = {}, queryString = location.search.slice(1),
        //        re = /([^&=]+)=([^&]*)/g, m;
        //
        //    while (m = re.exec(queryString)) {
        //        obj[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
        //    }
        //    if ('renderers' in obj) {
        //        return obj['renderers'].split(',');
        //    } else if ('renderer' in obj) {
        //        return [obj['renderer']];
        //    } else {
        //        return undefined;
        //    }
        //};
        //
        //var map = new ol.Map({
        //    layers: [
        //        new ol.layer.Tile({
        //            source: new ol.source.OSM()
        //        })
        //    ],
        //    controls: ol.control.defaults({
        //        attributionOptions: /** @type {olx.control.AttributionOptions} */ ({
        //            collapsible: false
        //        })
        //    }),
        //    renderer: exampleNS.getRendererFromQueryString(),
        //    target: 'map',
        //    view: new ol.View({
        //        center: [0, 0],
        //        zoom: 2
        //    })
        //});



        //var map = new ol.Map("map");
        //map.addLayer(new ol.Layer.OSM());
        //
        //var lonLat = new ol.LonLat( -0.1279688 ,51.5077286 )
        //      .transform(
        //        new ol.Projection("EPSG:4326"), // transform from WGS 1984
        //        map.getProjectionObject() // to Spherical Mercator Projection
        //      );
        //
        //var zoom=16;
        //
        //var markers = new ol.Layer.Markers( "Markers" );
        //map.addLayer(markers);
        //
        //markers.addMarker(new ol.Marker(lonLat));
        //
        //map.setCenter (lonLat, zoom);

        ////////////////////////////////////////////////////////////////////////////
        //var map = new OpenLayers.Map('map');
        //map.addLayer(new OpenLayers.Layer.OSM());
        //
        //var lonLat = new OpenLayers.LonLat(-68.12447, -16.51361)
        //    .transform(
        //    new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
        //    map.getProjectionObject() // to Spherical Mercator Projection
        //);
        //
        //var zoom = 16;
        //
        //var markers = new OpenLayers.Layer.Markers( "Markers" );
        //map.addLayer(markers);
        //
        //markers.addMarker(new OpenLayers.Marker(lonLat));
        //
        //map.setCenter(lonLat, zoom);
        //
        //map.events.register("click", map, function (e) {
        //    var lonlat = map.getLonLatFromPixel(e.xy);
        //    console.log("You clicked near " + lonlat.lat + " N, " + +lonlat.lon + " E");
        //});
        ////////////////////////////////////////////////////////////////////////////

        //var wms = new OpenLayers.Layer.WMS(
        //    "OpenLayers WMS",
        //    "http://vmap0.tiles.osgeo.org/wms/vmap0",
        //    {'layers': 'basic'}
        //);
        //map.addLayer(wms);
        //map.zoomToMaxExtent();

        // Fuck you OL
        var marker;
        var map;
        init();

        function init() {
            map = L.map('map');

            //add a tile layer to add to our map, in this case it's the 'standard' OpenStreetMap.org tile server
            L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors',
                maxZoom: 18
            }).addTo(map);

            map.attributionControl.setPrefix(''); // Don't show the 'Powered by Leaflet' text. Attribution overload


            var london = new L.LatLng(-16.51361, -68.12447); // geographical point (longitude and latitude)
            map.setView(london, 14);
            map.on('click', onMapClick);
        }


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

    });
})(jQuery);