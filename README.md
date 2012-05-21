The javascript.js sends the message (using Ajax) to new.php which writes it (including current time and HTML Tags) into chatlog.txt. Javascript.js loads the content of chatlog.txt one time a second into the div #chat.

If you use the chat regularly, you can add ?name=[your name] to the chat's URL so your name is automatically added into the Name field. Example URL: http://chat.luisgerhorst.de/?name=Luis

# Password Protection

In the folder "/private" you find a version of the chat that can be protected by a custom password. The **default password** is **"yourPasswordHere"**, you can **change it** in **index.php, line 10**. After you changed it, the line should look a bit like this: $password = "Hdab671";

If you want to make the chat 'really' secure, you should rename the files chatlog.txt, javascript.js and save.php to something like chatlog-hsahdf56234sajd643hjhw7k.txt, javascript-jk362377823r89wiue091sd0.js, save-kjhg78342oale52ne7d9H.php or any other names that are hard tu gues, but don't change the file extension (".js", ".php" or ".txt"). After you've done this, you must now replace their name in the code by the new one. Here's a list of them and where you have to replace their old name by your custom one.

**chatlog.txt's name:**

- javascript.js, line 31
- save.php, line 31

**javascript.js's name:**

- index.php, line 24

**save.php's name:**

- javascript.js, line 94

After you replaced the names, for example, javascript.js line 31 should look a bit like this:

     loadXMLDoc("chatlog-hsahdf56234sajd643hjhw7k.txt",function() {

**Note:** Both version of the chat can be used independently, you can delete /private or move the content of /private into any other folder. Just make shure that all files in /private or / are in the same folder.
