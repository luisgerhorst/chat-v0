<?php

/* Die Formulardaten werden durch Javascript (Ajax) per POST and diese Datei geschickt, sie schreibt sie als HTML in chatlog.txt */

$name = $_POST["name"]; // $name ist nun der per POST übergebene Name aus dem Formular
$name = htmlspecialchars($name, ENT_QUOTES); // encodes special characters to HTML

$message = $_POST["message"]; // $content ist nun die per POST übergebene Nachricht aus dem Formular
$message = htmlspecialchars($message, ENT_QUOTES); // encodes special characters to HTML
$message = ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]","<a href=\"\\0\">\\0</a>", $message); // macht Links (http://) anklickbar

$time = date("H:i, j. F Y"); // aktuelle Zeit wird ermittelt

$entry = '<div class="entry"><div class="name">' . $name . ':</div><div class="content"><span class="message">' . $message . '</span><span class="time"> ' . $time . '</span></div></div>'; // erstellt die Variable $entry die den Namen, die Nachricht und die aktuelle Zeit mitsammt der HTML Tags enthält

if ($message == "" or $name == "") { // wenn nicht beide Felder ausgefüllt sind wird nichts gemacht 
    }

else { // wenn beide ausgefüllt sind schon
    file_put_contents("chatlog.txt", $entry."\n", FILE_APPEND); // Fügt $entry zu chatlog.txt hinzu
    }
    
?>