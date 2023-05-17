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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>    <title>Orders</title>
    <style>
        body {font-family: Arial, Helvetica, sans-serif;
      background-color: black;
      color: white;}
form {border: 3px solid #f1f1f1;
  width: 900px;
  height: 850px;}

        table {
            width: 100%;
            border-collapse: collapse;
            width: 1700px;
            height: 50px;
        }

        th, td {
            border: 1px solid;
            text-align: center;
        }

        .place_order {
            background: deeppink;
            color: white;
            padding: 10px;
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
                <li><a href="http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=product&action=index">Product page</a></li>
                <li><a href="http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=seller&action=logout">Logout</a></li>
            </ul>
        </nav> 
  </header>

<?php

class orderhistory
{
    function render(...$data)
    {
        $orderData = $data[0];
        echo "<h2>Order History</h2>";
        

        $html = '<table id="sellerProducts">';
        $html .= "<th>Product</th>
                <th>Price</th>
                <th>Status</th>
                <th>Cancel Order</th>
                <th>Shipped Order</th>
                ";

        foreach ($orderData as $p) {
            $html .= "<tr>
                    <td>" . $p->product_name . "</td>
                    <td>" . $p->price . "</td>
                    <td>" . $p->order_status . "</td>";

            if ($p->order_status == "new") {
                $html .= "<td>
                    <a href='http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=order&action=cancel&orderId=" . $p->order_id . "'>Cancel</a>
                    </td>";
                $html .= "<td>
                    <a href='http://localhost/Ecommerce-Final-Project---Nomaza/index.php?resource=order&action=shipped&orderId=" . $p->order_id . "'>Shipped</a>
                    </td>";
            } else {
                $html .= "<td></td>";
                $html .= "<td></td>";
            }

            $html .= "</tr>";

        }

        $html .= "</table>";
        echo $html;

    }
}

?>
</body>
</html>