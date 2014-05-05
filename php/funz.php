<?php

/***************************************************************************
php functions for index.php

                             -------------------
begin                : 2010-01-03 
copyright            : (C) 2009-2014 by luca delucchi
email                : lucadeluge@gmail.com 
 ***************************************************************************/

/***************************************************************************
 *                                                                         *
 *   This program is free software; you can redistribute it and/or modify  *
 *   it under the terms of the GNU General Public License as published by  *
 *   the Free Software Foundation; either version 2 of the License.        *
 *                                                                         *
 ***************************************************************************/

#return mapfile/s's name inside mapfile path
function getMapfiles($path){
    $mapfiles=array();
    $x=0;
    foreach (glob("$path*.map") as $NAME) {
        if (strpos($NAME,'landsat_urlcapabilities.map') == false) {
	  $mapfiles[$x]=$NAME;
	  $x++;
        }
    }
    return $mapfiles;
}

#return web metadata for the query string
function getMetadati($map){
    $web=$map->web;
    $hashTable = $web->metadata;
    $key = null;
    $metadati=array();
    if (count($hashTable) != 0){
        while ($key = $hashTable->nextkey($key)){
            $metadati[$key]=$hashTable->get($key);
        }
    }
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
function getEpsgCode($map,$epsgFile){
    $proj=getProiection($map);
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
            $proj_array=explode(" ", $proj);
            $lines = file($epsgFile);
            foreach($lines as $line) {
	       $exists = true;
	       foreach($proj_array as $pr){
	         if (strpos($line,$pr) == false){
		   $exists = false;
		   break;
	         }
	       }
	       if ($exists == false){
	         continue;
	       } else {
	         $matches=explode(">", $line);
		 $matches=$matches[0];
                 $epsg=str_replace('<', '', $matches);
                 break;
	       }
            }
        }
    }
    return $epsg;
}

function getVersion($meta, $tipo){
    $version=null;
    if (array_key_exists("wms_server_version",$meta) && $tipo=="WMS") {
        $version=$meta["wms_server_version"];
    } elseif (array_key_exists("wfs_onlineresource",$meta) && $tipo=="WFS") {
	$version=$meta["wfs_server_version"];
    } elseif (array_key_exists("wfs_service_onlineresource",$meta) && $tipo=="WFS") {
	$version=$meta["wfs_server_version"];
    } elseif (array_key_exists("wcs_onlineresource",$meta) && $tipo=="WCS") {
	$version=$meta["wcs_server_version"];
    } elseif (array_key_exists("ows_onlineresource",$meta)) {
	$version=$meta["ows_server_version"];
    } elseif (array_key_exists("wms_getcapabilities_version",$meta) && $tipo=="WMS") {
        $version=$meta["wms_getcapabilities_version"];
    } elseif (array_key_exists("wfs_getcapabilities_version",$meta) && $tipo=="WFS") {
        $version=$meta["wfs_getcapabilities_version"];
    } elseif (array_key_exists("wcs_getcapabilities_version",$meta) && $tipo=="WCS") {
        $version=$meta["wcs_getcapabilities_version"];
    } elseif (array_key_exists("ows_getcapabilities_version",$meta)) {
        $version=$meta["ows_getcapabilities_version"];
    }
    if (is_null($version) == true){
	if ($tipo=="WMS") {
	    $version='1.3.0';
	} elseif ($tipo=="WFS") {
	    $version='1.1.0';
	}
    }
    return $version;
}

function getService($meta){
    if (array_key_exists("ows_onlineresource",$meta)) {
        $tipoServer="OWS";
    } elseif (array_key_exists("wms_onlineresource",$meta)) {
        $tipoServer="WMS";
    } elseif (array_key_exists("wfs_onlineresource",$meta)) {
        $tipoServer="WFS";
    } elseif (array_key_exists("wcs_onlineresource",$meta)) {
        $tipoServer="WCS";
    }
    return $tipoServer;
}

#return getCapabilities query
function getRequestCapabilities($map, $type=null){
    $meta=getMetadati($map);
    if (is_null($type) == true){
	$tipoServer=getService($meta);
	if ($tipoServer == "OWS") {
	    $tipoServer="WMS";
	}
    } else {
	$tipoServer=$type;
    }
    $version=getVersion($meta,$tipoServer);
    $url=getUrl($map);
    $request=$url."SERVICE=".$tipoServer."&VERSION=".$version."&REQUEST=GetCapabilities";
    return $request;
}

#return url of the web service
function getUrl($map){
    $meta=getMetadati($map);
    if (array_key_exists("ows_onlineresource",$meta)) {
        return $meta["ows_onlineresource"];
    } elseif (array_key_exists("wms_onlineresource",$meta)) {
        return $meta["wms_onlineresource"];
    } elseif (array_key_exists("wfs_onlineresource",$meta)) {
        return $meta["wfs_onlineresource"];
    } elseif (array_key_exists("wcs_onlineresource",$meta)) {
        return $meta["wcs_onlineresource"];
    }
}

#clean the url of the web service for a good getmap request
function cleanUrl($url){
    if (strpos($url,'?map=') or strpos($url,'?MAP=')){
        if (substr($url, -1) == '&'){
	    return $url;
        } else {
	    return $url.'&';
        }
    } else {
        if (substr($url, -1) == '?'){
	    return $url;
        } else {
	    return $url.'?';
        }
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

function describeLayer($map,$layername,$type=null){
    $meta=getMetadati($map);
    if (is_null($type) == true){
	$tipoServer=getService($meta);
	if ($tipoServer == "OWS") {
	    $tipoServer="WMS";
	}
    } else {
	$tipoServer=$type;
    }
    $version=getVersion($meta,$tipoServer);
    $url=getUrl($map);
    if ($tipoServer == 'WMS'){
	$request="DescribeLayer";
	$par="LAYERS";
    } elseif ($tipoServer == 'WFS') {
	$request="DescribeFeatureType";
	$par="TYPENAME";
    } elseif ($tipoServer == 'WCS') {
	$request="DescribeCoverage";
	$par="COVERAGE";
    }
    if (($tipoServer == 'WMS') and ($version == '1.3.0')){
	$req=$url."SERVICE=".$tipoServer."&VERSION=".$version."&REQUEST=".$request."&".$par."=".$layername."&SLD_VERSION=1.1.0";
    } else {
	$req=$url."SERVICE=".$tipoServer."&VERSION=".$version."&REQUEST=".$request."&".$par."=".$layername;
    }
    return $req;
}

#return the map of the layer selected by a number. WARNING the layer number start from 0
function getMap($map,$nLayer,$epsgFile){
    $meta=getMetadati($map);
    $names=getLayersName($map);
    $extent=$map->extent;
    $proj=getEpsgCode($map,$epsgFile);
    $tipoServer="WMS";
    $version=getVersion($meta,$tipoServer);
    if (array_key_exists("wms_onlineresource",$meta)) {
        $request=cleanUrl($meta["wms_onlineresource"])."SERVICE=".$tipoServer."&VERSION=".$version."&REQUEST=GetMap&LAYERS=".$names[$nLayer]."&STYLES=&SRS=EPSG:".$proj."&CRS=EPSG:".$proj."&BBOX=".$extent->minx.",".$extent->miny.",".$extent->maxx.",".$extent->maxy."&WIDTH=400&HEIGHT=300&FORMAT=image/png";
    } elseif (array_key_exists("ows_onlineresource",$meta)) {
        $request=cleanUrl($meta["ows_onlineresource"])."SERVICE=".$tipoServer."&VERSION=".$version."&REQUEST=GetMap&LAYERS=".$names[$nLayer]."&STYLES=&SRS=EPSG:".$proj."&CRS=EPSG:".$proj."&BBOX=".$extent->minx.",".$extent->miny.",".$extent->maxx.",".$extent->maxy."&WIDTH=400&HEIGHT=300&FORMAT=image/png";
    } else {
        foreach ($names as $NAME) {
            $layer = $map->getLayerByName($NAME);
            $layer->set('status', MS_OFF);
        }
        $layer = $map->getLayerByName($names[$nLayer]);
        $layer->set('status', MS_ON);
        $image=$map->draw();
        if(!file_exists($image->imagepath)){
	    mkdir($image->imagepath);
        }
        $request=$image->saveWebImage();
    }
    return $request;
}

function curpageurl() {
 $pageURL = 'http';
 if (strpos($_SERVER["REQUEST_URI"], '.php') == false) {
    $uri = $_SERVER["REQUEST_URI"];
 } else {
    $tmp = explode('/', $_SERVER["REQUEST_URI"]);
    array_pop($tmp);
    $uri = implode("/", $tmp);
    $uri .= "/";
 }
 if (array_key_exists("HTTPS",$_SERVER)) {
    if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 }
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
    $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$uri;
 } else {
    $pageURL .= $_SERVER["SERVER_NAME"].$uri;
 }
 return $pageURL;
}

function cmd_exists($command)
{
    if (\strtolower(\substr(PHP_OS, 0, 3)) === 'win')
    {
        $fp = \popen("where $command", "r");
        $result = \fgets($fp, 255);
        $exists = ! \preg_match('#Could not find files#', $result);
        \pclose($fp);
    }
    else # non-Windows
    {
        $fp = \popen("which $command", "r");
        $result = \fgets($fp, 255);
        $exists = ! empty($result);
        \pclose($fp);
    }

    return $exists;
}

function set_footer($languages, $lang, $lang_flag)
{
    $ret = "";
    if (count($languages) > 0) {
	$ret = $ret."<td style=\"text-align:right;\" width=\"40%\">".$lang["Available languages"].":";
	foreach ($languages as $key => $value) {
	  $flag='';
	  if ($lang_flag == true) {
	      $flag="<img src=\"img/lang/$key.png\" />  ";
	  }
	  $ret = $ret." <a href=\"javascript:setLang('$key')\">$flag$value</a>";
	}
	$ret = $ret."</td>";
    }
    return $ret;
}

?>
