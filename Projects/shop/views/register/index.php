<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Shop</title>
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/css/form.css">
  </head>
  <body>
    <header>
      <nav>
        <ul id="left-menu">
          <li><a href="<?php echo ROOT_URL;?>">Home</a></li>
          <li><a href="<?php echo ROOT_URL;?>about">About</a></li>
          <li><a href="<?php echo ROOT_URL;?>contact">Contact</a></li>
          <li><a href="<?php echo ROOT_URL;?>shop">Shop</a></li>
        </ul>

        <ul id="right-menu">
          <li><a href="<?php echo ROOT_URL;?>login">Login</a></li>
          <li><a href="<?php echo ROOT_URL;?>register">Register</a></li>
        </ul>
      </nav>
    </header>
    
    <div id="container">
      <h1>Register</h1>
      <form id="form" method="post" action="">
        <label>First Name</label>
        <input type="text" name="firstname"/>
        <label>Last Name</label>
        <input type="text" name="lastname"/>
        <label>Email</label>
        <input type="text" name="email"/>
        <label>Password</label>
        <input type="password" name="password"/>
        <input class="button" type="submit" name="register" value="Create"/>
      </form>
    </div>
    
    <footer></footer>
  </body>
</html>