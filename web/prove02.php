<?php
    $name = $_POST['name'];
    $v_email = $_POST['email'];
    $meg = $_POST['message'];
    $email_from = 'son16007@byui.edu';
    $email_subject = "New Form submission";
    $email_body = "You have received a new message from the user $name.\n". "Here is the message:\n $message".
    $to = "son16007@byui.edu";
    $headers = "From: $email_from \r\n";
    $headers .= "Reply-To: $v_email \r\n";
    mail($to,$email_subject,$email_body,$headers);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/prove02style.css">
    <title>Homepage</title>
</head>
<body>
<section>
<div class="topnav">
    <div class = "topnav-centered">
        <a id = "active" href = "prove02_2.php">CS Home</a>
    </div> 
    <a  href = "prove02.php">About Me</a>
</div>
</section>

<section>
    <div class='center_div'>
<h1><em>Welcome to my Page</em></h1>
        
        <img src="me.jpg" alt="Juheon Song" width="250" height="222">
        <h2>Juheon Song</h2>
        <p>Hello, my name is Juheon Song from South Korea. My major is Data Science in BYUI. During my spare time, I usually study programming to pursue my future career. I personally love playing video games, too.</p>
        <p>One thing I love the most in BYUI is the education. I was able to make a good relationship with professors in CS department, and they always welcome students who do have a question about programming.</p>
        <p>I have been a member of the church since I was 12 years old. My parents are not members of the church so as my sister. I am the only members in my family, but I still love being the member of the church.</p>
        <p>Actually, it is my last semester in BYUI. I have one internship to graduate right now. I am currently taking web engineering II, so I do know about web stuff. The reasons why I am taking this course is to learn basic about web programming since I am not good at web coding and fullfilling my 12 credits.</p>
      
</div>
</section>
    <hr>

    <h1 class='h'>Send me an Email</h1>

    <div id = "container">
        <div id = "valid_form">
            <form method="post" name="myemailform" action="form-to-email.php">
            Enter Name: <input type="text" name="name">
            Enter Email Address:    <input type="text" name="email">
            Enter Message:  <textarea name="message"></textarea>
            <input type="submit" value="Send Form">
            </form>
        </div>
    </div>

    
</body>
</html>