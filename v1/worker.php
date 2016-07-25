<?php


    require "PHPMailer/PHPMailerAutoload.php";

  require "php-redis-client/src/autoloader.php";
        date_default_timezone_set('Etc/UTC');
  

use RedisClient\RedisClient;
use RedisClient\Client\Version\RedisClient2x6;

// Example 1. Create new Instance for Redis version 2.8.x with config via factory

$Redis = new RedisClient([
    'server' => 'tcp://127.0.0.1:6379', // or 'unix:///tmp/redis.sock'
    'timeout' => 2
]);


    
  





    while(true){
    
    
    echo 1;
    
    $cnt=$Redis->executeRaw(['lpop', 'elist']);
    
    if($cnt!=null && $cnt!=""){
    
    $arr=explode("$$$",$cnt);
    
    
    
    send($arr[0],$arr[1]);
    
    }
    
    echo 2;
    
    sleep(5);
    
    }
    
    
    



function send($to,$body){
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "dashypertext@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "wasmachtsdu";
//Set who the message is to be sent from
$mail->setFrom('dashypertext@gmail.com', 'First Last');
//Set an alternative reply-to address
$mail->addReplyTo('dashypertext@gmail.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress($to, 'John Doe');
//Set the subject line
$mail->Subject = 'Your Conversation';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($body);
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}

}
