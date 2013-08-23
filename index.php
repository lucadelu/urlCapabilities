<?php
/***************************************************************************
the core of urlCapabilities, it create and show the page with url, the map 
and getCapabilities

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

?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
      <link rel="stylesheet" type="text/css" href="css/gray.css">
      <head>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
          <title>Servizi OGC FEM/IASMA</title>
      <script type="text/javascript" src="javascript/funz.js"></script>
      <script type="text/javascript" src="javascript/jquery-1.7.js"></script>
      <script type="text/javascript" src="javascript/spin.min.js"></script>
      <script>
	$(function(){
	  var $lis = $('ul#multi li');
	  var $spinner = $('.loader');

	  var spinneropts = {
	    lines: 13, // The number of lines to draw
	    length: 20, // The length of each line
	    width: 10, // The line thickness
	    radius: 30, // The radius of the inner circle
	    corners: 1, // Corner roundness (0..1)
	    rotate: 0, // The rotation offset
	    direction: 1, // 1: clockwise, -1: counterclockwise
	    color: '#000', // #rgb or #rrggbb or array of colors
	    speed: 1, // Rounds per second
	    trail: 60, // Afterglow percentage
	    shadow: false, // Whether to render a shadow
	    hwaccel: false, // Whether to use hardware acceleration
	    className: 'spinner', // The CSS class to assign to the spinner
	    zIndex: 2e9, // The z-index (defaults to 2000000000)
	    top: '150', // Top position relative to parent in px
	    left: 'auto' // Left position relative to parent in px
	  };

	  $spinner.each(function(i,el){
	      // console.debug(el);
	      var spinner = new Spinner(spinneropts).spin(el);
	      $(el).hide();
	  })

  //400:300 = 480:360


	  $lis.click(function(){

	      var $this = $(this);
	      var $box = $this.parent().parent().parent();
	      var $map = $box.find('.map');
	      var offset = $map.parent().offset();

	      $box.find('.loader')/*.css({left:(offset.left+150)+'px', top:(offset.top+200)+'px'})*/.show();

	      $box.find('li.selected').removeClass('selected');
	      var layer = $this.addClass('selected').text();

	      var url = $this.data('image');
	      //var url = baseurl+'?SERVICE=WMS&VERSION=1.1.1&REQUEST=GetMap&LAYERS='+layer+'&STYLES=&SRS=EPSG:3857&CRS=EPSG:3857&BBOX=1813286.53,5827067.74,2037363.578,5963524.294&WIDTH=400&HEIGHT=300&FORMAT=image/png'
	      $box.find('.layername').html(layer+' - <span>Loading...</span>');

	      $map.attr('src',url).load(function(){
		$box.find('.layername').text(layer);
		$box.find('.loader').hide();
	      });

	  });

	  $('ul#multi>li:first-child').trigger('click');
	});
      </script>
      </head>
       <body style="background-color:#FFFFFF">

<?
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
     $torder = array();
     #show the layers name in a list
     for ($i=0;$i<$numberLayers;$i++){
         $thismap=getMap($mapfile,$i,$epsg_path);
         $torder[$nameLayers[$i]] = "<li data-image=\"$thismap\">".$nameLayers[$i]."</li>";
     }

     uksort( $torder, 'strnatcmp');
     echo implode("\r\n", $torder);

    #create getCapabilities string
    $richiesta=getRequestCapabilities($mapfile);
    #create url string
    $url=getUrl($mapfile);

    #name for the id url
    #echo $urlMappa;
    $nomeUrl="url".str_replace(" ","",$nomeMapFile);
    echo '</ul>
          </div>
          <div class="right">
               <div class="loader"></div>
               <img src="" class="map"><br />Layer: <span class="layername"></span>
               <!-- <img src="'.$urlMappa.'" align="middle" id="map'.$nomeMapFile.'"><br />Layer: '.$nameLayers[$n].' -->
          </div>
          <div class="buttons">
               <input type="button" value="getCapabilities" target="_blank" onclick=getCapabilities("'.$richiesta.'");>
               <input type="button" value="getUrl" target="_blank" onclick=getUrl("'.$url.'","'.$nomeUrl.'");>
          </div>
          <div id="'.$nomeUrl.'" class="url"></div>
          <div class="separation"> </div>
        </div>';
}
?>
	<div id="footer">Powered by <a href="https://github.com/lucadelu/urlCapabilities/">urlCapabilities</a></div>
      </body>
    </html>
