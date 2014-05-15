<?php
/***************************************************************************
the first page of urlCapabilities, it has link to urlCapabilities main page,
to about page and pycsw infos

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
          <h1 align="center"><?php echo $title; ?></h1>
          <div class="left justify line25" style="padding: 5px;">
<?php
echo $lang["intro"];
?>
    </div>
    <div class="right" style="display: table; #position: relative; overflow: hidden;">
      <div style="display: table-cell; vertical-align: middle;">
	<button class="btnExample" type="submit" onclick=openUrl2('urlcapabilities.php');><img src="img/urlcapabilities_logo.png" width="15" height="22" alt=""/>  <?php echo $lang["Go to urlCapabilities catalogue"]; ?></button>
<?php
  if ($pycsw == true) {
      echo '
	<br /><br /><br />
	<button class="btnExample" type="submit" value="Submit" onclick=getUrl("'.curpageurl().'pycsw/","pycsvurl");><img src="img/logo-pycsw.png" width="20" height="20" alt=""/>  '.$lang["Get url of Catalog Service for the Web"].'</button>
	<br /><br />
	<div id="pycsvurl"></div>
	<br />
	<button class="btnExample" type="submit" value="Submit" onclick=openUrl("'.curpageurl().'pycsw/?service=CSW&version=2.0.2&request=GetCapabilities","pycsvurl");><img src="img/logo-pycsw.png" width="20" height="20" alt=""/>  '.$lang["Get capabilities of Catalog Service for the Web"].'</button>
      ';
  }
?>
	<br /><br /><br />
	<button class="btnExample" type="submit" onclick=openUrl2('about.php');><img src="img/about.jpg" width="20" height="20" alt=""/>  <?php echo $lang["About urlCapabilities"]; ?></button>
      </div>
    </div>
    </div>
    <div class="separation"></div>
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