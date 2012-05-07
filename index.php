<html>
<head>

  <title>Chat</title>
  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="content-language" content="de-de" />
  <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0;"/>
  
  <link rel="stylesheet" type="text/css" href="style.css">
  <script type="text/javascript" src="jquery.js"></script>
  <script type="text/javascript" src="javascript.js"></script>


</head>
<body>

<div id="wrapper">


<div id="chat"></div> <!-- #chat (wird durch Javascript mit Inhalt von chatlog.txt befüllt) -->


<form class="form" id="new" action="new.php" method="get">

  <input class="name" id="new_name" name="name" placeholder="       Name" autocomplete="off">

  <input class="message" id="new_message" name="message" placeholder="Message" onKeyPress="return checkSubmit(event)" autocomplete="off" > <!-- onKeyPress="return checkSubmit(event)" ruft Javascript Funktion (checkSubmit) auf die die Formulardaten per Ajax abschickt wenn gedrückte Taste (event) Enter ist -->

</form> <!-- #new -->


</div> <!-- #wrapper -->


</body>