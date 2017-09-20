<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Shop</title>
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
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
          <?php if(isset($_SESSION['is_logged_in'])) : ?>
          <li>Welcome, <?php echo htmlspecialchars($_SESSION['UserData']['FirstName']); ?></li>
          <li><a href="<?php echo ROOT_URL; ?>logout">Logout</a></li>
          <?php else : ?>
          <li><a href="<?php echo ROOT_URL;?>login">Login</a></li>
          <li><a href="<?php echo ROOT_URL;?>register">Register</a></li>
          <?php endif; ?>
        </ul>
      </nav>
    </header>
    
    <div id="container">
      <h1>Contact</h1>
      <p class="center">Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</p>
    </div>
    
    <footer></footer>
  </body>
</html>