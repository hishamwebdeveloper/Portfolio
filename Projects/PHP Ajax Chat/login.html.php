<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF8">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="css/form.css">
  </head>
  <body>
    <div id="form">
      <?php if (isset($loginError)): ?>
      <p><?php echo $loginError; ?></p>
      <?php endif; ?>
      <form action="" method="post">
        <fieldset>
          <legend>Login</legend>
          <label for="login">Login</label>
          <input name="login" type="text">
          <label for="password">Password</label>
          <input name="password" type="password">
          <input type="hidden" name="action" value="login">
          <input type="submit" value="Sign in">
        </fieldset>
      </form>
      <a href="create/"><p class="create-account">Create account</p></a>
    </div>
  </body>
</html>