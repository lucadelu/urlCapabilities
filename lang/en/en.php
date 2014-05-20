<?php
require_once "php/settings.php";
$lang = array(
  "intro" => "The GIS & Remote Sensing Unit of Fondazione Edmund Mach",
  "Go to urlCapabilities catalogue" => "Go to urlCapabilities catalogue",
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
  "urlCapabilities is a software written in PHP to obtain info about OGC web service created using <a href=\"http://www.mapserver.org\" target=\"_blank\">MapServer</a>." => "urlCapabilities is a software written in PHP to obtain info about OGC web service created using <a href=\"http://www.mapserver.org\" target=\"_blank\">MapServer</a>.",
  "It use PHP Mapscript to read MapServer configuration files (mapfile) and create your own catalogue." => "It use PHP Mapscript to read MapServer configuration files (mapfile) and create your own catalogue.", 
  "urlCapabilities is able also to create a Catalogue Service for the Web (CSW) using <a href=\"http://pycsw.org/\" target=\"_blank\">pycsw</a>, to be OGC compliance" => "urlCapabilities is able also to create a Catalogue Service for the Web (CSW) using <a href=\"http://pycsw.org/\" target=\"_blank\">pycsw</a>, to be OGC compliance",
  "optional, only if you want CSW service" => "optional, only if you want CSW service",
  "Download the source with '<code>git clone https://github.com/lucadelu/pyModis.git</code>' or with the button '<a href=\"https://github.com/lucadelu/urlCapabilities/archive/master.zip\">Download Source</a>' in GitHub" => "Download the source with '<code>git clone https://github.com/lucadelu/pyModis.git</code>' or with the button '<a href=\"https://github.com/lucadelu/urlCapabilities/archive/master.zip\">Download Source</a>' in GitHub",
  "Copy the urlCapabilities folder in your web server directory; in Debian like distributions is <code>/var/www</code>" => "Copy the urlCapabilities folder in your web server directory; in Debian like distributions is <code>/var/www</code>",
  "Rename <code>php/settings.php.default</code> in <code>php/settings.php</code>" => "Rename <code>php/settings.php.default</code> in <code>php/settings.php</code>",
  "Configure urlCapabilities through <code>php/settings.php</code> (please read the 'urlCapabilities Settings' paragraph, for more info)" => "Configure urlCapabilities through <code>php/settings.php</code> (please read the 'urlCapabilities Settings' paragraph, for more info)",
  "Copy or link your mapfile/s to urlCapabilities/mapfile/ (please read the 'Mapfile Settings' paragraph, for more info about mapfile requirements)" => "Copy or link your mapfile/s to urlCapabilities/mapfile/ (please read the 'Mapfile Settings' paragraph, for more info about mapfile requirements)",
  "Now you can see the page using a web browser at the address <a href=\"http://localhost/urlCapabilities/urlcapabilities.php\">http://localhost/urlCapabilities/urlcapabilities.php</a>" => "Now you can see the page using a web browser at the address <a href=\"http://localhost/urlCapabilities/urlcapabilities.php\">http://localhost/urlCapabilities/urlcapabilities.php</a>",
  "urlCapabilities Settings" => "urlCapabilities Settings",
  "Mapfile Settings" => "Mapfile Settings",
  "The configuration file for urlCapabilities is <code>".getcwd()."/php/settings.php</code> (you should renamed or copied from <code>".getcwd()."/php/settings.php.default</code>)." => "The configuration file for urlCapabilities is <code>".getcwd()."/php/settings.php</code> (you should renamed or copied from <code>".getcwd()."/php/settings.php.default</code>).",
  "The following option could be changed:" => "The following option could be changed:",
  '<b>$epsg_path</b>: the path to <code>epsg</code> file (on Unix usually <code>/usr/share/proj</code> or <code>/usr/local/share/proj</code>)' => '<b>$epsg_path</b>: the path to <code>epsg</code> file (on Unix usually <code>/usr/share/proj</code> or <code>/usr/local/share/proj</code>)',
  '<b>$path</b>: the path to the directory containing the mapfiles (it is better to copy/link the mapfile in the default directory)' => '<b>$path</b>: the path to the directory containing the mapfiles (it is better to copy/link the mapfile in the default directory)',
  '<b>$title</b>: the title of urlCapabilities project' => '<b>$title</b>: the title of urlCapabilities project',
  '<b>$pycsw</b>: true if you set up pycsw application' => '<b>$pycsw</b>: true if you set up pycsw application',
  '<b>$languages</b>: the languages avaible for urlCapabilities project' => '<b>$languages</b>: the languages avaible for urlCapabilities project',
  '<b>$lang_flag</b>: true if you want show flags of the choosen languages' => '<b>$lang_flag</b>: true if you want show flags of the choosen languages',
  '<b>$css</b>: the CSS file to use, it must be inside <code>'.getcwd().'/css/</code> directory' => '<b>$css</b>: the CSS file to use, it must be inside <code>'.getcwd().'/css/</code> directory',
  "These are the requirements for urlCapabilities about mapfile." => "These are the requirements for urlCapabilities about mapfile.",
  "The mapfile need the '.map' extension." => "The mapfile need the '.map' extension.",
  "In the MAP object mapfile need these keys:" => "In the MAP object mapfile need these keys:",
  "In the WEB object mapfile need these keys:" => "In the WEB object mapfile need these keys:",
  "Thanks to" => "Thanks to",
  "pycsw installation script" => "pycsw installation script",
  "Please agree to continue" => "Please agree to continue",
  "Please copy or rename <code>".getcwd()."/pycsw/default-sample.cfg</code> to <code>".getcwd()."/pycsw/default.cfg</code> and modify it." => "Please copy or rename <code>".getcwd()."/pycsw/default-sample.cfg</code> to <code>".getcwd()."/pycsw/default.cfg</code> and modify it.",
  "The required fields to modify are the following (with suggested default values):" => "The required fields to modify are the following (with suggested default values):",
  "into [server] section:" => "into [server] section:",
  "into [manager] section:" => "into [manager] section:",
  "into [repository] section" => "into [repository] section",
  "For additional info read the <a href=\"http://pycsw.org/docs/1.8.0/configuration.html\" target=\"_blank\">pycsw's documentation</a>." => "For additional info read the <a href=\"http://pycsw.org/docs/1.8.0/configuration.html\" target=\"_blank\">pycsw's documentation</a>.",
  "Next step will setup the database for pycsw." => "Next step will setup the database for pycsw.",
  "A SQLite database will be created into directory <code>".getcwd()."/pycsw</code> (if you used the suggested path in <b>database</b> option)." => "A SQLite database will be created into directory <code>".getcwd()."/pycsw</code> (if you used the suggested path in <b>database</b> option).", 
  "Please check the write permission for 'Apache' user in ".getcwd()."/pycsw before continue." => "Please check the write permission for 'Apache' user in ".getcwd()."/pycsw before continue.",
  "Please mark the checkbox and click on 'continue' button for the next step" => "Please mark the checkbox and click on 'continue' button for the next step",
  "Please enable module wsgi and restart Apache" => "Please enable module wsgi and restart Apache",
  "Now you have to add the following line to Apache configuration file" => "Now you have to add the following line to Apache configuration file",
  "Next step is to harvest your services." => "Next step is to harvest your services.",
  "The directory <code>".getcwd()."/$path</code> will be used to read the mapfiles." => "The directory <code>".getcwd()."/$path</code> will be used to read the mapfiles.",
  "Installation finished." => "Installation finished.",
  "You can test `pycsw` using the button `pycsw`." => "You can test `pycsw` using the button `pycsw`.",
  "Clicking on `Finish` you will be redirect to the home page." => "Clicking on `Finish` you will be redirect to the home page.",
  "We suggest to delete the file <code>".getcwd()."/install_pycsw.php</code>" => "We suggest to delete the file <code>".getcwd()."/install_pycsw.php</code>",
  "Finish" => "Finish",
  "Continue" => "Continue",
  "An error occurred during the setup of the database. Please check the Apache log file" => "An error occurred during the setup of the database. Please check the Apache log file",
  "Set the url of pycsw service." => "Set the url of pycsw service.",
  "Leave the default value if you used the suggested values in default.cfg file" => "Leave the default value if you used the suggested values in default.cfg file",
  "Get url of Catalog Service for the Web" => "Get url of Catalog Service for the Web",
  "Get capabilities of Catalog Service for the Web" => "Get capabilities of Catalog Service for the Web",
  "pycsw update script" => "pycsw update script",
  "Step %s of %s" => "Step %s of %s",
  "Help" => "Help",
  "Click on layer name for preview and more info about that layer" => "Click on layer name for preview and more info about that layer",
  "OR" => "OR",
  "OR/AND" => "OR/AND",
);
?>