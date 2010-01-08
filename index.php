<?php

#print $request
require_once 'php/funz.php';

echo <<<EOD

	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	  <link rel="stylesheet" type="text/css" href="css/gray.css">
	  <head>
	      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	      <title>Servizi OGC FEM/IASMA</title>
	  <script type="text/javascript" src="javascript/funz.js"></script>
	  </head>
 	  <body style="background-color:#FFFFFF">
EOD;

$path="mapfile/";

$mapfiles=getMapfiles($path);
for ($w=0;$w<count($mapfiles);$w++){
    $mapfile = ms_newMapObj($mapfiles[$w]);
    $nomeMapFile=$mapfile->name;
    #$nomeLeft="left".str_replace(" ","",$nomeMapFile);
    #$nomeRight="right".str_replace(" ","",$nomeMapFile);
    $contUrl="cont".str_replace(" ","",$nomeMapFile);

    echo '    <div class="container" id="'.$contUrl.'"><h1 align="center">'.$nomeMapFile.'</h1>
		<div class="left"><h4><u>Layers:</u></h4>
		<ul id="multi">';
    $nameLayers=getLayersName($mapfile);
    for ($i=0;$i<count($nameLayers);$i++){
	echo "<li>".$nameLayers[$i]."</li>";
    }
    $richiesta=getRequestCapabilities($mapfile);
    $url=getUrl($mapfile);
    $urlMappa=getMap($mapfile,9);
    $nomeUrl="url".str_replace(" ","",$nomeMapFile);
    echo '</ul>
	       </div>
	       <div class="right"><img src="'.$urlMappa.'" align="middle"></div>
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