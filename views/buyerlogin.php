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
  background-color: #04AA6D;
  width: 40%;
  color: white;
  padding: 20px 20px;
  margin: 10px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}


.container {
  padding: 50px;
}







</style>
</head>


<body>
</br>
<center><h1>Buyer Login</h1></center>
<form action="" method="post">
 <center> <div class="container">
  <label for="username">username:</label><br>
  <input type="text" id="username" name="username"><br>
  <label for="password">password:</label><br>
  <input type="password" id="password" name="password"><br><br>
 <button type="submit"> Login</button>

</div></center>
</form>



<?php
class BuyerLogin{

}
?>




</body>
</html>



