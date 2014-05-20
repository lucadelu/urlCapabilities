<?php
require_once "php/settings.php";
$lang = array(
  "intro" => "La piattaforma GIS & Remote Sensing",
  "Go to urlCapabilities catalogue" => "Vai al catalogo di urlCapabilities",
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
  "urlCapabilities is a software written in PHP to obtain info about OGC web service created using <a href=\"http://www.mapserver.org\" target=\"_blank\">MapServer</a>." => "urlCapabilities è un software scritto in PHP per ottenere infomazioni sui servizi OGC creati utilizzando <a href=\"http://www.mapserver.org\" target=\"_blank\">MapServer</a>.",
  "It use PHP Mapscript to read MapServer configuration files (mapfile) and create your own catalogue." => "Viene utilizzato PHP Mapscript per leggere i file di configurazione di MapServer (i mapfile) in modo tale da andare a creare il proprio catalogo.", 
  "urlCapabilities is able also to create a Catalogue Service for the Web (CSW) using <a href=\"http://pycsw.org/\" target=\"_blank\">pycsw</a>, to be OGC compliance" => "urlCapabilities inoltre può creare un Catalogue Service for the Web (CSW) utilizzando <a href=\"http://pycsw.org/\" target=\"_blank\">pycsw</a>, così da essere conforme agli standard OGC",
  "optional, only if you want CSW service" => "opzionale, solo se si vuole il servizio CSW",
  "Download the source with '<code>git clone https://github.com/lucadelu/pyModis.git</code>' or with the button '<a href=\"https://github.com/lucadelu/urlCapabilities/archive/master.zip\">Download Source</a>' in GitHub" => "Scaricare i sorgenti con '<code>git clone https://github.com/lucadelu/pyModis.git</code>' oppure con il bottone in GitHub '<a href=\"https://github.com/lucadelu/urlCapabilities/archive/master.zip\">Download Source</a>'",
  "Copy the urlCapabilities folder in your web server directory; in Debian like distributions is <code>/var/www</code>" => "Copiare la cartella urlCapabilities nella directory del vostro server web; nelle distribuzioni derivate da Debian è <code>/var/www</code>",
  "Rename <code>php/settings.php.default</code> in <code>php/settings.php</code>" => "Rinominare <code>php/settings.php.default</code> in <code>php/settings.php</code>",
  "Configure urlCapabilities through <code>php/settings.php</code> (please read the 'urlCapabilities Settings' paragraph, for more info)" => "Configurare urlCapabilities attraverso <code>php/settings.php</code> (leggere il paragrafo 'Impostazioni di urlCapabilities' per maggiori infomazioni)",
  "Copy or link your mapfile/s to urlCapabilities/mapfile/ (please read the 'Mapfile Settings' paragraph, for more info about mapfile requirements)" => "Copiare o collegare i vostri mapfile in urlCapabilities/mapfile/ (leggere il paragrafo 'Impostazioni del mapfile' per informazioni sui requisiti nei mapfile)",
  "Now you can see the page using a web browser at the address <a href=\"http://localhost/urlCapabilities/urlcapabilities.php\">http://localhost/urlCapabilities/urlcapabilities.php</a>" => "Ora è possibile vedere la pagina con un browser web all'indirizzo <a href=\"http://localhost/urlCapabilities/urlcapabilities.php\">http://localhost/urlCapabilities/urlcapabilities.php</a></li>",
  "urlCapabilities Settings" => "Impostazioni di urlCapabilities",
  "Mapfile Settings" => "Impostazioni del mapfile",
  "The configuration file for urlCapabilities is <code>".getcwd()."/php/settings.php</code> (you should renamed or copied from <code>".getcwd()."/php/settings.php.default</code>)." => "Il file di configurazione di urlCapabilities è <code>'.getcwd().'/php/settings.php</code> (dovreste averlo rinominato o copiato da <code>'.getcwd().'/php/settings.php.default</code>).",
  "Le seguenti opzioni possono essere cambiate:" => "The following option could be changed:",
  '<b>$epsg_path</b>: the path to <code>epsg</code> file (on Unix usually <code>/usr/share/proj</code> or <code>/usr/local/share/proj</code>)' => '<b>$epsg_path</b>: il percorso al file <code>epsg</code> (solitamente in Unix <code>/usr/share/proj</code> o <code>/usr/local/share/proj</code>)',
  '<b>$path</b>: the path to the directory containing the mapfiles (it is better to copy/link the mapfile in the default directory)' => '<b>$path</b>: il percorso alla directory che contiene i mapfile (è meglio copiare/collegare i mapfile nella directory di default)',
  '<b>$title</b>: the title of urlCapabilities project' => '<b>$title</b>: il titolo del progetto di urlCapabilities',
  '<b>$pycsw</b>: true if you set up pycsw application' => '<b>$pycsw</b>: true se avete creato un\'istanza di pycsw',
  '<b>$languages</b>: the languages avaible for urlCapabilities project' => '<b>$languages</b>: le lingue disponibili per il progetto di urlCapabilities',
  '<b>$lang_flag</b>: true if you want show flags of the choosen languages' => '<b>$lang_flag</b>: true se volete mostrare le bandiere delle lingue scelte',
  '<b>$css</b>: the CSS file to use, it must be inside <code>'.getcwd().'/css/</code> directory' => '<b>$css</b>: il file CSS da utilizzare, dev\'essere dentro la directory <code>'.getcwd().'/css/</code>',
  "These are the requirements for urlCapabilities about mapfile." => "Questi sono i requisiti di urlCapabilities per quanto riguarda i mapfile.",
  "The mapfile need the '.map' extension." => "Il mapfile ha bisogno dell'estensione '.map'.",
  "In the MAP object mapfile need these keys:" => "Nella sezione MAP del mapfile sono necessari questi campi:",
  "In the WEB object mapfile need these keys:" => "Nella sezione WEB del mapfile invece:",
  "Thanks to" => "Grazie a",
  "pycsw installation script" => "Script di installazione di pycsw",
  "Please agree to continue" => "Si prega di accettare per continuare",
  "Please copy or rename <code>".getcwd()."/pycsw/default-sample.cfg</code> to <code>".getcwd()."/pycsw/default.cfg</code> and modify it." => "Copiare o rinominare <code>".getcwd()."/pycsw/default-sample.cfg</code> in <code>".getcwd()."/pycsw/default.cfg</code> e modificarlo",
  "The required fields to modify are the following (with suggested default values):" => "I campi obbligatori da impostare sono i seguenti (con i valori di default consigliati):",
  "into [server] section:" => "nella sezione [server]:",
  "into [manager] section:" => "nella sezione [manager]:",
  "into [repository] section" => "nella sezione [repository]",
  "For additional info read the <a href=\"http://pycsw.org/docs/1.8.0/configuration.html\" target=\"_blank\">pycsw's documentation</a>." => "Per maggiori informazioni consultare la <a href=\"http://pycsw.org/docs/1.8.0/configuration.html\" target=\"_blank\">documentazione di pycsw</a>.",
  "Next step will setup the database for pycsw." => "Il prossimo passaggio imposterà il database per pycsw.",
  "A SQLite database will be created into directory <code>".getcwd()."/pycsw</code> (if you used the suggested path in <b>database</b> option)." => "Un database SQLite sarà creato nella directory <code>".getcwd()."/pycsw</code> (se avete usato il percorso suggerito nell'opzione <b>database</b>).", 
  "Please check the write permission for 'Apache' user in ".getcwd()."/pycsw before continue." => "Controllare i permessi di scrittura per l'utente 'Apache' in ".getcwd()."/pycsw prima di continuare.",
  "Please mark the checkbox and click on 'continue' button for the next step" => "Spuntare la checkbox e cliccare sul bottone 'continua' per il prossimo punto",
  "Please enable module wsgi and restart Apache" => "Attivare il modulo wsgi e riavviare Apache",
  "Now you have to add the following line to Apache configuration file" => "Ora bisogna aggiungere le seguenti linee al file di configurazione di Apache.",
  "Next step is to harvest your services." => "Il prossimo passaggio è quello di collezionare i propri servizi.",
  "The directory <code>".getcwd()."/$path</code> will be used to read the mapfiles." => "La directory <code>".getcwd()."/$path</code> sarà utilizzata per leggere i mapfile.",
  "Installation finished." => "Installazione terminata.",
  "You can test `pycsw` using the button `pycsw`." => "Potete testare pycsw cliccando sul bottone `pycsw`.",
  "Clicking on `Finish` you will be redirect to the home page." => "Cliccando su `Finito` verrete reindirizzati alla home page.",
  "We suggest to delete the file <code>".getcwd()."/install_pycsw.php</code>" => "Si consiglia di eliminare il file <code>".getcwd()."/install_pycsw.php</code>",
  "Finish" => "Finito",
  "Continue" => "Continua",
  "An error occurred during the setup of the database. Please check the Apache log file" => "Un errore è avvenuto durante la creazione del database. Controllare il log file di Apache",
  "Set the url of pycsw service." => "Imposta l'indirizzo del servizio pycsw.",
  "Leave the default value if you used the suggested values in default.cfg file" => "Lascia il valore attuale se avete usato i valori suggeriti nel file default.cfg",
  "Get url of Catalog Service for the Web" => "Ottieni l'url del Catalog Service for the Web",
  "Get capabilities of Catalog Service for the Web" => "Ottieni le capabilities del Catalog Service for the Web",
  "pycsw update script" => "Script di aggiornamento di pycsw",
  "Step %s of %s" => "Passaggio %s di %s",
  "Help" => "Supporto",
  "Click on layer name for preview and more info about that layer" => "Cliccare sul nome del livello per l'anteprima e maggiori informazioni sul livello scelto",
  "OR" => "O",
  "OR/AND" => "O/E",
);
?>