The javascript.js sends the message (using Ajax) to new.php which writes it (including current time and HTML Tags) into chatlog.txt. Javascript.js loads the content of chatlog.txt one time a second into the div #chat.

If you use the chat regularly, you can add ?name=[your name] to the chat's URL so your name is automatically added into the Name field. Example URL: http://chat.luisgerhorst.de/?name=Luis

Under the branch [private](http://github.com/luisgerhorst/chat/tree/private) you find a version of the chat that can be protected with a custom password.