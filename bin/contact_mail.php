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

$to = 'tumi@boitgroup.co.za';

$header = array (
    'From'  	=> 'tumi@boitgroup.co.za',
    'To'		=> $to,
    'Subject' 	=>  'A message from your site visitor : ' . $_POST["name"]
);

$auth = array (
    'auth'	=> true,
    'host'	=> 'Mail.boittm.co.za',
    'username' => 'tumi@boitgroup.co.za',
    'password' => 'Pl@ys#2BoiT'
);


$smtp = Mail::factory('smtp', $auth);

$mail = $smtp->send($to, $header, $messageBody);

if (PEAR::isError($mail)) {
    echo("<p>" . $mail->getMessage() . "</p>");
} else {
    echo("<p>Message successfully sent!</p>");
}

?>