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