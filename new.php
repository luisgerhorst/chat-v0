<?php

/* Die Formulardaten werden durch Javascript (Ajax) per POST and diese Datei geschickt, sie schreibt sie als HTML in chatlog.txt */

$name = $_POST["name"]; // $name ist nun der per POST übergebene Name aus dem Formular

$message = $_POST["message"]; // $content ist nun die per POST übergebene Nachricht aus dem Formular
$message = htmlspecialchars($message, ENT_QUOTES); // encodes special characters to HTML

/* In some PHP Versions (especially 5.3.10) htmlspecialchars() seams to be a bit buggy, it adds a backslash [\] before single quotes ['] and double quotes ["], the following two functions remove it. */
$message = ereg_replace("\&#039;", "&#039;", $message); // removes \ before '
$message = ereg_replace("\&quot;", "&quot;", $message); // removes \ before "

$message = ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]","<a href=\"\\0\">\\0</a>", $message); // macht Links (http://) anklickbar

if ($message == "" or $name == "") // wenn nicht beide Felder ausgefüllt sind wird nichts gemacht
   {
   }

else // wenn beide ausgefüllt sind schon
   {
   
   $time = date("H:i, j. F Y"); // aktuelle Zeit wird ermittelt
   
   $entry = '<div class="entry"><div class="name">' . $name . ':</div><div class="content"><span class="message">' . $message . '</span><span class="time"> ' . $time . '</span></div></div>'; // erstellt eine Variable $entry die den Namen, die Nachricht und die aktuelle Zeit mitsammt HTML enthält

   $file = fopen("chatlog.txt", "a"); // öffnet chatlog.txt
   fwrite($file, "\n".$entry); // schreibt $entry als neue Zeile in chatlog.txt
   fclose($file); // schließt chatlog.txt

   }
?>