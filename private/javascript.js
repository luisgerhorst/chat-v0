/* Version p.1.1.2 Build 3 */

$(document).ready(function () {


var xmlhttp;


// damit Ajax funktioniert
function loadXMLDoc(url,cfunc) {
    
    // für moderne Browser (Safari, Chrome, Firefox, Opera)
    if (window.XMLHttpRequest) {
      xmlhttp = new XMLHttpRequest();
    }
    
    // für alte Browser (Internet Explorer)
    else {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    
    xmlhttp.onreadystatechange = cfunc;
    xmlhttp.open("POST",url,true);
    xmlhttp.send();
    
} // loadXMLDoc()


// ersetzt den Inhalt von #chat durch den Inhalt von chatlog.txt
function loadChat() {
    loadXMLDoc("chatlog.txt",function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("chat").innerHTML = ""; // leert #chat
      document.getElementById("chat").innerHTML = xmlhttp.responseText; // befüllt #chat
    } // if
    }); // loadXMLDoc() 
} // loadChat()


// scrollt nach unten
function scrollToBottom() {
    window.setTimeout(function() { window.scrollTo(0,document.body.scrollHeight); }, 200);
    window.setTimeout(function() { window.scrollTo(0,document.body.scrollHeight); }, 250);
    window.setTimeout(function() { window.scrollTo(0,document.body.scrollHeight); }, 300);
    window.setTimeout(function() { window.scrollTo(0,document.body.scrollHeight); }, 350);
    window.setTimeout(function() { window.scrollTo(0,document.body.scrollHeight); }, 400);
    window.setTimeout(function() { window.scrollTo(0,document.body.scrollHeight); }, 450);
    window.setTimeout(function() { window.scrollTo(0,document.body.scrollHeight); }, 500);
}


// liest eine per GET übergebene Variable aus
function GET(name) {
    return unescape((RegExp(name + '=' + '(.+?)(&|$)').
    exec(location.search)||[,""])[1]);
}


// Für iPhone, iPod & iPad: Zeigt Datum und Uhrzeit beim Tippen auf die Nachricht
if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i))) {
    $("*").click(function(){});
} // if


// ruft loadChat() nach laden direkt auf, scrollt nach unten und setzt den Value von #new_name auf den per GET übergebenen Namen "name"
window.onload = function() {
    $('#new_name').val(GET("name"));
    loadChat();
    scrollToBottom();
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
 
  var entry = 'name=' + encodeURIComponent(name) + '&message='  + encodeURIComponent(message); // die Inhalte (Value) der Formulars sollen per POST an das PHP Skript weitergeleitet werden. Dafür bauen wir einen String
 
  $.ajax({ // Formulardaten abschicken (Request)

    url: 'write.php', // Ort des Skriptes in dem die per POST übertragenen Daten verarbeitet werden sollen
    type: 'POST', // Angabe der POST Methode, GET ginge auch
    data: entry, // Daten die gesendet werden sollen
    success: function () { // bei Antwort des Requests
      $('#new_message').val(''); // lehrt #new_message
      window.setTimeout(function() {
        $('#new_message').attr('placeholder', 'Sent.'); // placeholder nach 2s zu "Sent." ändern
        window.setTimeout(function() {
          $('#new_message').attr('placeholder', 'Message'); // placeholder nach 1s zum default ändern
        }, 1000);
      }, 2000);
    } // success
    
  }); // ajax request
     
} // if
} // check submit