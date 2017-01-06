function ajax() {
      var req = new XMLHttpRequest();
      
      req.onreadystatechange = function() {
        
        if(req.readyState == 4 && req.status == 200) {
          
          document.getElementById('chat-content').innerHTML = req.responseText;
        }
      }
      req.open('GET', 'includes/chat.inc.php', true);
      req.send();
};
    
setInterval(function(){ajax();},1000);