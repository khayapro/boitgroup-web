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
	
	if($_POST['message']!='nope'){
		$messageBody .= 'Message: ' . $_POST['message'] . '' . "\n";
	}
	
	if($_POST["stripHTML"] == 'true'){
		$messageBody = strip_tags($messageBody);
	}

	$to = 'info@boitent.co.za';	

	$header = array (
		'From'  	=> 'info@boitent.co.za',
		'To'		=> $to,
		'Subject' 	=>  'CONTACT FORM: Message from a visitor on your site: name -  ' . $_POST["name"]
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
        return;
 	 }
	
?>