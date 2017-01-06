<html>
<head>
	<title>Shareboard</title>
	<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/style.css">
</head>
<body>
  <header>
    <nav>
      <div id="left-menu">
        <ul>
          <li><a id="logo" href="<?php echo ROOT_URL; ?>">News Spot</a></li>
          <li><a href="<?php echo ROOT_URL; ?>">Home</a></li>
          <li><a href="<?php echo ROOT_URL; ?>shares">Shares</a></li>
        </ul>
      </div>
      
      <div id="right-menu">
        <ul>
          <?php if(isset($_SESSION['is_logged_in'])) : ?>
          <li>Welcome <?php echo $_SESSION['UserData']['FirstName']; ?></a></li>
          <li><a href="<?php echo ROOT_URL; ?>user/logout">Logout</a></li>
          <?php else : ?>
          <li><a href="<?php echo ROOT_URL; ?>user/login">Login</a></li>
          <li><a href="<?php echo ROOT_URL; ?>user/register">Register</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </nav>
  </header>

    <div id="container">
     	<?php require($view); ?>
    </div>
</body>
</html>