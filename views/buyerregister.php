<?php
namespace views;

?>

<html>


<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 50%;
  padding: 20px 20px;
  margin: 10px 0;
  display: inline-block;
  border: 2px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: lightblue;
  width: 30%;
  color: white;
  size: 20px;
  padding: 20px 20px;
  margin: 10px 0;
  border: solid;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

.container {
  padding: 40px;
  width: auto;
}

</style>
</head>







<body>
<br>
<center><h1>Buyer Registration</h1>
<form action="" method="post">
<div class="container">
  <label for="name">Enter your name:</label><br>
  <input type="text" id="name" name="name"><br>
  <label for="name">Enter your phone number:</label><br>
  <input type="text" id="phone" name="phone"><br>
  <label for="username">Enter a username:</label><br>
  <input type="text" id="username" name="username"><br>
  <label for="password">Enter a password:</label><br>
  <input type="password" id="password" name="password"><br><br>
  <label for="enable2fa"> Do you want to enable 2-FA?</label>
  <input type="checkbox" id="enable2fa" name="enable2fa" value="true"><br><br>
  <button type="submit">Register</button>

</div></center>
</form>

<center><h2> Already registered?</h2>
<button type a href="http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=buyer&action=login">Login Here</a></center>



</body>
</html>