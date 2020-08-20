<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="../stylesheets/login.css" />
  <title>Login</title>
</head>

<body>
  <div class="contents">
    <img src="../src/logo-walrustech-no-bg.png" class="center" />
    <div id="warning"></div>
    <form id="user-info">
      <input type="text" name="username" id="username" placeholder="username" />
      <br />
      <input type="password" name="password" id="password" placeholder="password" />
      <br />
      <input id="signin" type="submit" value="Sign In" />
    </form>
  </div>
  <div class="footer">
    <p>&copy; 2020 Walrus</p>
  </div>
  <?php include "../scripts/retrieve-login-info.php"; ?>
</body>

</html>