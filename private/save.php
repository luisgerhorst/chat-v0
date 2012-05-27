<?php

/* Version p.1.1.2 Build 2 */

/* Die Formulardaten werden durch Javascript (Ajax) per POST and diese Datei geschickt, sie schreibt sie als HTML in chatlog.txt */

function htmlencode ($string) {
    $string = str_replace("&","&amp;", $string);
    $string = str_replace('"',"&quot;", $string);
    $string = str_replace("'","&#039;", $string);
    $string = str_replace("<","&lt;", $string);
    $string = str_replace(">","&gt;", $string);
    return $string;
    }

$name = $_POST["name"]; // $name ist nun der per POST übergebene Name aus dem Formular
$name = htmlencode($name); // encodiert HTML Tags

$message = $_POST["message"]; // $content ist nun die per POST übergebene Nachricht aus dem Formular
$message = htmlencode($message); // encodiert HTML Tags
$message = $message." "; // hängt Lehreichen an das Ende der Nachricht
$message = preg_replace("/(?<!http:\/\/)www\./","http://www.",$message); // setzt http:// vor www.
$message = preg_replace( "/((http|ftp)+(s)?:\/\/[^<>\s]+)/i", "<a href=\"\\0\" target=\"_blank\">\\0</a>",$message); // macht Links (http://) anklickbar
$message = preg_replace("/@(.*) /Us", "<b>@\\1</b> ", $message); // schreibt wörter die mit einem @ beginnen fett

$time = date("H:i, j. F Y e"); // aktuelle Zeit wird ermittelt und ist nun im passendem Format durch $time abrufbar

$entry = '<div class="entry"><div class="name">' . $name . ':</div><div class="content"><span class="message">' . $message . '</span><span class="time"> ' . $time . '</span></div></div>'; // erstellt die Variable $entry die den Namen, die Nachricht und die aktuelle Zeit mitsammt der HTML Tags enthält

if ($message == "" or $name == "") {} // wenn $message oder $name keinen Inhalt hat wird nichts gemacht

else { // wenn beide ausgefüllt sind schon
    file_put_contents("chatlog.txt", $entry."\n\r", FILE_APPEND); // Fügt $entry zu chatlog.txt hinzu
    }
    
?>