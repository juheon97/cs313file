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
    <link rel="stylesheet" href="styleprove03.css">
    <title>Homepage</title>
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
    <div class = "box-area">
            <div class = "single-box">
                <div class = "img-area">
                    <a href="prove03_01.php"><img src="dargon.png" style="width:150px; height:150px" title="dragon" alt="elder"></a>
                </div>
                <div class = "img-text">
                    <span class = "header-text"><strong>Elder Dragon Figure</strong></span>
                    <p>US $25.00</p>
                </div>
            </div>
            <div class = "single-box">
                <div class = "img-area">
                    <a href="prove03_02.php"><img src="ahri.png" style="width:150px; height:170px" title="ahri" alt="kda"></a>
                </div>
                <div class = "img-text">
                    <span class = "header-text"><strong>K/DA Ahri</strong></span>
                    <p>US$25.00</p>
                </div>
            </div>
            <div class = "single-box">
                <div class = "img-area">
                    <a href="prove03_03.php"><img src="kaisa.png" style="width:150px; height:150px" title="kaisa" alt="arcade"></a>
                </div>
                <div class = "img-text">
                    <span class = "header-text"><strong>Arcade Kaisa</strong></span>
                    <p>US $25.00</p>
                </div>
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