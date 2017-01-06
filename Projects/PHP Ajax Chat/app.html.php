<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF8">
    <title>Social App</title>
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <script src="js/chat.js"></script>
  </head>
  <body onload="ajax()">
    <div id="chat">
      <div id="chat-content"></div>
      <div id="chat-button">
        <form method="post" action="">
         <input id="chat-label" type="text" name="content"> 
         <input type="hidden" name="action" value="enter">
         <input id="submit-label" type="submit" value="Send">
        </form>
      </div>
    </div>
    <form id="logout" action="index.php" method="post">
        <input type="hidden" name="action" value="logout">
        <input type="submit" value="Logout">
      </form>
  </body>
</html>