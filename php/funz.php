<?php

#ritorna i nomi dei mapfile all'interno di una cartella
function getMapfiles($path){
    $mapfiles=array();
    $x=0;
    foreach (glob("$path*.map") as $NAME) {
	$mapfiles[$x]=$NAME;
	$x++;
    }
    return $mapfiles;
}

#ritorna i metadati del web per creare la stringa di query
function getMetadati($map){
    $web=$map->web;
    $hashTable = $web->metadata;
    $key = null;
    $metadati=array();
    while ($key = $hashTable->nextkey($key))
	$metadati[$key]=$hashTable->get($key);
    return $metadati;
}

#ritorna la richiesta del getCapabilities
function getRequestCapabilities($map){
    $meta=getMetadati($map);
    if ($meta["wms_onlineresource"] != null) {
	$tipoServer="WMS";
	$request=$meta["wms_onlineresource"]."SERVICE=".$tipoServer."&VERSION=".$meta["wms_server_version"]."&REQUEST=GetCapabilities";
    } else {
	$tipoServer="WFS";
	$request=$meta["wfs_onlineresource"]."SERVICE=".$tipoServer."&VERSION=".$meta["wfs_server_version"]."&REQUEST=GetCapabilities";
    }
    return $request;
}

#ritorna i nomi dei layers all'interno di un mapfile 
function getLayersName($map){
    $nLayers=$map->numlayers;
    $names=array();
    for ($i=0;$i<$nLayers;$i++){
	$Layer= $map->getLayer($i);
	$names[$i]=$Layer->name;
    }
    return $names;
}

function getUrl($map){
    $meta=getMetadati($map);
    if ($meta["wms_onlineresource"] != null) {
	return $meta["wms_onlineresource"];
    } else {
	return $meta["wfs_onlineresource"];
    }
}

function getProiection($map){
    $proj=$map->getProjection();
    $epsg=explode("=",$proj);
    return $epsg[1];
}

function getMapAll($map){
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

function getMap($map,$nLayer){
    $meta=getMetadati($map);
    $names=getLayersName($map);
    $proj=getProiection($map);
//     print_r($meta);
    if ($meta["wms_onlineresource"] != null) {
	$tipoServer="WMS";
	$request=$meta["wms_onlineresource"]."SERVICE=".$tipoServer."&VERSION=".$meta["wms_server_version"]."&REQUEST=GetMap&LAYERS=".$names[$nLayer]."&STYLES=&SRS=".$proj."&BBOX=612485,5059500,730100,5157100&WIDTH=400&HEIGHT=300&FORMAT=image/png";
/*	$request=$meta["wms_onlineresource"]."SERVICE=".$tipoServer."&VERSION=".$meta["wms_server_version"]."&REQUEST=GetMap";*/
    } else {
	$tipoServer="WFS";
/*	$request=$meta["wfs_onlineresource"]."SERVICE=".$tipoServer."&VERSION=".$meta["wfs_server_version"]."&REQUEST=GetMap";*/
	$request=$meta["wms_onlineresource"]."SERVICE=".$tipoServer."&VERSION=".$meta["wms_server_version"]."&REQUEST=GetMap&LAYERS=".$names[$nLayer]."&STYLES=&SRS=".$proj."&BBOX=612485,5059500,730100,5157100&WIDTH=400&HEIGHT=300&FORMAT=image/png";

    }
    return $request;
}

?>