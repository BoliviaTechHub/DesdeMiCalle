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

        var exampleNS = {};

        exampleNS.getRendererFromQueryString = function() {
            var obj = {}, queryString = location.search.slice(1),
                re = /([^&=]+)=([^&]*)/g, m;

            while (m = re.exec(queryString)) {
                obj[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
            }
            if ('renderers' in obj) {
                return obj['renderers'].split(',');
            } else if ('renderer' in obj) {
                return [obj['renderer']];
            } else {
                return undefined;
            }
        };

        var map = new ol.Map({
            layers: [
                new ol.layer.Tile({
                    source: new ol.source.OSM()
                })
            ],
            controls: ol.control.defaults({
                attributionOptions: /** @type {olx.control.AttributionOptions} */ ({
                    collapsible: false
                })
            }),
            renderer: exampleNS.getRendererFromQueryString(),
            target: 'map',
            view: new ol.View({
                center: [0, 0],
                zoom: 2
            })
        });


    });
})(jQuery);