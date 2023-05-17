<?php
namespace views;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <style>
body {font-family: Arial, Helvetica, sans-serif;
    background-color: black;
    color: white;}

    form {border: 3px solid #f1f1f1;
    width: 1500px;
    height: 550px;}

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid;
            text-align: center;
        }
        .place_order{
            background: deeppink;
            color: white;
            padding:10px;
            font-weight: bold;
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
                <li><a href="http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=buyer&action=index">Product page</a></li>
                <li><a href="http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=buyer&action=logout">Logout</a></li>
            </ul>
        </nav> 
  </header>




<?php


class CartIndex
{
    function render(...$data)
    {
        $cartData = $data[0];

       echo "<h2>My cart</h2>";
        $html = '<table id="sellerProducts">';
        $html .= "<th>Image</th><th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
                ";

        foreach ($cartData as $p) {
            $imagePath = "images/" . $p->product_image;
            $html .= "<tr>
                    <td><img src='" . $imagePath . "' width='100'/></td>
                    <td>" . $p->product_name . "</td>
                    <td>" . $p->price . "</td>
                    <td>" . $p->qty . "</td>
                    <td>
                    <a href='http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=cart&action=delete&cartId=" . $p->cart_id . "'>Remove</a>
                    </td>
                    </tr>";
        }

        $html .= "</table>";
        if(count($cartData) > 0){
            $html .= "<br><br><a class='place_order' href='http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=order&action=create'>Place Order</a>";

        }

        echo $html;

    }
}

?>
</body>
</html>