<?php
/***************************************************************************
the core of urlCapabilities, it create and show the page with url, the map 
and getCapabilities

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
require_once 'php/funz.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <link rel="stylesheet" type="text/css" href="css/gray.css">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
echo "    <title>$title</title>";
?>
    <script type="text/javascript" src="javascript/jquery-1.7.js"></script>
    <script type="text/javascript" src="javascript/funz.js"></script>
  </head>
  <body style="background-color:#FFFFFF">
<?php
echo "    <div class=\"container\" >
         <h1 align=\"center\">$title</h1>";
?>
    <div class="left">
<?php
echo $intro;
?>
    </div>
    <div class="right" style="display: table; #position: relative; overflow: hidden;">
      <div style="display: table-cell; vertical-align: middle;">
      <button class="btnExample" type="submit" onclick=openUrl('urlcapabilities.php');><img src="img/urlcapabilities_logo.png" width="15" height="22" alt=""/>  Vai al catalogo di urlCapabilities</button>
<?php
  if ($pycsw == true) {
      echo '
	<br /><br /><br />
	<button class="btnExample" type="submit" value="Submit" onclick=getUrl("'.curpageurl().'pycsw/","pycsvurl");><img src="img/logo-pycsw.png" width="20" height="20" alt=""/>  Ottieni l\'url del Catalog Service for the Web</button>
	<br /><br />
	<div id="pycsvurl"></div>
	<br />
	<button class="btnExample" type="submit" value="Submit" onclick=openUrl("'.curpageurl().'pycsw/","pycsvurl");><img src="img/logo-pycsw.png" width="20" height="20" alt=""/>  Ottieni le capabilities del Catalog Service for the Web</button>
      ';
  }
?>
    </div>
    </div>
    </div>
    <div id="footer">Powered by <a href="https://github.com/lucadelu/urlCapabilities/">urlCapabilities</a></div>
  </body>
</html>