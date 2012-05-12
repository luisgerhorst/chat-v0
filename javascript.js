$(document).ready(function () {


var xmlhttp;

// damit Ajax funktioniert
function loadXMLDoc(url,cfunc)
{
    // für moderne Browser
    if (window.XMLHttpRequest) {
      xmlhttp=new XMLHttpRequest();
    }

    // für alte Browser
    else {
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = cfunc;
    xmlhttp.open("POST",url,true);
    xmlhttp.send();
}


// ersetzt den Inhalt von #chat durch den Inhalt von chatlog.txt
function loadChat() {
    
    loadXMLDoc("chatlog.txt",function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("chat").innerHTML = ""; // leert #chat
      document.getElementById("chat").innerHTML = xmlhttp.responseText; // befüllt #chat
    } //if
    }); // loadXMLDoc()
    
} // loadChat()


// ruft loadChat() nach laden direkt auf
window.onload = function () { 
    loadChat();
    window.setTimeout(function() { window.scrollTo(0,document.body.scrollHeight); }, 200);
    window.setTimeout(function() { window.scrollTo(0,document.body.scrollHeight); }, 250);
    window.setTimeout(function() { window.scrollTo(0,document.body.scrollHeight); }, 300);
    window.setTimeout(function() { window.scrollTo(0,document.body.scrollHeight); }, 350);
    window.setTimeout(function() { window.scrollTo(0,document.body.scrollHeight); }, 400);
    window.setTimeout(function() { window.scrollTo(0,document.body.scrollHeight); }, 450);
    window.setTimeout(function() { window.scrollTo(0,document.body.scrollHeight); }, 500);
};

// ruft loadChat() alle 2 Sekunden auf
setInterval(function() {
  loadChat();
}, 2000);

}); // document.ready
 

// bei Enter Taste werden Formluardaten per Ajax verschickt
function checkSubmit(e) { // funktion wird bei Tastendruck in #new_message aufgerufen, gedrückte Taste "e" wird übergeben
if(e && e.keyCode == 13) { // wenn Taste (e) Enter ist (keycode 13) wird 
     
  var name = $('#new_name').val(); // Value von #new_name zu Javascript Variable "name"
  var message = $('#new_message').val(); // Value von #new_message zu Javascript Variable "message"
  $('#new_message').attr('placeholder', 'Sending…'); // placeholder ist jetzt "Sending…"
 
  var entry = 'name=' + name + '&message='  + encodeURIComponent(message); // die Inhalte (Value) der Formulars sollen per POST an das PHP Skript weitergeleitet werden. Dafür bauen wir einen String
 
  $.ajax({ // Formulardaten abschicken (Request)

    url: 'save.php', // Ort des Skriptes in dem die per POST übertragenen Daten verarbeitet werden sollen
    type: 'POST', // Angabe der POST Methode, GET ginge auch
    data: entry, // Daten die gesendet werden sollen
    success: function () { // bei Antwort des Requests
    
      $('#new_message').val(''); // lehrt #new_message
      window.setTimeout(function() {
        $('#new_message').attr('placeholder', 'Sent.'); // placeholder after 2s to "Sent."
        window.setTimeout(function() {
          $('#new_message').attr('placeholder', 'Message'); // placeholder after 1s to default
        }, 1000);
      }, 2000);
      
    } // success
    
  }); // ajax request
     
} // if
} // check submit