<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$to = 'huydoan95.httt@gmail.com';
$subject = 'This is an email';
$body = 'This is a test email. Hope you got it!';
$header = 'From: d13ht01@gmail.com';

if (mail($to, $subject, $body, $header)){
    echo 'Email has been sent to '.$to;
}
 else {
     echo 'There was an error sending the email!';
}
    
?>
