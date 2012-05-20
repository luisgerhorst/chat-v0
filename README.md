The javascript.js sends the message (using Ajax) to new.php which writes it (including current time and HTML Tags) into chatlog.txt. Javascript.js loads the content of chatlog.txt one time a second into the div #chat.

If you use the chat regularly, you can add ?name=[your name] to the chat's URL so your name is automatically added into the Name field. Example URL: http://chat.luisgerhorst.de/?name=Luis

# Password

This version of the chat can be protected with a password. The default
password is "yourPasswordHere", you can change it in index.php, line 10. After you changed it, the line should look a bit like this: $password = "cdab671";
If you want to make the chat 'really' secure, you should rename the files chatlog.txt, javascript.js and save.php by something like chatlog-hsahdf56234sajd643hjhw7k.txt, javascript-jk362377823r89wiue091sd0.js or save-kjhg78342oale52ne7d9H.php.
But if you rename these files, you must replace their name in the code. Here's a list of them and where you have to replace their old name by your custom one.
chatlog.txt
* javascript.js, line 31
* save.php, line 31
javascript.js
* index.php, line 24
save.php
* javascript.js, line 94.
  