<?php
    session_start();    
?>

<!DOCTYPE html>
<html lang = "en">
<head> 

<style>    
</style>
<title>ViewCart</title>
<?php
    include('itemarray.php');
?>
</head>
    
    
<body>
    
<?php
         $totalPrice = 0;
         foreach ($_SESSION['cart'] as $id) {
          echo "<button class=\"btn btn-primary btn-sm buttonCSS\" onclick=\"removeFromCart('".$id."')\">Remove From Cart</button> ";
          echo "<span class=\"text\">{$idAssoc[$id]['name']}     <span class=\"textPrice\">\${$idAssoc[$id]['price']}.00</span></span><br>";
          $totalPrice += $idAssoc[$id]["price"];
        }
        ?>
    
</body>
</html>
