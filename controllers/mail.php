<?php
    $to = "head-office@microx-indonesia.com";
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $header = "From:".$_POST['email']." \r\n";
    $header = "SenderName:".$_POST['name']." \r\n";
    $retval = mail ($to,$subject,$message,$header);
    if( $retval == true ){
      echo "Message sent successfully!";
    }else{
      echo "Message could not be sent!";
    }