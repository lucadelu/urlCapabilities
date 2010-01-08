<?php
function getMap($map){
    $meta=getMetadati($map);
    $names=getLayersName($map);
    $proj=getProiection($map);
    $nLayers=$map->numlayers;
    if ($meta["wms_onlineresource"] != null) {
	$tipoServer="WMS";
	for ($i=0;$i<$nLayers;$i++) {
		$request=$meta["wms_onlineresource"]."SERVICE=".$tipoServer."&VERSION=".$meta["wms_server_version"]."&REQUEST=GetMap&LAYERS=".$names[$i]."&STYLES=&SRS=".$proj."&BBOX=612485,5059500,730100,5157100&WIDTH=400&HEIGHT=300&FORMAT=image/png";
		$ritorno=get_headers($request,1);
		$type=explode("/", $ritorno['Content-Type']);
		if ($type[0]=='image') {
			break;
		} else {
		}
	}
    } else {
	$tipoServer="WFS";
	$request=$meta["wms_onlineresource"]."SERVICE=".$tipoServer."&VERSION=".$meta["wms_server_version"]."&REQUEST=GetMap&LAYERS=".$names[0]."&STYLES=&SRS=".$proj."&BBOX=612485,5059500,730100,5157100&WIDTH=400&HEIGHT=300&FORMAT=image/png";

    }
    return $request;
}


$richiesta="http://194.105.53.22/cgi-bin/mapserv?map=/home/gis/mapserver/cartocomune_wms.map&SERVICE=WMS&VERSION=1.1.1&REQUEST=GetMap&LAYERS=DTM&STYLES=&SRS=epsg:32632&BBOX=612485,5059500,730100,5157100&WIDTH=400&HEIGHT=300&FORMAT=image/png";

$ritorno=get_headers($richiesta,1);
$type=explode("/", $ritorno['Content-Type']);
if ($type[0]=='image') {
	echo 'immagine';
} else {
	echo 'errore';
}

?>