<?php
    $name = $_POST['name'];
    $v_email = $_POST['email'];
    $meg = $_POST['message'];
    $email_from = 'juheon6463@gmail.com';
    $email_subject = "New Form submission";
    $email_body = "You have received a new message from the user $name.\n". "Here is the message:\n $message".
    $to = "juheon6463@gmail.com";
    $headers = "From: $email_from \r\n";
    $headers .= "Reply-To: $v_email \r\n";



    if(empty($name)||empty($v_email)) 
{
    echo "Name and email are mandatory!";
    exit;
}

if(IsInjected($v_email))
{
    echo "Bad email value!";
    exit;
}

mail($to,$email_subject,$email_body,$headers);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/submission_style.css">
    <title>submission</title>
</head>
<body>

    <h1>Email has sent successfully</h1>
    <form>
        <input type="button" value="Return" onclick="history.back()">
    </form>
</body>
</html>