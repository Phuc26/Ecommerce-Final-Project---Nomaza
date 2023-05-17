<?php namespace views;
?>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>HomePage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

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
<body>

    <style>

    body {
      font-family: Arial, Helvetica, sans-serif;
      margin: 0;
      background-color: black;
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

<center><h2>Welcome to NozamaF main page!</h2></center>
<style>
  h2{
    font-size:50px;
    color: #0026FF;
  }
</style>
<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner">

      <div class="item active">
        <img src="/Ecommerce-Final-Project---Nomaza/images/Laptop.jpg" alt="Laptop" style="width:100%;">
        <div class="carousel-caption">
          <h3>Laptop</h3>
          <p>NozamaF Electronics</p>
        </div>
      </div>

      <div class="item">
        <img src="/Ecommerce-Final-Project---Nomaza/images/Cleats.png" alt="Cleats" style="width:100%;">
        <div class="carousel-caption">
          <h3>Cleats</h3>
          <p>NozamaF Clothes</p>
        </div>
      </div>
    
      <div class="item">
        <img src="/Ecommerce-Final-Project---Nomaza/images/Chain.jpg" alt="Chain" style="width:100%;">
        <div class="carousel-caption">
          <h3>Chain</h3>
          <p>NozamaF Jewelry</p>
        </div>
      </div>
  
    </div>

    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

</body>
</html>