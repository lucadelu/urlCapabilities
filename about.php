<?php
/***************************************************************************
about page of urlCapabilities

begin                : 2014-04-29
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
require_once "php/settings.php";
require_once "php/funz.php";
include "php/language.php"
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <?php echo set_header($title, $css, $ico); ?>
  </head>
  <body style="background-color:#FFFFFF">
    <div class="container" >
      <h1 align="center"><?php echo $lang["About urlCapabilities"]; ?></h1>
      <div><?php echo $lang["urlCapabilities is a software written in PHP to obtain info about OGC web service created using <a href=\"http://www.mapserver.org\" target=\"_blank\">MapServer</a>."]; echo $lang["It use PHP Mapscript to read MapServer configuration files (mapfile) and create your own catalogue."]?><br /><?php echo $lang["urlCapabilities is able also to create a Catalogue Service for the Web (CSW) using <a href=\"http://pycsw.org/\" target=\"_blank\">pycsw</a>, to be OGC compliance"] ?></div>
      <h3 align="center"><?php echo $lang["Dependencies"]; ?></h3>
      <div><?php echo $lang["To run correctly urlCapabilities you need to install"]; ?>:
	<ul>
	  <li><a href="http://httpd.apache.org/" targer="_blank">Apache</a></li>
	  <li><a href="http://www.php.net/" target="_blank">PHP</a></li>
	  <li><a href="http://mapserver.org/mapscript/php/index.html" target="_blank">PHP-Mapscript</a></li>
	  <li><a href="http://pycsw.org" target="_blank">pycsw</a> (<?php echo $lang["optional, only if you want CSW service"]; ?>)</li>
	</ul>
      </div>
      <h3 align="center"><?php echo $lang["How to install urlCapabilities"]; ?></h3>
      <div>
	<ul>
	  <li><?php echo $lang["Download the source with '<code>git clone https://github.com/lucadelu/pyModis.git</code>' or with the button '<a href=\"https://github.com/lucadelu/urlCapabilities/archive/master.zip\">Download Source</a>' in GitHub"]; ?></li>
	  <li><?php echo $lang["Copy the urlCapabilities folder in your web server directory; in Debian like distributions is <code>/var/www</code>"]; ?></li>
	  <li><?php echo $lang["Rename <code>php/settings.php.default</code> in <code>php/settings.php</code>"]; ?></li>
	  <li><?php echo $lang["Configure urlCapabilities through <code>php/settings.php</code> (please read the 'urlCapabilities Settings' paragraph, for more info)"]; ?></li>
	  <li><?php echo $lang["Copy or link your mapfile/s to urlCapabilities/mapfile/ (please read the 'Mapfile Settings' paragraph, for more info about mapfile requirements)"]; ?></li>
	</ul>
      </div>
      <h3 align="center"><?php echo $lang["urlCapabilities Settings"]; ?></h3>
      <div> <?php echo $lang["The configuration file for urlCapabilities is <code>".getcwd()."/php/settings.php</code> (you should renamed or copied from <code>".getcwd()."/php/settings.php.default</code>)."]; ?><br /> <?php echo $lang["The following option could be changed:"]; ?>
	<ul>
	  <li><?php echo $lang['<b>$epsg_path</b>: the path to <code>epsg</code> file (on Unix usually <code>/usr/share/proj</code> or <code>/usr/local/share/proj</code>)']; ?> </li>
	  <li><?php echo $lang['<b>$path</b>: the path to the directory containing the mapfiles (it is better to copy/link the mapfile in the default directory)']; ?> </li>
	  <li><?php echo $lang['<b>$title</b>: the title of urlCapabilities project']; ?> </li>
	  <li><?php echo $lang['<b>$pycsw</b>: true if you set up pycsw application']; ?> </li>
	  <li><?php echo $lang['<b>$languages</b>: the languages avaible for urlCapabilities project']; ?> </li>
	  <li><?php echo $lang['<b>$lang_flag</b>: true if you want show flags of the choosen languages']; ?> </li>
	  <li><?php echo $lang['<b>$css</b>: the CSS file to use, it must be inside <code>'.getcwd().'/css/</code> directory']; ?> </li>
	</ul>
      </div>
      <h3 align="center"><?php echo $lang["Mapfile Settings"]; ?></h3>
      <div> <?php echo $lang["These are the requirements for urlCapabilities about mapfile."]; ?>
	<ul>
	  <li><?php echo $lang["The mapfile need the '.map' extension."]; ?></li>
	  <li><?php echo $lang["In the MAP object mapfile need these keys:"]; ?>
	    <ul>
	      <li><em>NAME</em></li>
	    </ul>
	  </li>
	  <li><?php echo $lang["In the WEB object mapfile need these keys:"]; ?>
	    <ul>
	      <li>wms_onlineresource <?php echo $lang["OR"]; ?> wfs_onlineresource <?php echo $lang["OR"]; ?> wcs_onlineresource <?php echo $lang["OR"]; ?> ows_onlineresource</li>
	      <li>wms_server_version/wms_getcapabilities_version <?php echo $lang["OR/AND"]; ?> wfs_server_version/wfs_getcapabilities_version <?php echo $lang["OR/AND"]; ?>wcs_server_version/wcs_getcapabilities_version</li>
	    </ul>
	  </li>
	</ul>
      </div>
    </div>
    <div id="footer">
      <table id="footer_table" align="center">
	<tr>
	  <td align="left" width="30%"><a href="index.php"><?php echo $lang["Home page"]; ?></a></td>
	  <td align="center" width="40%"><?php echo $lang["Powered by"]; ?> <a href="https://github.com/lucadelu/urlCapabilities/">urlCapabilities</a></td>
	  <?php echo set_footer($languages, $lang, $lang_flag); ?>
	</tr>
      </table>
    </div>
  </body>
</html>