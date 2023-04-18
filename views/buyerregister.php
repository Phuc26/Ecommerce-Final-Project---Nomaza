<?php
namespace views;

?>

<html>
<body>

<h1>Buyer Registration</h1>
<form action="" method="post">
  <label for="username">username:</label><br>
  <input type="text" id="username" name="username"><br>
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password"><br><br>
  <label for="enable2fa"> Enable 2-FA?</label>
  <input type="checkbox" id="enable2fa" name="enable2fa" value="true"><br><br>
  <input type="submit" value="Register">
</form>

<h2> Already registered?</h2>
<a href="http://localhost/hrapp/index.php?resource=buyer&action=login">Login</a>



</body>
</html>