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
  <link rel="stylesheet" type="text/css" href="css/<?php echo $css; ?>">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $title; ?></title>
    <script type="text/javascript" src="javascript/jquery-1.7.js"></script>
    <script type="text/javascript" src="javascript/funz.js"></script>
  </head>
  <body style="background-color:#FFFFFF">
    <div class="container" >
      <h1 align="center"><?php echo $lang["About urlCapabilities"]; ?></h1>
      <div><?php echo $lang["about"]; ?></div>
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
	  <?php echo $lang["howtoinstall"]; ?>
	</ul>
      </div>
      <h3 align="center"><?php echo $lang["urlCapabilities Settings"]; ?></h3>
      <div> <?php echo $lang["url_settings"]; ?> </div>
      <h3 align="center"><?php echo $lang["Mapfile Settings"]; ?></h3>
      <div> <?php echo $lang["mapfile_settings"]; ?> </div>
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