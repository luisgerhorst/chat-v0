<html>
<head>

<!-- Version p.1.1.2 Build 5 -->

  <?php
  
  // Options

  $password = "olf600";
  
  // Variable
  
  $id = $_POST["id"];

  ?>
  

  <title>Chat</title>
  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="content-language" content="de-de" />
  <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0;"/>
  
  <link rel="stylesheet" type="text/css" href="style.css">
  <script type="text/javascript" src="jquery.js"></script>
  <?php if($id == $password): ?><script type="text/javascript" src="javascript.js"></script><?php endif; ?>


</head>
<body>

<div id="wrapper">

<?php if($id == $password): // wenn id richtig ist Seite einblenden ?>

<div id="chat"><noscript><p>You have to enable Javascript to use this chat.</p></noscript></div> <!-- #chat (wird durch Javascript mit Inhalt von chatlog.txt befüllt) -->

<form class="form" id="new">

  <input class="name" id="new_name" name="name" placeholder="       Name" autocomplete="off">

  <input class="message" id="new_message" name="message" placeholder="Message" onKeyPress="return checkSubmit(event)" autocomplete="off" > <!-- onKeyPress="return checkSubmit(event)" ruft Javascript Funktion (checkSubmit) auf die die Formulardaten per Ajax abschickt wenn gedrückte Taste (event) Enter ist -->

</form> <!-- #new -->

<?php else: ?>

<div id="fail">

  <p>This chat is private. You need the right password to use it.</p>

  <form id="id_form" action="" method="post">
    <input class="id" name="id" placeholder="Password" autocomplete="on">
  </form> <!-- #id_form -->

</div>

<?php endif; ?>

</div> <!-- #wrapper -->


</body>