<?php
require_once 'Mail.php';


if($_POST['fullname']!='nope'){
    $messageBody .= 'Full Name: ' . $_POST['fullname'] . '' . "\n";
    $messageBody .= '' . "\n";
}
if($_POST['company_name']!='nope'){
    $messageBody .= 'Company Name: ' . $_POST['company_name'] . '' . "\n";
    $messageBody .= '' . "\n";
}else{
    $headers = '';
}

if($_POST['company_site']!='nope'){
    $messageBody .= 'Company Site: ' . $_POST['company_site'] . '' . "\n";
    $messageBody .= '' . "\n";
}

if($_POST['company_email']!='nope'){
    $messageBody .= 'Company email: ' . $_POST['company_email'] . '' . "\n";
}

if($_POST['phone_number']!='nope'){
    $messageBody .= 'Phone Number: ' . $_POST['phone_number'] . '' . "\n";
}

if($_POST['budget']!='nope'){
    $messageBody .= 'Your Budget: ' . $_POST['budget'] . '' . "\n";
}

if($_POST['talent_requested']!='nope'){
    $messageBody .= 'Talent Requested: ' . $_POST['talent_requested'] . '' . "\n";
}

if($_POST['service_needed']!='nope'){
    $messageBody .= 'Service Needed: ' . $_POST['service_needed'] . '' . "\n";
}

if($_POST['event_date']!='nope'){
    $messageBody .= 'Event Date: ' . $_POST['event_date'] . '' . "\n";
}

if($_POST['start_time']!='nope'){
    $messageBody .= 'Start Time: ' . $_POST['start_time'] . '' . "\n";
}

if($_POST['event_location']!='nope'){
    $messageBody .= 'Event Venue or Location: ' . $_POST['event_location'] . '' . "\n";
}

if($_POST['event_audience']!='nope'){
    $messageBody .= 'Event Audience Size: ' . $_POST['event_audience'] . '' . "\n";
}

if($_POST['booking_description']!='nope'){
    $messageBody .= 'Event description: ' . $_POST['booking_description'] . '' . "\n";
}




/*if($_POST["stripHTML"] == 'true'){
    $messageBody = strip_tags($messageBody);
}*/

$to = 'tumi@boitgroup.co.za';

$header = array (
    'From'  	=> 'to@domain.co.za',
    'To'		=> $to,
    'Subject' 	=>  'A booking request from your site visitor:  ' . $_POST["fullname"]
);

$auth = array (
    'auth'	=> true,
    'host'	=> 'Mail.domain.co.za',
    'username' => 'username@domain.co.za',
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
