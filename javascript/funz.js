/***************************************************************************
Javascript functions for index.php

begin                : 2010-01-03
copyright            : (C) 2009 by luca delucchi
email                : lucadeluge@gmail.com 
 ***************************************************************************/

/***************************************************************************
 *                                                                         *
 *   This program is free software; you can redistribute it and/or modify  *
 *   it under the terms of the GNU General Public License as published by  *
 *   the Free Software Foundation; either version 2 of the License.	   *
 *                                                                         *
 ***************************************************************************/

// open the getCapabilities query
function getCapabilities(web){
    window.open(web, '_blank');
}

// show/hide the url
function getUrl(url,id){
    var e = document.getElementById(id);
    if (e.innerHTML == '') {
        e.innerHTML = url;
    } else {
        e.innerHTML = '';
    }
}
