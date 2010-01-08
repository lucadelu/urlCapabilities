function getCapabilities(web){
    location.href=web;
}

function getUrl(url,id){
    var e = document.getElementById(id);
    if (e.innerHTML == '') {
        e.innerHTML = url;
    } else {
        e.innerHTML = '';
    }
}