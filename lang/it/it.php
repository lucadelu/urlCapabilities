<?php
require_once "php/settings.php";
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
  "To run correctly urlCapabilities you need to install" => "Per eseguire correttamente urlCapabilities bisogna installare",
  "How to install urlCapabilities" => "Come installare urlCapabilities",
  "about" => "urlCapabilities è un software scritto in PHP per ottenere infomazioni sui servizi OGC creati utilizzando <a href=\"http://www.mapserver.org\" target=\"_blank\">MapServer</a>. Viene utilizzato PHP Mapscript per leggere i file di configurazione di MapServer (i mapfile) in modo tale da andare a creare il proprio catalogo.<br />urlCapabilities inoltre può creare un Catalogue Service for the Web (CSW) utilizzando <a href=\"http://pycsw.org/\" target=\"_blank\">pycsw</a>, così da essere conforme agli standard OGC",
  "optional, only if you want CSW service" => "opzionale, solo se si vuole il servizio CSW",
  "howtoinstall" => "<li>Scaricare i sorgenti con '<code>git clone https://github.com/lucadelu/pyModis.git</code>' oppure con il bottone in GitHub '<a href=\"https://github.com/lucadelu/urlCapabilities/archive/master.zip\">Download Source</a>'</li> <li>Copiare la cartella urlCapabilities nella directory del vostro server web; nelle distribuzioni derivate da Debian è <code>/var/www</code></li> <li>Rinominare <code>php/settings.php.default</code> in <code>php/settings.php</code></li> <li>Configurare urlCapabilities attraverso <code>php/settings.php</code> (leggere il paragrafo 'Impostazioni di urlCapabilities' per maggiori infomazioni)</li> <li>Copiare o collegare i vostri mapfile in urlCapabilities/mapfile/ (leggere il paragrafo 'Impostazioni del mapfile' per informazioni sui requisiti nei mapfile)</li> <li>Ora è possibile vedere la pagina con un browser web all'indirizzo <a href=\"http://localhost/urlCapabilities/urlcapabilities.php\">http://localhost/urlCapabilities/urlcapabilities.php</a></li>",
  "urlCapabilities Settings" => "Impostazioni di urlCapabilities",
  "Mapfile Settings" => "Impostazioni del mapfile",
  "url_settings" => 'Il file di configurazione di urlCapabilities è <code>'.getcwd().'/php/settings.php</code> (dovreste averlo rinominato o copiato da <code>'.getcwd().'/php/settings.php.default</code>).<br>Le seguenti opzioni possono essere cambiate:<ul><li><b>$epsg_path</b>: il percorso al file <code>epsg</code> (solitamente in Unix <code>/usr/share/proj</code> o <code>/usr/local/share/proj</code>)</li><li><b>$path</b>: il percorso alla directory che contiene i mapfile (è meglio copiare/collegare i mapfile nella directory di default)</li><li><b>$title</b>: il titolo del progetto di urlCapabilities</li><li><b>$pycsw</b>: true se avete creato un\'istanza di pycsw</li><li><b>$languages</b>: le lingue disponibili per il progetto di urlCapabilities</li><li><b>$lang_flag</b>: true se volete mostrare le bandiere delle lingue scelte</li></ul>',
  "mapfile_settings" => "Questi sono i requisiti di urlCapabilities per quanto riguarda i mapfile.<br />Il mapfile ha bisogno dell'estensione '.map'.<br />Nella sezione MAP del mapfile sono necessari questi campi:<ul><li>NAME</li></ul>Nella sezione WEB del mapfile invece: <ul><li>wms_onlineresource O wfs_onlineresource O wcs_onlineresource O ows_onlineresource</li> <li>wms_server_version/wms_getcapabilities_version O/E wfs_server_version/wfs_getcapabilities_version O/E wcs_server_version/wcs_getcapabilities_version</li></ul>",
  "Thanks to" => "Grazie a",
  "pycsw installation script" => "Script di installazione di pycsw",
  "Please agree to continue" => "Si prega di accettare per continuare",
  "pycsw_default" => "Copiare o rinominare <code>".getcwd()."/pycsw/default-sample.cfg</code> in <code>".getcwd()."/pycsw/default.cfg</code> e modificarlo. <br />I campi obbligatori da impostare sono i seguenti (con i valori di default consigliati):<ul><li>nella sezione [server]:<ul><li><b>home</b>: ".getcwd()."/pycsw</li><li><b>url</b>: http://". $_SERVER['HTTP_HOST'].str_replace("install_pycsw.php", "pycsw", $_SERVER["REQUEST_URI"])."</li></ul><li>nella sezione [manager]:</li><ul><li><b>transactions</b>: true</li></ul><li>nella sezione [repository]<ul><li><b>database</b>: sqlite:///".getcwd()."/pycsw/records.db</li></ul></li></ul>Per maggiori informazioni consultare la <a href=\"http://pycsw.org/docs/1.8.0/configuration.html\" target=\"_blank\">documentazione di pycsw</a>",
  "pycsw_db" => "Il prossimo passaggio imposterà il database per pycsw. Un database SQLite sarà creato nella directory <code>".getcwd()."/pycsw</code> (se avete usato il percorso suggerito nell'opzione <b>database</b>).<br /><em>Controllare i permessi di scrittura per l'utente 'Apache' in ".getcwd()."/pycsw prima di continuare.</em>",
  "Please mark the checkbox and click on 'continue' button for the next step" => "Spuntare la checkbox e cliccare sul bottone 'continua' per il prossimo punto",
  "Please enable module wsgi and restart Apache" => "Attivare il modulo wsgi e riavviare Apache",
  "Now you have to add the following line to Apache configuration file" => "Ora bisogna aggiungere le seguenti linee al file di configurazione di Apache.",
  "harvest" => "Il prossimo passaggio è quello di collezionare i propri servizi. La directory <code>".getcwd()."/$path</code> sarà utilizzata per leggere i mapfile.",
  "finish" => "Installazione terminata. Potete testare pycsw cliccando sul bottone `pycsw`. Cliccando su `Finito` verrete reindirizzati alla home page. Si consiglia di eliminare il file <code>".getcwd()."/install_pycsw.php</code>",
  "Finish" => "Finito",
  "Continue" => "Continua",
  "An error occurred during the setup of the database. Please check the Apache log file" => "Un errore è avvenuto durante la creazione del database. Controllare il log file di Apache",
  "pycsw_url" => "Imposta l'indirizzo del servizio pycsw. Lascia il valore attuale se avete usato i valori suggeriti nel file default.cfg",
  "Get url of Catalog Service for the Web" => "Ottieni l'url del Catalog Service for the Web",
  "Get capabilities of Catalog Service for the Web" => "Ottieni le capabilities del Catalog Service for the Web",
);
?>