<?php

/* Version 1.1.1 Build 2 */

/* The data from the form is sent with POST (by the javascript) to this document, it writes it, including HTML tags, into chatlog.txt. */


// Options

$admin_password = "olf"; // set the admin password that is used to reset the chat

// End Options


function htmlencode ($string) {
    $string = str_replace("&","&amp;", $string);
    $string = str_replace('"',"&quot;", $string);
    $string = str_replace("'","&#039;", $string);
    $string = str_replace("<","&lt;", $string);
    $string = str_replace(">","&gt;", $string);
    return $string;
    }
    
    
$name = $_POST["name"]; // $name is now the name from the form
$message = $_POST["message"]; // $message is now the message from the form

    
if ($admin_password == true and $name == "admin" and $message == "?password=" . $admin_password . "?action=reset") : // if it's a comand to reset the chat, this just works if the $admin_password is set

  $entry = '<div class="entry"><div class="name">Chat:</div><div class="content"><span class="message">Type in your <a href="#new">message</a> and hit enter to submit. Use an @ to mention other users, URLs are hyperlinked.</span><span class="time"></span></div></div>'; // $entry is set to the default message that is also shown when you open the chat the first time
    
  file_put_contents("chatlog.txt", $entry."\n\r"); // replaces the whole content of chatlog.txt by the default message $entry


else: // if it's no command


  if ($name == false or $message == false) : // if $message or $name has no content, nothing is done

  else: // if both have content, the entry is written into chatlog.txt

  $name = htmlencode($name); // encodes HTML tags

  $message = htmlencode($message); // encodes HTML tags
  $message = $message." "; // appends a space onto the end of the message
  $message = preg_replace("/(?<!http:\/\/)www\./","http://www.",$message); // sets a http:// before www.
  $message = preg_replace( "/((http|ftp)+(s)?:\/\/[^<>\s]+)/i", "<a href=\"\\0\" target=\"_blank\">\\0</a>",$message); // makes links (http://) clickable
  $message = preg_replace("/@(.*) /Us", "<b>@\\1</b> ", $message); // writes words that begin with an @ bold

  $time = date("H:i, j. F Y e"); // actual time

  $entry = '<div class="entry"><div class="name">' . $name . ':</div><div class="content"><span class="message">' . $message . '</span><span class="time">' . $time . '</span></div></div>'; // creates the entry that will be written into chatlog.txt

  file_put_contents("chatlog.txt", $entry."\n\r", FILE_APPEND); // appends $entry to chatlog.txt

  endif;


endif;

?>