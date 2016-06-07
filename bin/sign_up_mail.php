<?php
require_once 'Mail.php';


if($_POST['name']!='nope'){
    $messageBody .= 'Visitor: ' . $_POST["name"] . '' . "\n";
    $messageBody .= '' . "\n";
}
if($_POST['email']!='nope'){
    $messageBody .= 'Email Address: ' . $_POST['email'] . '' . "\n";
    $messageBody .= '' . "\n";
}else{
    $headers = '';
}

if($_POST['phone']!='nope'){
    $messageBody .= 'Phone Number: ' . $_POST['phone'] . '' . "\n";
    $messageBody .= '' . "\n";
}

if($_POST['subject']!='nope'){
    $messageBody .= 'Subject: ' . $_POST['subject'] . '' . "\n";
    $messageBody .= '' . "\n";
}


if($_POST['message']!='nope'){
    $messageBody .= 'Message: ' . $_POST['message'] . '' . "\n";
}

/*if($_POST["stripHTML"] == 'true'){
    $messageBody = strip_tags($messageBody);
}*/

$to = 'to@domain.co.za';

$header = array (
    'From'  	=> 'from@boit.co.za',
    'To'		=> $to,
    'Subject' 	=>  'A talent message from your site visitor : ' . $_POST["name"]
);

$auth = array (
    'auth'	=> true,
    'host'	=> 'Mail.domain.co.za',
    'username' => 'username@domain.com',
    'password' => 'password'
);


$smtp = Mail::factory('smtp', $auth);

$mail = $smtp->send($to, $header, $messageBody);

if (PEAR::isError($mail)) {
    echo("<p>" . $mail->getMessage() . "</p>");
} else {
    echo("<p>Message successfully sent!</p>");
}

?>
