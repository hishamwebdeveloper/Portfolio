<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Create account</title>
    <link rel="stylesheet" type="text/css" href="../css/form.css" />
  </head>
  <body>
    <div id="form">
      <?php if (isset($createError)): ?>
      <p><?php echo $createError; ?></p>
      <?php endif; ?>
      <form action="" method="post">
        <fieldset>
          <legend>Create an account</legend>
          <label for="firstName">First name</label>
          <input id="firstName" name="firstName" type="text">
          <label for="lastName">Last name</label>
          <input id="lastName" name="lastName" type="text">
          <label for="gender">Gender</label>
          <select name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
          <label for="email">Email</label>
          <input id="email" name="email" type="email">
          <label for="id">Login ID</label>
          <input id="id" name="login" type="text">
          <label for="password">Password</label>
          <input id="password" name="password" type="password">
          <input type="hidden" name="action" value="create">
          <input type="submit" value="Create">
        </fieldset>
      </form>
      <a href="/a"><p class="create-account">Login</p></a>
    </div>
  </body>
</html>