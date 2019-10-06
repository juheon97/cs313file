<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="figure.css">
    <script src = "https://code.jquery.com/jquery-3.3.1.js"></script>   
    <link rel="stylesheet" type="text/css" href="jquery.exzoom.css">
    <script src = "jquery.exzoom.js"></script>  
    <script src = "prove3.js"></script>  
    <script>
        $(function(){

            $("#exzoom").exzoom({
              "autoPlay": false 
        });

    });
    </script>
    <title>Figure01</title>
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
    <form name="form1" action="addtocart.php" method="post">
   <div class="t_center">
       <h3>Elder Dragon XL Figure</h3> <p>$ 25.00 </p>
       <input type="hidden" value="25.00" name="price">
       <input type="hidden" value="Elder Drake XL Figure" name="figure"> 
       <input id="btn1" class="btn btn-info" name="button1" type = submit value ="Add to Cart">

    </form>
       <br>
       <br>
   </div>
    <div class="exzoom" id="exzoom">
        <div class="exzoom_img_box">
            <ul class='exzoom_img_ul'>
                 <li><img src="dargon.png" style="float:left"></li>
            </ul>
            
        </div>
        
    </div>
    
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
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