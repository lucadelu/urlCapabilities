<?php
$lang = array(
  "intro" => "The GIS & Remote Sensing Unit of Fondazione Edmund Mach",
  "Go to urlCapabilities catalogue"  => "Go to urlCapabilities catalogue",
  "Layers" => "Layers",
  "About urlCapabilities" => "About urlCapabilities",
  "Powered by" => "Powered by",
  "Problem loading layer" => "Problem loading layer",
  "Layer" => "Layer",
  "Home page" => "Home page",
  "Available languages" => "Available languages",
  "Dependencies" => "Dependencies",
  "To run correctly urlCapabilities you need to install" => "To run correctly urlCapabilities you need to install",
  "How to install urlCapabilities" => "How to install urlCapabilities",
  "about" => "urlCapabilities is a software written in PHP to obtain info about OGC web service created using <a href=\"http://www.mapserver.org\" target=\"_blank\">MapServer</a>. It use PHP Mapscript to read MapServer configuration files (mapfile) and create your own catalogue. <br /> urlCapabilities is able also to create a Catalogue Service for the Web (CSW) using <a href=\"http://pycsw.org/\" target=\"_blank\">pycsw</a>, to be OGC compliance",
  "optional, only if you want CSW service" => "optional, only if you want CSW service",
  "howtoinstall" => "<li>Download the source with '<code>git clone https://github.com/lucadelu/pyModis.git</code>' or with the button '<a href=\"https://github.com/lucadelu/urlCapabilities/archive/master.zip\">Download Source</a>' in GitHub</li> <li>Copy the urlCapabilities folder in your web server directory; in Debian like distributions is <code>/var/www</code></li> <li>Rename <code>php/settings.php.default</code> in <code>php/settings.php</code></li> <li>Configure urlCapabilities throw <code>php/settings.php</code> (please read the 'urlCapabilities Settings' paragraph, for more info)</li> <li>Copy or link your mapfile/s to urlCapabilities/mapfile/ (please read the 'Mapfile Settings' paragraph, for more info about mapfile requirements)</li> <li>Now you can see the page using a web browser at the address <a href=\"http://localhost/urlCapabilities/urlcapabilities.php\">http://localhost/urlCapabilities/urlcapabilities.php</a></li>",
  "urlCapabilities Settings" => "urlCapabilities Settings",
  "Mapfile Settings" => "Mapfile Settings",
  "url_settings" => 'The configuration file for urlCapabilities is <code>php/settings.php</code> (you should renamed or copied from <code>php/settings.php.default</code>).<br>The following option could be changed:<ul><li><b>$epsg_path</b>: the path to <code>epsg</code> file (on Unix usually <code>/usr/share/proj</code> or <code>/usr/local/share/proj</code>)</li><li><b>$path</b>: the path to the directory containing the mapfiles (it is better to copy/link the mapfile in the default directory)</li><li><b>$title</b>: the title of urlCapabilities project</li><li><b>$pycsw</b>: true if you set up pycsw istance</li><li><b>$languages</b>: the languages avaible for urlCapabilities project</li></ul>',
  "mapfile_settings" => "These are the requirements for urlCapabilities about mapfile.<br />The mapfile need the '.map' extension.<br />In the MAP object mapfile need these keys:<ul><li>NAME</li></ul>In the WEB object mapfile need these keys: <ul><li>wms_onlineresource OR wfs_onlineresource OR wcs_onlineresource OR ows_onlineresource</li> <li>wms_server_version/wms_getcapabilities_version OR/AND wfs_server_version/wfs_getcapabilities_version OR/AN wcs_server_version/wcs_getcapabilities_version</li></ul>",
  "Thanks to" => "Thanks to",
);
?>