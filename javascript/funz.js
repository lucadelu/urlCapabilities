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
function openUrl(web){
    window.open(web, '_blank');
}

// open the getCapabilities query
function openUrl2(web){
    window.open(web, '_parent');
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

function setLang(cod){
    jQuery.ajax({
        url: 'php/language.php',
        type: 'POST',
        data: {
            lang: cod,
        },
        success: function(data, textStatus, xhr) {
	    location.reload();
        },
        error: function(xhr, textStatus, errorThrown) {
            console.log(textStatus.reponseText);
        }
    });
}