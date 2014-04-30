<?php
session_start();
if (array_key_exists("language", $_SESSION) == false){
    $_SESSION["language"] = "en";
} else {
    if ($_SESSION["language"] == ""){
	$_SESSION["language"] = "en";
    }
}
if(isset($_POST["lang"]) && $_POST["lang"] != ""){ // check if get any language change parameter and change the session value
    $_SESSION["language"] = $_POST["lang"];
}
if(isset($_SESSION["language"]) && $_SESSION["language"] != ""){
    $language = $_SESSION["language"];
    include "lang/$language/$language.php"; // include the language file from the 'lang' folder
}
?>