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
    return $proj;
}

function match($what,$where) { 
  $x=file_get_contents($where); 
  $lines=explode("\n",$x);
  for ($i=0;$i<count($lines);$i++){
      $b=preg_match("/{$what}/",$lines[$i]);
      if ($b != null){
          break;
      }
  }
  return $b; 
}

#return the epsg code to do getmap request
function getEpsgCode($map){
    $proj=getProiection($map);
//     echo($proj);
    $matches=strpos($proj,'epsg');
    if ($matches != false){
        $proj_array=explode(":", $proj);
        $epsg=$proj_array[1];
    } else {
        $matches=strpos($proj,'EPSG');
        if ($matches != false){
            $proj_array=explode(":", $proj);
            $epsg=$proj_array[1];
        } else {
//             var_dump(match($proj,$epsgFile));
            $matches=exec("grep '".$proj."' ".$epsgFile."");
            $matches=explode(">", $matches);
            $matches=$matches[0];
            $epsg=str_replace('<', '', $matches);
        }
    }
    return $epsg;
}

#return getCapabilities query
function getRequestCapabilities($map){
    $meta=getMetadati($map);
    if ($meta["wms_onlineresource"] != null) {
	$tipoServer="WMS";
	$request=$meta["wms_onlineresource"]."SERVICE=".$tipoServer."&VERSION=".$meta["wms_server_version"]."&REQUEST=GetCapabilities";
    } elseif ($meta["wfs_onlineresource"] != null) {
	$tipoServer="WFS";
	$request=$meta["wfs_onlineresource"]."SERVICE=".$tipoServer."&VERSION=".$meta["wfs_server_version"]."&REQUEST=GetCapabilities";
    } elseif ($meta["wcs_onlineresource"] != null) {
	$tipoServer="WCS";
	$request=$meta["wcs_onlineresource"]."SERVICE=".$tipoServer."&VERSION=".$meta["wcs_server_version"]."&REQUEST=GetCapabilities";
    }
    return $request;
}

#return url of the web service
function getUrl($map){
    $meta=getMetadati($map);
    if ($meta["wms_onlineresource"] != null) {
	return $meta["wms_onlineresource"];
    } elseif ($meta["wfs_onlineresource"] != null) {
	return $meta["wfs_onlineresource"];
    } elseif ($meta["wcs_onlineresource"] != null) {
	return $meta["wcs_onlineresource"];
    }
}

#return the getmap request for all layers
function getMapAll($map,$epsgFile){
    $requests=array();
    $nLayers=$map->numlayers;
	for ($i=0;$i<$nLayers;$i++) {
       $requests[$i]=getMap($map,$i,$epsgFile);
    }
    return $requests;
}

#return the map of the layer selected by a number. WARNING the layer number start from 0
function getMap($map,$nLayer,$epsgFile){
    $meta=getMetadati($map);
    $names=getLayersName($map);
    $extent=$map->extent;
    $proj=getEpsgCode($map,$epsgFile,$epsgFile);
    if ($meta["wms_onlineresource"] != null) {
        $tipoServer="WMS";
        $request=$meta["wms_onlineresource"]."SERVICE=".$tipoServer."&VERSION=".$meta["wms_server_version"]."&REQUEST=GetMap&LAYERS=".$names[$nLayer]."&STYLES=&SRS=EPSG:".$proj."&CRS=EPSG:".$proj."&BBOX=".$extent->minx.",".$extent->miny.",".$extent->maxx.",".$extent->maxy."&WIDTH=400&HEIGHT=300&FORMAT=image/png";
    } else {
	$tipoServer="WFS";
	$request="";
	#$request=$meta["wms_onlineresource"]."SERVICE=".$tipoServer."&VERSION=".$meta["wms_server_version"]."&REQUEST=GetMap&LAYERS=".$names[$nLayer]."&STYLES=&SRS=".$proj."&BBOX=612485,5059500,730100,5157100&WIDTH=400&HEIGHT=300&FORMAT=image/png";

    }
    return $request;
}

?>