<html>
<head>
<title>Login Member</title>
</head>
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/structure.css">
<body>
  <form action="proseslogin.php" method="post" class="box login">
    <fieldset class="boxBody">
      <label>Username</label>
      <input type="text" tabindex="1" name="username" placeholder="Username" required>
      <label><a href="#" class="rLink" tabindex="5">Forget your password?</a>Password</label>
      <input type="password" name="password" tabindex="2" placeholder="Your Password" required>
    </fieldset>
    <footer>
      <label><input type="checkbox" tabindex="3">Keep me logged in</label>
      <input type="submit" class="btnLogin" name="submit" value="Login" tabindex="4">
    </footer>
  </form>
</table>
</body>
</html>