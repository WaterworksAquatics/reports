<?php
header( "Cache-Control: no-cache, must-revalidate" ); // HTTP/1.1
header( "Expires: Mon, 28 Jan 2013 05:00:00 GMT" ); // Date in the past
	
	$mailSend = $_SERVER['DOCUMENT_ROOT'];
	$mailSend .= "/mail/sendMail.php";
	require $mailSend;

	// Form Responses
	session_start();
	$test = array( "test", "Test", "TEST");
	
	// Specific variables
	// Person requesting
	$name = str_replace( '%20', ' ', $_POST['name'] );
	// From
	$email = $_POST['email'];
	// Request type
	$type = $_POST['type'];
	// Name of employee
	$employee = str_replace( '%20', ' ', $_POST['employee'] );
	// Email address created
	$email1 = $_POST['email1'];
		$email1 = $email1 . "@waterworksswim.com";
		
	$allReqs = "jonny@maintenance.waterworksswim.com, victor@waterworksswim.com";
	
	$from = "EmailRequest@waterworksswim.com";
	
	// Create email address confirmation	
	if ( $type == "Create" ){
		
		if ( in_array( $name, $test ) ){
			$to = "jonny@maintenance.waterworksswim.com";
		}
		// Send to
		$to = "{$sendEmail}, {$email1}, {$allReqs}";
		//$to = "jonny@maintenance.waterworksswim.com";
		
		$subject = '[New Email] ' .$employee;
		$headers = "From: $from\r\n" .
					"MIME-Version: 1.0\r\n" .
					"Content-Type: text/html; charset=ISO-8859-\r\n";
		$content = '<html><body><div style="width: 700px">' .
						'<p style="text-align: center"><img src="http://images3.waterworksswim.com/images/emaillogo.png"><p>' .
						'<p>' .$name. ', </p>' .
						'<p>An email account has been created for ' .$employee. '.</p>' .
						'<p>Username (Adjusted): ' .$email1.'</p>' .
						'<p>Password: turb0</p>' .
						'<p>Please make sure that they update the password. The password must include one capital letter and one number.</p>' .
						'<p><a href="https://www.godaddy.com/help/change-my-email-password-8014">Password Update Instructions</a></p>' .
					'</div></body></html>';
		
	}
	else {
?>		
		<script>
			alert("No type is found. Please check link.");
			history.go(-1);
		</script>
	
<?	}
	
	//$sent = mail($to, $subject, $content, $headers);
	$sent = emailPrepSend($to, $from, $content, $subject);

	if($sent){
		echo "<script>window.location = '/it/confirm_sent.php'</script>";
	}
	else {
?>
		<script language=javascript>
			alert("We have encountered a problem, please try again at a later time");
			history.go(-1);
		</script>
		
<?	}

	session_destroy();
	exit;
	
?>