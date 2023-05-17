<?php namespace views; ?>
<html>
<head>

    <style>
body {font-family: Arial, Helvetica, sans-serif;
      background-color: black;
      color: white;}


        .row {
            width: 100%;
            display: inline-block;
        }


        .product_box {
            width: 20%;
            display: inline-block;
            border: 1px solid;
            border-radius: 2px;
            text-align: center;
            padding: 5px;
            margin: 1rem;
        }

        .red {
            color: red;
        }
        .col-2{
            width: 200px;
            display: inline-block;
        }
        select, input{
            padding: 5px;
            height: 30px;
            background: white;
        }
        button{
            padding: 5px 10px;
            background: orange;
        }
        button:hover{
            cursor: pointer;
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
                <li><a href="http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=buyer&action=logout">Logout</a></li>
                <li><a href="http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=cart&action=index">My Cart</a></li>
                <li><a href="http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=order&action=buyerList">My Orders</a></li>
                <li><a href="http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=wishlist&action=index">My Wishlist</a></li>
                <li><a href="http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=seller&action=list">View the NozamaF sellers contact info</a></li>
            </ul>
        </nav> 
  </header>

  <h1>Welcome to NozamaF buyer page <?php echo ucfirst($_SESSION['buyer']->buyer_name); ?></h1>
<?php

class BuyerIndex
{

    function render(...$data)
    {
        $products = $data[0];
        $categories = $data[1];
        ?>
<div class="row">
    <form action="http://localhost/Ecommerce-Final-Project---Nomaza/index.php">
        <input type="hidden" name="resource" value="buyer">
        <input type="hidden" name="action" value="index">
        <div class="col-2">
            <select name="price">
                <option value="">--Sort by Price--</option>
                <option value="desc">Sort by highest</option>
                <option value="asc">Sort by lowest</option>
            </select>
        </div>
        <div class="col-2">
            <select name="rating">
                <option value="">--Sort by Rating--</option>
                <option value="desc">Sort by highest</option>
                <option value="asc">Sort by lowest</option>
            </select>
        </div>
        <div class="col-2">
            <select name="category">
                <option value="">--Sort by Category--</option>
                <?php
                foreach ($categories as $category){
                    echo "<option value='$category->category_id'>$category->category_name</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-2">
            <input type="text" name="product" placeholder="Search by product name">
        </div>
        <div class="col-2">
            <input type="text" name="seller" placeholder="Search by seller name">
        </div>
        <div class="col-2">
            <button type="submit" name="filter">Apply Filter</button>
        </div>
    </form>
</div>
        <div class="row">

            <?php foreach ($products as $product) { ?>
                <div class="product_box">
                    <img src="<?php echo "images/" . $product->product_image; ?>" width="100" height="100"/>
                    <br/>
                    <h4><?php echo $product->product_name; ?></h4>
                    <h4><?php echo "Seller: $product->seller_name"; ?></h4>
                    <h3 class="red">$<?php echo $product->product_price; ?></h3>
                    <a href="http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=buyer&action=productDetail&productId=<?php echo $product->product_id; ?>">View
                        product detail</a>
                </div>
            <?php } ?>
        </div>
        <?php

    }


}


?>

</body>
</html>