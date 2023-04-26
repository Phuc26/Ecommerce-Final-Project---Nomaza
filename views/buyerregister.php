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
  background-color: black;
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
  <label for="buyer_username">Enter your username:</label><br>
  <input type="text" id="buyer_username" name="buyer_username"><br>
  <label for="buyer_passwordhash">Enter your password:</label><br>
  <input type="password" id="buyer_passwordhash" name="buyer_passwordhash"><br>
  <label for="buyer_name">Enter your name:</label><br>
  <input type="text" id="buyer_name" name="buyer_name"><br>
  <label for="buyer_phone">Enter your phone number:</label><br>
  <input type="text" id="buyer_phone" name="buyer_phone"><br>
  <label for="buyer_street">Enter your street:</label><br>
  <input type="text" id="buyer_street" name="buyer_street"><br>
  <label for="buyer_postalcode">Enter your postal code:</label><br>
  <input type="text" id="buyer_postalcode" name="buyer_postalcode"><br>



  <button type="submit">Register</button>

</div></center>
</form>



<center><h2> Already registered?</h2>
<button type a href="http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=buyer&action=login">Login Here</a></center>




<?php

class BuyerRegister{

  private $user;

  function __construct($user){

    $this->user = $user;

      if($this->user->create()){

        $this->user->getMembershipProvider()->create();
  
        header("location: http://localhost/hrapp/index.php?resource=buyer&action=register");

      }
  }
}

?>
</body>
</html>