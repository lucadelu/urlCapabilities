<?php
/***************************************************************************
the core of urlCapabilities, it create and show the page with url, the map 
and getCapabilities

                             -------------------
begin                : 2010-01-03 
copyright            : (C) 2009 by luca delucchi
email                : lucadeluge@gmail.com 
 ***************************************************************************/

/***************************************************************************
 *                                                                         *
 *   This program is free software; you can redistribute it and/or modify  *
 *   it under the terms of the GNU General Public License as published by  *
 *   the Free Software Foundation; either version 2 of the License.        *
 *                                                                         *
 ***************************************************************************/

require_once 'php/funz.php';
require_once "php/settings.php";

echo <<<EOD

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
      <link rel="stylesheet" type="text/css" href="css/gray.css">
      <head>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
          <title>Servizi OGC FEM/IASMA</title>
      <script type="text/javascript" src="javascript/funz.js"></script>
      <script type="text/javascript" src="javascript/jquery-1.7.js"></script>
      </head>
       <body style="background-color:#FFFFFF">
EOD;
# change $path if you want show the mapfile inside another path
$path="mapfile/";
# return all the mapfiles inside the path 
$mapfiles=getMapfiles($path);
# for each mapfile
for ($w=0;$w<count($mapfiles);$w++){
    #create a new mapfile object
    $mapfile = ms_newMapObj($mapfiles[$w]);
    #mapfile name
    $nomeMapFile=$mapfile->name;
    #name for the id container
    $contUrl="cont".str_replace(" ","",$nomeMapFile);

    echo '    <div class="container" id="'.$contUrl.'"><h1 align="center">'.$nomeMapFile.'</h1>
        <div class="left"><h4><u>Layers:</u></h4>
        <ul id="multi">';
    #names of layers
    $nameLayers=getLayersName($mapfile);
    $numberLayers=count($nameLayers);
    #show the layers name in a list
    for ($i=0;$i<$numberLayers;$i++){
	$descr=describeLayer($mapfile, $nameLayers[$i]);
        echo '<li><a target="_blank" href="'.$descr.'">'.$nameLayers[$i].'</a></li>';
    }
    #create getCapabilities string
    $richiesta=getRequestCapabilities($mapfile);
    #create url string
    $url=getUrl($mapfile);
    #create map string, it use getMap for the first layer
    $n=rand(0,$numberLayers-1);
    $urlMappa=getMap($mapfile,$n,$epsg_path);
    #####################
    # TODO
    # add function to rotate images
    # decommented for error in log file
    $urlsMappe=getMapAll($mapfile,$epsg_path);
    $urlsMappeJS=join("\", \"", $urlsMappe);
    ############################
    #name for the id url
    #echo $urlMappa;
    $nomeUrl="url".str_replace(" ","",$nomeMapFile);
    echo '</ul>
          </div>
          <div class="right"><img src="'.$urlMappa.'" align="middle" id="map'.$nomeMapFile.'"><br />Layer: '.$nameLayers[$n].'</div>
          <!--<script>
                var urlsArray = ["'.$urlsMappeJS.'"];
                var i, imgid, url;
                maximage=urlsArray.length;
                imgid=$("map'.$nomeMapFile.'")
                for (i=1;i<maximage;i++){
                    url=urlsArray[i];
                    sleep(20000);
                    imgid.attr("src",url) ;
                    console.log(url,i);        
                }
          </script>-->
          <div class="buttons">
               <input type="button" value="getCapabilities" target="_blank" onclick=getCapabilities("'.$richiesta.'");>
               <input type="button" value="getUrl" target="_blank" onclick=getUrl("'.$url.'","'.$nomeUrl.'");>
          </div>
          <div id="'.$nomeUrl.'" class="url"></div>
          <div class="separation"> </div>
        </div>';
}
echo <<<EOD
      </body>
    </html>
EOD;

?>
