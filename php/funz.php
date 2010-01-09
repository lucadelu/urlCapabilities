<?php

/***************************************************************************
php functions for index.php

                             -------------------
begin                : 2010-01-03 
copyright            : (C) 2009 by luca delucchi
email                : lucadeluge@gmail.com 
 ***************************************************************************/

/***************************************************************************
 *                                                                         *
 *   This program is free software; you can redistribute it and/or modify  *
 *   it under the terms of the GNU General Public License as published by  *
 *   the Free Software Foundation; either version 2 of the License.	   *
 *                                                                         *
 ***************************************************************************/

#return mapfile/s's name inside mapfile path
function getMapfiles($path){
    $mapfiles=array();
    $x=0;
    foreach (glob("$path*.map") as $NAME) {
	$mapfiles[$x]=$NAME;
	$x++;
    }
    return $mapfiles;
}

#return web metadata for the query string
function getMetadati($map){
    $web=$map->web;
    $hashTable = $web->metadata;
    $key = null;
    $metadati=array();
    while ($key = $hashTable->nextkey($key))
	$metadati[$key]=$hashTable->get($key);
    return $metadati;
}

#return layer/s's name of a mapfile 
function getLayersName($map){
    $nLayers=$map->numlayers;
    $names=array();
    for ($i=0;$i<$nLayers;$i++){
	$Layer= $map->getLayer($i);
	$names[$i]=$Layer->name;
    }
    return $names;
}

#return the projection of the mapfile
function getProiection($map){
    $proj=$map->getProjection();
    $epsg=explode("=",$proj);
    return $epsg[1];
}

#return getCapabilities query
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

#return url of the web service
function getUrl($map){
    $meta=getMetadati($map);
    if ($meta["wms_onlineresource"] != null) {
	return $meta["wms_onlineresource"];
    } else {
	return $meta["wfs_onlineresource"];
    }
}

#return the map of first correct layer
function getMapAll($map){
    $meta=getMetadati($map);
    $names=getLayersName($map);
    $proj=getProiection($map);
    $nLayers=$map->numlayers;
    if ($meta["wms_onlineresource"] != null) {
	$tipoServer="WMS";
	for ($i=0;$i<$nLayers;$i++) {
		$req=$meta["wms_onlineresource"]."SERVICE=".$tipoServer."&VERSION=".$meta["wms_server_version"]."&REQUEST=GetMap&LAYERS=".$names[$i]."&STYLES=&SRS=".$proj."&BBOX=612485,5059500,730100,5157100&WIDTH=400&HEIGHT=300&FORMAT=image/png";
		$ritorno=get_headers($req,1);
		$type=explode("/", $ritorno['Content-Type']);
		if ($type[0]=='image') {
			$request=$meta["wms_onlineresource"]."SERVICE=".$tipoServer."&VERSION=".$meta["wms_server_version"]."&REQUEST=GetMap&LAYERS=".$names[$i]."&STYLES=&SRS=".$proj."&BBOX=612485,5059500,730100,5157100&WIDTH=400&HEIGHT=300&FORMAT=image/png";
			break;
		} else {
		}
	}
    } else {
	$tipoServer="WFS";
	$request="";
	#$request=$meta["wms_onlineresource"]."SERVICE=".$tipoServer."&VERSION=".$meta["wms_server_version"]."&REQUEST=GetMap&LAYERS=".$names[0]."&STYLES=&SRS=".$proj."&BBOX=612485,5059500,730100,5157100&WIDTH=400&HEIGHT=300&FORMAT=image/png";

    }
    return $request;
}

#return the map of the layer selected by a number. WARNING the layer number start from 0
function getMap($map,$nLayer){
    $meta=getMetadati($map);
    $names=getLayersName($map);
    $proj=getProiection($map);
    if ($meta["wms_onlineresource"] != null) {
	$tipoServer="WMS";
	$request=$meta["wms_onlineresource"]."SERVICE=".$tipoServer."&VERSION=".$meta["wms_server_version"]."&REQUEST=GetMap&LAYERS=".$names[$nLayer]."&STYLES=&SRS=".$proj."&BBOX=612485,5059500,730100,5157100&WIDTH=400&HEIGHT=300&FORMAT=image/png";
    } else {
	$tipoServer="WFS";
	$request="";
	#$request=$meta["wms_onlineresource"]."SERVICE=".$tipoServer."&VERSION=".$meta["wms_server_version"]."&REQUEST=GetMap&LAYERS=".$names[$nLayer]."&STYLES=&SRS=".$proj."&BBOX=612485,5059500,730100,5157100&WIDTH=400&HEIGHT=300&FORMAT=image/png";

    }
    return $request;
}

?>