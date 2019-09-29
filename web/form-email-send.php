<?php

    require_once "Mail.php";

    $from = '<juheon6463@gmail.com>'; 
    $to = $_POST['email'];
    $subject = $_POST['subject'];
    $body = $_POST['message']; 
    
    $headers = array(
        'From' => $from,
        'To' => $to,
        'Subject' => $subject
    );
    
    $smtp = Mail::factory('smtp', array(
            'host' => 'ssl://smtp.gmail.com',
            'port' => '465',
            'auth' => true,
            'username' => 'juheon6463@gmail.com', 
            'password' => 'sK12564!@' 
        ));
    
    
    $mail = $smtp->send($to, $headers, $body);
    
    //check mail sent or not
    if (PEAR::isError($mail)) {
        echo '<p>'.$mail->getMessage().'</p>';
    } else {
        echo '<p>Message successfully sent!</p>';
    }
?>