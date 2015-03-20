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

        var map = new OpenLayers.Map('map');
        map.addLayer(new OpenLayers.Layer.OSM());

        var lonLat = new OpenLayers.LonLat(-68.12447, -16.51361)
            .transform(
            new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
            map.getProjectionObject() // to Spherical Mercator Projection
        );

        var zoom = 16;

        var markers = new OpenLayers.Layer.Markers( "Markers" );
        map.addLayer(markers);

        markers.addMarker(new OpenLayers.Marker(lonLat));

        map.setCenter(lonLat, zoom);

        map.events.register("click", map, function (e) {
            var lonlat = map.getLonLatFromPixel(e.xy);
            console.log("You clicked near " + lonlat.lat + " N, " + +lonlat.lon + " E");
        });

        //var wms = new OpenLayers.Layer.WMS(
        //    "OpenLayers WMS",
        //    "http://vmap0.tiles.osgeo.org/wms/vmap0",
        //    {'layers': 'basic'}
        //);
        //map.addLayer(wms);
        //map.zoomToMaxExtent();

    });
})(jQuery);