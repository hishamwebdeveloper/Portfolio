<html>
<head>
	<title>Shareboard</title>
	<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/contact-form.css">
  <script src="<?php echo ROOT_PATH; ?>assets/js/jquery-2.1.4.min.js"></script>
  <script src="<?php echo ROOT_PATH; ?>assets/js/parsley.min.js"></script>
  <script src="<?php echo ROOT_PATH; ?>assets/js/form.js"></script>
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
    <h3>Register User</h3>
    <form id="contact-form" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
      <label>First name</label>
      <input type="text" name="lastname"/>
      <label>Last name</label>
      <input type="text" name="firstname"/>
      <label>Email</label>
      <input type="text" name="email"/>
      <label>Password</label>
      <input type="password" name="password"/>
      <input class="button" name="register" type="submit" value="Submit" />
    </form>
  </div>
</body>
</html>