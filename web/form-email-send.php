<?php

    //require_once "Mail.php";

    //$from = '<juheon6463@gmail.com>'; 
    //$to = $_POST['email'];
    //$subject = $_POST['subject'];
    //$body = $_POST['message']; 
    
    //$headers = array(
        //'From' => $from,
        //'To' => $to,
        //'Subject' => $subject
    );
    
    //$smtp = Mail::factory('smtp', array(
            //'host' => 'ssl://smtp.gmail.com',
            //'port' => '465',
            //'auth' => true,
            //'username' => '', 
            //'password' => '' 
        //));
    
    
    //$mail = $smtp->send($to, $headers, $body);
    
    
    //if (PEAR::isError($mail)) {
        //echo '<p>'.$mail->getMessage().'</p>';
    //} else {
        //echo '<p>Message successfully sent!</p>';
    //}


    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if(empty($name)||empty($visitor_email) || empty($subject)) 
{
    echo "Name and email are mandatory!";
    exit;
}
    else {
    echo "Submitted Successfuly!"
    exit;
    }
?>