<?php namespace views; ?>
<html>
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



    <head>
        <h1><center>Sellers contact info</center></h1>
<style>
  body {font-family: Arial, Helvetica, sans-serif;
    background-color: black;
    color: white;}


#ordersTable {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  color: black;
}

#ordersTable td, #ordersTable th {
  border: 1px solid #ddd;
  padding: 8px;
  color:white;
}


#ordersTable tr:hover {background-color: #ddd;}

#ordersTable th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: dark blue;
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

<?php
use models\Seller;

$seller = new Seller();

$sellers = $seller->getAll();

$html = '<table id="ordersTable">
            <th>Seller ID</th>
            <th>Seller Username</th>
            <th>Seller Name</th>
            <th>Seller Phone Number</th>
            ';

foreach($sellers as $s){

    $html .= '<tr>
                <td>'.$s['seller_id'].'</td>
                <td>'.$s['seller_username'].'</td>
                <td>'.$s['seller_name'].'</td>
                <td>'.$s['seller_phone'].'</td>
            </tr>';
}

$html .= '</table>';
echo $html;

?>
</body>
</html>