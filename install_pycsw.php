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

require_once 'php/funz.php';
require_once "php/settings.php";
include "php/language.php"
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <?php echo set_header($title, $css, $ico); ?>
  </head>
  <body>
<?php

$step = (isset($_GET['step']) && $_GET['step'] != '') ? $_GET['step'] : '';
switch($step){
  case '1':
  step_1($lang);
  break;
  case '2':
  step_2($lang);
  break;
  case '3':
  step_3($lang);
  break;
  case '4':
  step_4($lang, $path);
  break;
  case '5':
  step_5($lang);
  break;
  default:
  step_1($lang);
}
?>

<?php
function step_1($lang){
?>
 <h1 align="center"><?php echo $lang["pycsw installation script"]; ?></h1>
 <h3><?php printf($lang["Step %s of %s"], '1', '5'); ?></h3>
 <form action="install_pycsw.php?step=1" method="post">
 <p>
  <?php echo $lang["Please copy or rename <code>".getcwd()."/pycsw/default-sample.cfg</code> to <code>".getcwd()."/pycsw/default.cfg</code> and modify it."]; ?>
  <br />
  <?php echo $lang["The required fields to modify are the following (with suggested default values):"]; ?>
  <ul>
    <li>
      <?php echo $lang["into [server] section:"];
      echo "<ul><li><b>home</b>: ".getcwd()."/pycsw</li><li><b>url</b>: http://". $_SERVER['HTTP_HOST'].str_replace("install_pycsw.php", "pycsw",$_SERVER["REQUEST_URI"])."</li></ul>"
      ?>
    </li>
    <li>
      <?php echo $lang["into [manager] section:"]; ?>
      <ul>
	<li>
	  <b>transactions</b>: true
	</li>
      </ul>
    </li>
    <li>
      <?php echo $lang["into [repository] section:"];
      echo "<ul><li><b>database</b>: sqlite:///".getcwd()."/pycsw/records.db</li></ul></li></ul>For additional info read the <a href=\"http://pycsw.org/docs/1.8.0/configuration.html\" target=\"_blank\">pycsw's documentation</a>.";
      ?>
    </li>
  </ul>
  <br /><br />
  <?php echo $lang["Please mark the checkbox and click on 'continue' button for the next step"]; ?>  
  <input type="checkbox" name="agree" />
 </p>

<?php
 if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['agree'])){
  header('Location: install_pycsw.php?step=2');
  exit;
 }
 if($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['agree'])){
  echo "<p class='warning'>".$lang["Please agree to continue"].".</p>";
 }
?>
  <input type="submit" value=<?php echo $lang["Continue"]; ?> />
 </form>
<?php
}

function step_2($lang){
?>
 <h1 align="center"><?php echo $lang["pycsw installation script"]; ?></h1>
 <h3><?php printf($lang["Step %s of %s"], '2', '5'); ?></h3>
 <form action="install_pycsw.php?step=2" method="post">
 <p>
  <?php echo $lang["Next step will setup the database for pycsw."]; echo " "; echo $lang["A SQLite database will be created into directory <code>".getcwd()."/pycsw</code> (if you used the suggested path in <b>database</b> option)."]; ?>
  <br />
  <em><?php echo $lang["Please check the write permission for 'Apache' user in ".getcwd()."/pycsw before continue."] ?></em>
  <br /><br />
  <?php echo $lang["Please mark the checkbox and click on 'continue' button for the next step"]; ?>
  <input type="checkbox" name="agree" />
 </p>

<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['agree'])){
    if(cmd_exists("pycsw-admin.py")) {
      $output = system("pycsw-admin.py -c setup_db -f pycsw/default.cfg", $return);
    } else {
      echo "<p class='warning'>".$lang["Please install"]." pycsw.</p>";
    }
    if ($return == 0) {
      header('Location: install_pycsw.php?step=3');
      exit;
    } else {
      echo "<p class='warning'>".$lang["An error occurred during the setup of the database. Please check the Apache log file"].".</p>";
    }
  }
  if($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['agree'])){
    echo "<p class='warning'>".$lang["Please agree to continue"].".</p>";
  }
?>
  <input type="submit" value=<?php echo $lang["Continue"]; ?> />
 </form>
<?php
}

function step_3($lang){
?>
 <h1 align="center"><?php echo $lang["pycsw installation script"]; ?></h1>
 <h3><?php printf($lang["Step %s of %s"], '3', '5'); ?></h3>
 <form action="install_pycsw.php?step=3" method="post">
 <p>
  <?php echo "
  ".$lang["Now you have to add the following line to Apache configuration file"]."<br />
  <pre><code>
  WSGIScriptAlias ".str_replace("http://".$_SERVER["SERVER_NAME"], "", curpageurl())."pycsw  ".getcwd()."/pycsw/csw.wsgi<br />  ".htmlentities(
  "<Directory ".getcwd()."/pycsw>
      Order deny,allow
      Allow from all
  </Directory>")."
  </code></pre>
  <i>".$lang["Please enable module wsgi and restart Apache"]."</i><br /><br />
  ".$lang["Please mark the checkbox and click on 'continue' button for the next step"]."
  <input type=\"checkbox\" name=\"agree\" />
 </p>";

  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['agree'])){
    header('Location: install_pycsw.php?step=4');
    exit;
  }
  if($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['agree'])){
    echo "<p class='warning'>".$lang["Please agree to continue"].".</p>";
  }
?>
  <input type="submit" value=<?php echo $lang["Continue"]; ?> />
 </form>
<?php
}

function step_4($lang, $path){
?>
 <h1 align="center"><?php echo $lang["pycsw installation script"]; ?></h1>
 <h3><?php printf($lang["Step %s of %s"], '4', '5'); ?></h3>
 <form action="install_pycsw.php?step=4" method="post">
 <p>
  <?php echo $lang["Next step is to harvest your services."]; echo " "; echo $lang["The directory <code>".getcwd()."/$path</code> will be used to read the mapfiles."]; ?>
  <br />
  <?php echo "<p>".$lang["pycsw_url"]."</p><input value=\"".curpageurl()."pycsw\" name=\"urlpycsw\" size=\"60\"/>"; ?>
  <br /><br />
  <?php echo $lang["Please mark the checkbox and click on 'continue' button for the next step"]; ?>
  <input type="checkbox" name="agree" />
 </p>

<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['agree']) && isset($_POST['urlpycsw'])){
    # return all the mapfiles inside the path
    $mapfiles=getMapfiles($path);
    # for each mapfile
    for ($w=0;$w<count($mapfiles);$w++) {
	#create a new mapfile object
	$mapfile = ms_newMapObj($mapfiles[$w]);
	$url = getUrl($mapfile);
	$string = '<?xml version="1.0" encoding="UTF-8"?>
<Harvest xmlns="http://www.opengis.net/cat/csw/2.0.2" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.opengis.net/cat/csw/2.0.2 http://schemas.opengis.net/csw/2.0.2/CSW-publication.xsd" service="CSW" version="2.0.2">
  <Source>'.$url.'</Source>
  <ResourceType>http://www.opengis.net/wms</ResourceType>
  <ResourceFormat>application/xml</ResourceFormat>
</Harvest>';
	$file_name = tempnam(sys_get_temp_dir(), 'urlCapabilities');
        file_put_contents($file_name, $string);
        ob_start();
        $output = system("pycsw-admin.py -c post_xml -u ".$_POST['urlpycsw']." -x $file_name");
        ob_clean();
    }
    header('Location: install_pycsw.php?step=5');
    exit;
  }
  if($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['agree'])){
    echo "<p class='warning'>".$lang["Please agree to continue"].".</p>";
  }
?>  
  <input type="submit" value=<?php echo $lang["Continue"]; ?> />
 </form>
<?php
}

function step_5($lang){
?>
 <h1 align="center"><?php echo $lang["pycsw installation script"]; ?></h1>
 <h3><?php printf($lang["Step %s of %s"], '5', '5'); ?></h3>
  <p><?php echo $lang["Installation finished."]; echo "<br />"; echo $lang["You can test `pycsw` using the button `pycsw`."]; echo " "; echo $lang["Clicking on `Finish` you will be redirect to the home page."];echo "<br /><br />"; echo $lang["We suggest to delete the file <code>".getcwd()."/install_pycsw.php</code>"]?></p>
  <?php echo "<button type=\"submit\" value=\"pycsw\" onclick=openUrl(\"".curpageurl()."pycsw/?service=CSW&version=2.0.2&request=GetCapabilities\");>pycsw</button>
  <button type=\"submit\" value=\"Finish\" onclick=openUrl2(\"index.php\");>".$lang["Finish"]."</button>";
  ?>
<?php
}
?>
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