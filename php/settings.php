<?php

/***************************************************************************
php settings for urlcapabilities

                             -------------------
begin                : 2012-03-12 
copyright            : (C) 2012-2014 by luca delucchi
email                : lucadeluge@gmail.com 
 ***************************************************************************/

/***************************************************************************
 *                                                                         *
 *   This program is free software; you can redistribute it and/or modify  *
 *   it under the terms of the GNU General Public License as published by  *
 *   the Free Software Foundation; either version 2 of the License.    *
 *                                                                         *
 ***************************************************************************/

# Set here the path to epsg file. If you install proj from packages probably you can
# find it in /usr/share/proj/epsg.
$epsg_path='/usr/local/share/proj/';

# change $path if you want show the mapfile inside another path
$path="mapfile/";

# The title of your capabilities project
$title="Servizi OGC FEM/IASMA";

# Is pycsw activate in your environment
$pycsw=true;

# Set the available languages (choiches: it, en, es)
$languages=array("it" => "Italian", "en" => "English", "es" => "Espanol");

# Add flags of choosen languages
$lang_flag=true;

# Style file, this should be in css directory (available gray.css, green.css)
$css = "gray.css";

# Image width for preview images
$iwidth = 500;

# Image height for preview images
$iheight = 400;

# Image for icon in web browser tab bar
$ico = "urlcapabilities_logo.ico";
?>
