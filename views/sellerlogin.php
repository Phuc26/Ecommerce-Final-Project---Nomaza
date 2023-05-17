<?php
namespace views;
?>

<html>

<header class="site-header">
        <div class="site-identity">
            <h1>NozamaF™</h1>
        </div>  
        <nav class="site-navigation">
            <ul class="nav">
                <li><a href="http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=buyer&action=create">Register as a buyer</a></li>
                <li><a href="http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=buyer&action=login">Login as a buyer</a></li>
                <li><a href="http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=seller&action=create">Register as a seller</a></li>
                <li><a href="http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=seller&action=login">Login as a seller</a></li>
            </ul>
        </nav>
  </header>


<head>
<title>Seller Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  <style>
body {font-family: Arial, Helvetica, sans-serif;
      background-color: black;
      color: white;}
form {border: 3px solid #f1f1f1;
  width: 900px;
  height: 350px;}

input[type=text], input[type=password] {
  width: 50%;
  padding: 20px 20px;
  margin: 10px 0;
  display: inline-block;
  border: 2px solid #ccc;
  box-sizing: border-box;
  background-color: black;
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
  background-color: #626567}


.container {
  padding: 50px;
  width: auto;
}

a {
      text-decoration: none;
      color: white;
      font-size: 20px;
    }
    .site-header { 
      border-bottom: 2px solid #ccc;
      padding: .5em 1em;
      display: flex;
      justify-content: space-between;
    }

    .site-identity h1 {
      margin: .6em 0;
      display: inline-block;
      color: #0026FF;
      font-size: 45px;
    }


    .site-navigation ul, 
    .site-navigation li {
      margin: 0; 
      padding: 0;
    }

    .site-navigation li {
      display: inline-block;
      margin: 1.4em 1em 1em 1em;
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
            <input type="text" id="username" name="seller_username"><br>
            <label for="password">Enter password:</label><br>
            <input type="password" id="password" name="seller_passwordhash"><br><br>
            <button type="submit" >Login</button>


        </div>
</form>


<?php
class SellerLogin{

    private $seller;
    private $sellerMessage;
    function __construct($seller){
      $this->seller = $seller;
      $this->sellerMessage = 'Unable to login, please retry password or username';
      $this->render();
    }

    function render(){
      if(  ($this->seller->getSellerUsername() !== null)&& ($this->seller->getSellerPassword() !== null))
        echo $this->sellerMessage;
    }


}
?>
    <br/>
    <br/>
    <center><h2> Not registered?</h2>
        <a href="http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=seller&action=create">Register Here</a>
    </center>

    <center><h2>Are you a buyer?</h2>
    <a href="http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=buyer&action=login">Login as a buyer</a>
    </center>

    <center><h2>Want to go back to home page?</h2>
    <a href="http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=main&action=index">Back to home page</a>
    </center>







</body>
</html>
