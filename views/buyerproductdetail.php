<?php namespace views; ?>
<html>
<head>
    <style>
          body {font-family: Arial, Helvetica, sans-serif;
    background-color: black;
    color: white;}

        .row {
            width: 100%;
            display: flex;
        }

        .col-4{
            width: 25%;
        }
        .col-8{
            width: 70%;
            margin-left: 5%;
        }
        .product_img{
            width: 100%;
            height: 300px;
        }
        .red {
            color: red;
        }
        .btn_cart{
            border-radius: 5px;
            border:1px solid;
            width: 100px;
            padding: 15px 20px;
            background: green;
            color: white;
        }
        .btn_wish{
            border-radius: 5px;
            border:1px solid;
            width: 100px;
            padding: 15px 20px;
            background: yellow;
            color: black;
        }


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


    </style>
</head>
<body>


<header class="site-header">
        <div class="site-identity">
            <h1>NozamaF™</h1>
        </div>  
        <nav class="site-navigation">
            <ul class="nav">
                <li><a href="http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=buyer&action=index"> Back to products list</a></li>
            </ul>
        </nav> 
  </header>

<h1>Product detail</h1>
<br/>
<br/>
<?php

class BuyerProductDetail
{

    function render(...$data)
    {
        $product = $data[0];
        $product = $data[0];
        ?>
        <div class="row">
            <div class="col-4">
                <img src="images/<?php echo $product->product_image;?>" class="product_img" />
            </div>
            <div class="col-8">
                <h1><?php echo $product->product_name;?></h1>
                <h2 class="red">$<?php echo $product->product_price; ?></h2>
                <p><?php echo $product->product_description; ?></p>
                <br />
                <a href="http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=cart&action=add&productId=<?php echo $product->product_id; ?>" class="btn_cart">Add to cart</a>
                &nbsp;
                &nbsp;
                <a href="http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=wishlist&action=add&productId=<?php echo $product->product_id; ?>" class="btn_wish">Add to wishlist</a>
            </div>
        </div>


    <?php
    }


}


?>

</body>
</html>