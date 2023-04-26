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
  padding: 50px;
  width: auto;
}

</style>
</head>


<body>
<br>
<center><h1>Buyer Login</h1>
<br>
<form action="" method="post">
<div class="container">
  <label for="buyer_username">Enter username:</label><br>
  <input type="text" id="buyer_username" name="buyer_username"><br>
  <label for="buyer_passwordhash">Enter password:</label><br>
  <input type="password" id="buyer_passwordhash" name="buyer_passwordhash"><br><br>
  <button type="submit">Login</button>

</div></center>
</form>



<?php
class BuyerLogin{

private $buyer;
private $buyerMessage;

function __construct($buyer){
  $this->buyer = $buyer;

  if($this->buyer->login()){

    header('Location: http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=buyer&action=index');
  }else{
    $this->buyerMessage = 'Unable to login, please retry password or username';
    $this->render();
  }
}

function render(){
  if(  ($this->buyer->getBuyerUsername() !== null)&& ($this->buyer->getBuyerPassword() !== null))
  echo $this->buyerMessage;
}




}
?>




</body>
</html>