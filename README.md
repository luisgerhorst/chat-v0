# Features

- PHP saves the messages into a text file
- Client loads text file using AJAX

# How it works

The javascript.js sends the message (using Ajax) to write.php which writes it (including current time and HTML Tags) into chatlog.txt. Javascript.js loads the content of chatlog.txt one time a second into the div #chat.

If you use the chat regularly, you can add ?name=[your name] to the chat's URL so your name is automatically added into the Name field. Example URL: http://chat.luisgerhorst.de/?name=Luis

If you want to reset the chat you can type in a command (yep, directly into the chat!) that delets all messages that have been added. The name must be "admin" and the message "?password=[yourpassword]?action=reset". The password has to be set in write.php line 10 (that's after "// Options" and before "// End Options"). If the password is set to "" (what's the default) the command doesn't work. After you've set the password the line, for example, looks like this:

    $admin_password = "Hdab671";
    
Then, the password would be "Hdab671". Now you can type in your command, it should look like [this](http://cl.ly/GwnX).
