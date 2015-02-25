<?php
	require_once 'Mail.php';
	

	if($_POST['name']!='nope'){
		$messageBody .= '<p>Visitor: ' . $_POST["name"] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}
	if($_POST['email']!='nope'){
		$messageBody .= '<p>Email Address: ' . $_POST['email'] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}else{
		$headers = '';
	}
	
	if($_POST['phone']!='nope'){		
		$messageBody .= '<p>Phone Number: ' . $_POST['phone'] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}	
	
	if($_POST['message']!='nope'){
		$messageBody .= '<p>Message: ' . $_POST['message'] . '</p>' . "\n";
	}
	
	if($_POST["stripHTML"] == 'true'){
		$messageBody = strip_tags($messageBody);
	}

	$to = 'info@boitent.co.za';	

	$header = array (
		'From'  	=> 'info@boitent.co.za',
		'To'		=> $to,
		'Subject' 	=>  'A message from your site visitor ' . $_POST["name"]
	);
	
	$auth = array (
		'auth'	=> true,
		'host'	=> 'Mail.boitent.co.za',
		'username' => 'info@boitent.co.za',
		'password' => 'bhm123mope'
	);
	
	
	$smtp = Mail::factory('smtp', $auth);

	$mail = $smtp->send($to, $header, $messageBody);
 
 	if (PEAR::isError($mail)) {
 	 	 echo("<p>" . $mail->getMessage() . "</p>");
 	 } else {
  		 echo("<p>Message successfully sent!</p>");
 	 }
	
?>