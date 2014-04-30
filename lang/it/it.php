<?php
$lang = array(
  "intro"       => "La piattaforma GIS & Remote Sensing",
  "Go to urlCapabilities catalogue"         => "Vai al catalogo di urlCapabilities",
  "Layers" => "Livelli",
  "About urlCapabilities" => "Informazioni su urlCapabilities",
  "Powered by" => "Realizzato con",
  "Problem loading layer" => "Errore caricando il livello",
  "Layer" => "Livello",
  "Home page" => "Torna alla pagina principale",
  "Available languages" => "Lingue disponibili",
  "Dependencies" => "Requisiti",
  "To run correctly urlCapabilities you need to install" => "Per eseguire urlCapabilities bisogna installare",
  "How to install urlCapabilities" => "Come installare urlCapabilities",
  "about" => "urlCapabilities è un software scritto in PHP per ottenere infomazioni sui servizi OGC creati utilizzando <a href=\"http://www.mapserver.org\" target=\"_blank\">MapServer</a>. Viene utilizzato PHP Mapscript per leggere i file di configurazione di MapServer (i mapfile) in modo tale da andare a creare il proprio catalogo.<br />urlCapabilities inoltre può creare un Catalogue Service for the Web (CSW) utilizzando <a href=\"http://pycsw.org/\" target=\"_blank\">pycsw</a>, così da essere conforme agli standard OGC",
  "optional, only if you want CSW service" => "opzionale, solo se si vuole il servizio CSW",
  "howtoinstall" => "<li>Scaricare i sorgenti con '<code>git clone https://github.com/lucadelu/pyModis.git</code>' oppure con il bottone in GitHub '<a href=\"https://github.com/lucadelu/urlCapabilities/archive/master.zip\">Download Source</a>'</li> <li>Copiare la cartella urlCapabilities nella directory del vostro server web; nelle distribuzioni derivate da Debian è <code>/var/www</code></li> <li>Rinominare <code>php/settings.php.default</code> in <code>php/settings.php</code></li> <li>Configurare urlCapabilities attraverso <code>php/settings.php</code> (leggere il paragrafo 'Impostazioni di urlCapabilities' per maggiori infomazioni)</li> <li>Copiare o collegare i vostri mapfile in urlCapabilities/mapfile/ (leggere il paragrafo 'Mapfile Settings' per informazioni sui requisiti nei mapfile)</li> <li>Ora è possibile vedere la pagina con un browser web all'indirizzo <a href=\"http://localhost/urlCapabilities/urlcapabilities.php\">http://localhost/urlCapabilities/urlcapabilities.php</a></li>",
  "urlCapabilities Settings" => "Impostazioni di urlCapabilities",
  "Mapfile Settings" => "Impostazioni del mapfile",
  "url_settings" => 'Il file di configurazione di urlCapabilities è <code>php/settings.php</code> (dovreste averlo rinominato o copiato da <code>php/settings.php.default</code>).<br>The following option could be changed:<ul><li><b>$epsg_path</b>: il percorso al file <code>epsg</code> (solitamente in Unix <code>/usr/share/proj</code> o <code>/usr/local/share/proj</code>)</li><li><b>$path</b>: il percorso alla directory che contiene i mapfile (è meglio copiare/collegare i mapfile nella directory di default)</li><li><b>$title</b>: il titolo del progetto di urlCapabilities</li><li><b>$pycsw</b>: true se avete creato un\'istanza di pycsw</li><li><b>$languages</b>: le lingue disponibili per il progetto di urlCapabilities</li></ul>',
  "mapfile_settings" => "Questi sono i requisiti di urlCapabilities per quanto riguarda i mapfile.<br />Il mapfile ha bisogno dell'estensione '.map'.<br />Nella sezione MAP del mapfile sono necessari questi campi:<ul><li>NAME</li></ul>Nella sezione WEB del mapfile invece: <ul><li>wms_onlineresource OR wfs_onlineresource OR wcs_onlineresource OR ows_onlineresource</li> <li>wms_server_version/wms_getcapabilities_version OR/AND wfs_server_version/wfs_getcapabilities_version OR/AN wcs_server_version/wcs_getcapabilities_version</li></ul>",
  "Thanks to" => "Grazie a",
);
?>