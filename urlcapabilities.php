<?php
/***************************************************************************
the core of urlCapabilities, it create and show the page with url, the map 
and getCapabilities

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

require_once 'php/funz.php';
require_once "php/settings.php";
include "php/language.php"
?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
<!--       <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet"> -->
      <link rel="stylesheet" type="text/css" href="css/gray.css">
      <head>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	  <title><?php echo $title; ?></title>
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
	      var spinner = new Spinner(spinneropts).spin(el);
	      $(el).hide();
	  })

	  $lis.click(function(){

	      var $this = $(this);
	      var $box = $this.parent().parent().parent();
	      var $map = $box.find('.map');
	      var offset = $map.parent().offset();
	      $box.find('.loader')/*.css({left:(offset.left+150)+'px', top:(offset.top+200)+'px'})*/.show();

	      $box.find('li.selected').removeClass('selected');
	      var layer = $this.addClass('selected').text();

	      var url = $this.data('image');
	      var desc = $this.data('descr');
	      var desc_wfs = $this.data('descr_wfs');
	      $box.find('.layername').html(layer+' - <span>Loading...</span>');

	      $map.attr('src',url).load([], function(response, status, xhr){
	        if ( status == "error" ) {
		  $box.find('.layername').text('<?php echo $lang["Problem loading layer"]; ?> ' + layer)
		  $box.find('.loader').hide();
	        } else {
		  $box.find('.layername').text(layer);
		  $box.find('.loader').hide();
		  $button=$box.find('.buttons');
		  if ($button.find(".descrLayer").length != 0){
		      $box.find('.descrLayer').remove()
		  }
		  if ($button.find(".descrLayerWFS").length != 0){
		      $box.find('.descrLayerWFS').remove()
		  }
		  if (desc_wfs == null) {
		      $button.append('<input type="button" value="Describe layer ' + layer + '" target="_blank" onclick=openUrl("' + desc + '") class="descrLayer">');
		  } else {
		      $button.append('<input type="button" value="WMS Describe layer ' + layer + '" target="_blank" onclick=openUrl("' + desc + '") class="descrLayer">');
		      $button.append('<input type="button" value="WFS Describe layer ' + layer + '" target="_blank" onclick=openUrl("' + desc_wfs + '") class="descrLayerWFS">');
		  }
		}
	      });
	  });

	  $('ul#multi>li:first-child').trigger('click');
	});
      </script>
      </head>
      <body style="background-color:#FFFFFF">

<?php
# return all the mapfiles inside the path
$mapfiles=getMapfiles($path);
# for each mapfile
for ($w=0;$w<count($mapfiles);$w++){
    #create a new mapfile object
    $mapfile = ms_newMapObj($mapfiles[$w]);
    $meta=getMetadati($mapfile);
    #mapfile name
    $nomeMapFile=$mapfile->name;
    #name for the id container
    $contUrl="cont".str_replace(" ","",$nomeMapFile);
//     $textUrl="text".str_replace(" ","",$nomeMapFile);
//     echo '     <div class="panel-group" id="accordion">
//                    <div class="container panel panel-default" id="'.$contUrl.'"><div class="panel-heading"><h1 align="center" class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#'.$textUrl.'">'.$nomeMapFile.'</a></h1>
//                    <div id="'.$textUrl.'" class="panel-collapse collapse in">
    echo '     <div class="container" id="'.$contUrl.'"><h1 align="center">'.$nomeMapFile.'</h1>
        <div class="left">
           <h4><u>'.$lang["Layers"].':</u></h4>
           <ul id="multi">
           ';
    #names of layers
    $nameLayers=getLayersName($mapfile);
    $numberLayers=count($nameLayers);
    $torder = array();
    $owstype=getService($meta);
    #show the layers name in an order list
    for ($i=0;$i<$numberLayers;$i++){
	$thismap=getMap($mapfile,$i,$epsg_path);
	if ($owstype == "OWS") {
	    $descr=describeLayer($mapfile, $nameLayers[$i], "WMS");
	    $descr_wfs=describeLayer($mapfile, $nameLayers[$i], "WFS");
	    $torder[$nameLayers[$i]] = "    <li data-image=\"$thismap\" data-descr=\"$descr\" data-descr_wfs=\"$descr_wfs\">".$nameLayers[$i]."</li>";
	} else {
	    $descr=describeLayer($mapfile, $nameLayers[$i]);
	    $torder[$nameLayers[$i]] = "    <li data-image=\"$thismap\" data-descr=\"$descr\">".$nameLayers[$i]."</li>";
        }
    }

    uksort( $torder, 'strnatcmp');
    echo implode("\r\n", $torder);

    #create getCapabilities string
    $richiesta=getRequestCapabilities($mapfile);
    #create url string
    $url=getUrl($mapfile);

    #name for the id url
    $nomeUrl="url".str_replace(" ","",$nomeMapFile);
    echo '
           </ul>
        </div>
        <div class="right">
             <div class="loader"></div>
             <img src="" class="map"><br />'.$lang["Layer"].': <span class="layername"></span>
        </div>
        <div class="buttons">
             <input type="button" value="getUrl" target="_blank" onclick=getUrl("'.$url.'","'.$nomeUrl.'");>';
    echo "\n";
    if ($owstype == "OWS") {
	$richiesta=getRequestCapabilities($mapfile,'WMS');
	echo '             <input type="button" value="getCapabilities WMS" target="_blank" onclick=openUrl("'.$richiesta.'");>';
	echo "\n";
	$richiesta=getRequestCapabilities($mapfile,'WFS');
	echo '             <input type="button" value="getCapabilities WFS" target="_blank" onclick=openUrl("'.$richiesta.'");>';
	echo "\n";
    } else {
        $richiesta=getRequestCapabilities($mapfile,'WMS');
	echo '             <input type="button" value="getCapabilities" target="_blank" onclick=openUrl("'.$richiesta.'");>';
	echo "\n";
    }
    echo '
        <br />
        </div>
        <div id="'.$nomeUrl.'" class="url"></div>
        <div class="separation"> </div>
      </div>';
}
?>
    <div id="footer">
      <table id="footer_table" align="center">
	<tr>
	  <td align="left" width="30%"><a href="index.php"><?php echo $lang["Home page"]; ?></a></td>
	  <td align="center" width="40%"><?php echo $lang["Powered by"]; ?> <a href="https://github.com/lucadelu/urlCapabilities/">urlCapabilities</a></td>
	  <td style="text-align:right;" width="40%"><?php echo $lang["Available languages"]; ?>:
	      <?php
	      foreach ($languages as $key => $value) {
		echo " <a href=\"javascript:setLang('$key')\">$value</a>";
	      }
	      ?>
	  </td>
	</tr>
      </table>
    </div>
  </body>
</html>
