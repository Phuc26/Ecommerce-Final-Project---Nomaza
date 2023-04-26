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
  padding: 50px;
  width: auto;
}

</style>
</head>





<body>
<br>
<center><h1>Seller Registration</h1>
<form action="" method="post">
<div class="container">
  <label for="seller_username">Enter a username:</label><br>
  <input type="text" id="seller_username" name="seller_username"><br>
  <label for="seller_passwordhash">Enter a password:</label><br>
  <input type="password" id="seller_passwordhash" name="seller_passwordhash"><br><br>
  <label for="seller_name">Enter your name:</label><br>
  <input type="text" id="seller_name" name="seller_name"><br>
  <label for="seller_phone">Enter your phone number:</label><br>
  <input type="text" id="seller_phone" name="seller_phone"><br>
  

  <button type="submit">Register</button>

</div></center>
</form>

<center><h2> Already registered?</h2>
<button type a href="http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=seller&action=login">Login Here</a></center>


<?php

class SellerCreate{

  private $seller;

  function __construct($seller){

    $this->seller = $seller;


    $this->seller->create();
  
    header("location: http://localhost/hrapp/index.php?resource=buyer&action=create");
  }
}

?>
</body>
</html>