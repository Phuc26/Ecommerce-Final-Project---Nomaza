<?php
namespace views;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Product</title>

    <style>
  body {font-family: Arial, Helvetica, sans-serif;
    background-color: black;
    color: white;}

    form {border: 3px solid #f1f1f1;
    width: 1500px;
    height: 550px;}

    input,select{width: 500px;
        border: 1px solid;
        height: 40px;
        padding: 5px; 
        margin-bottom: 10px
    }
   input, textarea {
  background-color: black;}


button{
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
  background-color: #626567 }

  
  a {
      text-decoration: none;
      color: white;
      font-size: 20px;
    }
    .site-header { 
      border-bottom: 5px solid #ccc;
      padding: .5em 1em;
      display: flex;
      justify-content: space-between;
    }

    .site-identity h1 {
      margin: .1em 0;
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

    option{
      background-color: black;
    }

    select{
      background-color: black;
    }


    </style>
</head>
<body>


<header class="site-header">
        <div class="site-identity">
            <h1>NozamaF™</h1>
        </div>  
        <nav class="site-navigation">
            <ul class="nav">
                <li><a href="http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=product&action=index">Product page</a></li>
            </ul>
        </nav> 
  </header>




<?php

class ProductCreate
{
    function render(...$data)
    {
        $categories = $data[0];
        echo '
        <center><h1>Add product</h1>
        <br>
            <form action="" method="post" enctype="multipart/form-data">
               <center> <div class="container">
               <br>
                    <label for="product_name">Enter product name:</label><br>
                    <input type="text" id="product_name" name="product_name" required><br>
                    <label for="product_price">Enter price:</label><br>
                    <input type="number" id="product_price" name="product_price" required><br>
                    <label for="product_quantity">Enter quantity:</label><br>
                    <input type="number" id="product_quantity" name="product_quantity" required><br>
                    <label for="product_image">Enter image:</label><br>
                    <input type="file" id="product_image" name="product_image" required><br>
                    <label for="product_description">Enter description:</label><br>
                    <input type="text" id="product_description" name="product_description" required><br>

                    <label for="category_id">Enter category:</label><br>
                    <select id="category_id" name="category_id" required>
<option value="">--Select--</option>';
        foreach ($categories as $category){
            echo "<option value='".$category->category_id."'>$category->category_name</option>";
        }
        echo '</select>

<br>
<br>
                    <button type="submit" name="create">Register</button>

                </div> 
            </form>
        </center>';

    }
}

?>
</body>
</html>