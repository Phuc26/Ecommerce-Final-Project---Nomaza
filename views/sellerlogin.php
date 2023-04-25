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
<center><h1>Seller Login</h1>
<br>
<form action="" method="post">
<div class="container">
  <label for="username">Enter username:</label><br>
  <input type="text" id="username" name="username"><br>
  <label for="password">Enter password:</label><br>
  <input type="password" id="password" name="password"><br><br>
  <button type="submit">Login</button>

  
</div></center>
</form>



<?php
class SellerLogin{

private $user;
private $userMessage;

function __construct($user){
  $this->user = $user;

  if($this->user->login()){
    $this->

    header('Location:http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=seller&action=list');
  }else{
    $this->$userMessage = 'Unable to login, please retry password or username';
    $this->render();
  }
}

function render(){
  if(  ($this->user->getUsername() !== null)&& ($this->user->gePassword() !== null))
  echo $this->userMessage;
}




}
?>









</body>
</html>
