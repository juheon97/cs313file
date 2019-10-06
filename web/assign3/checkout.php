<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="styleprove03_03.css">
    <title>Checkout</title>
</head>
<body>
<nav>
        <ul>
            <li><a href="../prove02_02.php">HOME</a></li>
            <li><a href="prove3.php">PRODUCTS</a>
                <ul>
                    <li><a href="prove3.php">Figures</a></li>
                </ul>
            </li>
            <li><a href="viewcart.php"><img src='shopping.png' class="logo-image" title="View Cart"></a></li>
        </ul>
    </nav>
    <br>
    <br>
    <br>
    <br>
    <div id = "container">
                <div id = "valid_form">
                    <form action = "comfirm.php" method = "POST" id = "whole_form" class = "whole_form">
                        <table style = "margin: 10px;"> 
                            <tr>
                                <td>First Name:</td>
                                <td><input type = "text" name = "f_name"  id = "f_name" size = "50" >
                            <tr>
                                <td>Last Name:</td>
                            <td><input type = "text" name = "last_name" id = "last_name" size = "50" >
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td><textarea rows="4" cols="50" name = "address" id = "address" placeholder = "street address, city, state, and zip"></textarea></td>
                            </tr>
                            <tr>
                                <td>Phone:</td>
                                <td><input type = "text" name = "phone" id = "phone"  placeholder = "000-000-0000" size = "50" >
                            </tr>
                            <br>
                            <tr>
                                <td><input id="validate" name = "validate" type="submit" class="btn btn-success" value="Submit"></td>
                            </tr>
                            
                        </table>
                    </form>
                    
                        
                        
                </div>
            </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <hr>
    <footer id = "header-right">
        <br>
            <p>Posted by: Juheon Song</p>
            <p>Contact information: <a href="mailto:juheon6463@gmail.com"><i>juheon6463@gmail.com</i></a>.</p>
    </footer>
</body>
</html>