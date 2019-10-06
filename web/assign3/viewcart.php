<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="styleprove03_02.css">
    <title>ShoppingCart</title>
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

    <div class="table-box">
        <div class="table-row table-head">
            <div class="table-cell">
                <p>Model Picture</p>
            </div>
            <div class="table-cell">
                <p>Name</p>
            </div>
             <div class="table-cell">
                <p>Price</p>
             </div>
             <div class="table-cell">
                <p>Remove From Cart</p>
             </div>
        </div>
    </div>

    <?php
    $dragon="dargon.png";
    $ahri="ahri.png";
    $kaisa="kaisa.png";
    $cart = $_SESSION['cart'];
    foreach ($cart as $i => $value) {
        echo "<form class='cart_form' action='removefromcart.php' method='post'>";
        echo "<div class='table-box'>";
        echo "<div class='table-row'>";
        echo "<div class='table-cell'>";
        if ($cart[$i][0] == "Elder Drake XL Figure") {
            echo "<img class='img1' src='$dragon' alt='".$cart[$i][0]."'>";
        }
        else if ($cart[$i][0] == "K/DA Ahri") {
            echo "<img class='img1' src='$ahri' alt='".$cart[$i][0]."'>";
        }
        else{
            echo "<img class='img1' src='$kaisa' alt='".$cart[$i][0]."'>";
        };
        echo "</div>";
        echo "<div class='table-cell'>";
        echo "<p>".$cart[$i][0]. "</p>";
        echo "</div>";
        echo "<div class='table-cell'>";
        echo "<p>$ ".$cart[$i][1]."</p>";
        echo "</div>";
        echo "<div class='table-cell'>";
        echo "<input type='submit' class='btn btn-danger' value='Remove From Cart'>";
        echo "</div>";
        echo "</div>";
        echo "</div>";         
        echo "</form>";
    }       
    ?>
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