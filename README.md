This version of the chat can be protected with a password. The default
password is "yourPasswordHere", you can change it in index.php, line 10. After you changed it, the line should look a bit like this: $password = "cdab671";


The javascript.js sends the message (using Ajax) to new.php which writes it (including current time and HTML Tags) into chatlog.txt. Javascript.js loads the content of chatlog.txt one time a second into the div #chat.

If you use the chat regularly, you can add ?name=[your name] to the chat's URL so your name is automatically added into the Name field. Example URL: http://chat.luisgerhorst.de/?name=Luis