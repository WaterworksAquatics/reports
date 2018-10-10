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
	$name = str_replace( '%20', ' ', $_GET['name'] );
	// From
	$email = $_GET['email'];
	// Request type
	$type = $_GET['type'];
	// Name of employee
	$employee = str_replace( '%20', ' ', $_GET['employee'] );
	// Email address created
	$email1 = $_GET['email1'];
	// Forward Date
	if ( $type == "Forward" ){
		$forDate = html_entity_decode( $_GET['forDate'] );
	}
	
	$allReqs = "jonny@maintenance.waterworksswim.com, victor@waterworksswim.com";
		
	$from = "EmailRequest@waterworksswim.com";
	
	// Create email address confirmation	
	if ( $type == "Create" ){
		
		// Send to
		// Test
		if ( in_array( $name, $test ) ){
			$to = "jonny@maintenance.waterworksswim.com";
		}
		// Normal
		else {
			$to = "{$email}, {$email1}, {$allReqs}";
		}
		
		$subject = '[New Email] ' .$employee;
		$headers = "From: $from\r\n" .
					"MIME-Version: 1.0\r\n" .
					"Content-Type: text/html; charset=ISO-8859-\r\n";
		$content = '<html><body><div style="width: 700px">' .
						'<p style="text-align: center"><img src="http://images3.waterworksswim.com/images/emaillogo.png"><p>' .
						'<p>' .$name. ', </p>' .
						'<p>An email account has been created for ' .$employee. '.</p>' .
						'<p>Username: ' .$email1.'</p>' .
						'<p>Password: turb0</p>' .
						'<p>Please make sure that they update the password. The password must include one capital letter and one number.</p>' .
						'<p><a href="https://www.godaddy.com/help/change-my-email-password-8014">Password Update Instructions</a></p>' .
						'<p>Thank you</p>' .
					'</div></body></html>';
		
	}
	// Delete email address confirmation
	elseif ( $type == "Delete" || $type == "Forward" ) {		
		
		// Send to
		// Test
		if ( in_array( $name, $test ) ){
			$to = "jonny@maintenance.waterworksswim.com";
		}
		// Normal
		else {
			$to = "{$email}, {$allReqs}";
		}
		
		if ( $type == "Delete" ){
			
			$subject = '[Email Deleted] ' .$employee;
			$headers = "From: $from\r\n" .
						"MIME-Version: 1.0\r\n" .
						"Content-Type: text/html; charset=ISO-8859-\r\n";
			$content = '<html><body>' .
							'<p style="text-align: center"><img src="http://images3.waterworksswim.com/images/emaillogo.png"><p>'.
							'<p>' .$name. ', </p>' .
							'<p>' .$employee. '\'s email account has been deleted.</p>' .
							'<p>Thank you</p>' .
						'</body></html>';
		}		
		elseif ( $type == "Forward" ){
			
			$subject = '[Emails Forwarded] ' .$email1;
			$headers = "From: $from\r\n" .
						"MIME-Version: 1.0\r\n" .
						"Content-Type: text/html; charset=ISO-8859-\r\n";		
			$content = '<html><body>' .
							'<p style="text-align: center"><img src="http://images3.waterworksswim.com/images/emaillogo.png"><p>' .
							'<p>' .$name. ', </p>' .
							'<p>
								Emails sent to ' .$email1. ' are now being forwarded until ' .$forDate. '. A reminder has been set to delete the account after this date has been reached.
							</p>' .
							'<p>Thank you</p>' .
						'</body></html>';
			
		}
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