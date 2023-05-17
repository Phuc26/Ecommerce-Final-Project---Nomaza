<?php
namespace views;

?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>

        
body {font-family: Arial, Helvetica, sans-serif;
    background-color: black;
    color: white;}

    form {border: 3px solid #f1f1f1;
    width: 1500px;
    height: 550px;} 

        input[type=text], input[type=password], select {
            width: 50%;
            padding: 20px 20px;
            margin: 10px 0;
            display: inline-block;
            border: 2px solid #ccc;
            box-sizing: border-box;
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
            opacity: 0.8;
        }

        .container {
            padding: 40px;
            width: auto;
        }

        a{
            background-color: grey;
        }

    </style>
</head>

<body>
<br>
<center><h1>Give a review</h1>
    <form action="" method="post">
        <div class="container">
            <label for="seller_username">Write Comment:</label><br>
            <input type="text" id="seller_username" name="comment" required><br>

            <label for="rating">Give Rating:</label><br>
            <select name="rating" required>
                <option value="">Select Rating</option>
                <option value="5">5 Star</option>
                <option value="4">4 Star</option>
                <option value="3">3 Star</option>
                <option value="2">2 Star</option>
                <option value="1">1 Star</option>
            </select>
            <br><br>
            <button type="submit">Submit</button>

        </div></center>
</form>



<center>
</body>
</html>