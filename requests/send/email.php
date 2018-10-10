<?php
header( "Cache-Control: no-cache, must-revalidate" ); // HTTP/1.1
header( "Expires: Mon, 28 Jan 2013 05:00:00 GMT" ); // Date in the past

	$mailSend = $_SERVER['DOCUMENT_ROOT'];
	$mailSend .= "/mail/sendMail.php";
	require $mailSend;

	// Form Responses
	session_start();
	date_default_timezone_set('America/Los_Angeles');
	$time = date('M. j, Y @ g:ia');
	$parts = array();
	$url = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH);
	$survey = $_SESSION['survey'];

	// Specific variables
	$name = $_POST['name'];
	$type = $_POST['type'];
	if( $type == "Forward"){
		$forDate = htmlentities( $_POST['forDate'] );
		$forTo = $_POST['forTo'];
	}
	$employee = $_POST['employee'];
	$email = $_POST['email'];
	$email1 = $_POST['email1'];
		$email1 = $email1 . '@waterworksswim.com';
	$duedate = $_POST['duedate'];
	$comments = $_POST['comments'];

	// Testing Parameter for "Name" field
	$test = array( "test", "Test", "TEST");

	// reCAPTCHA
	$secret = "6Lc0ZhoTAAAAAAWB5j48fcyEg8G9Q4b70sKzzl4N";
	$remoteip = $_SERVER['REMOTE_ADDR'];

	// Check reCAPTCHA when submitted
	if( isset( $_POST['g-recaptcha-response'] ) ) {
	  $response = $_POST['g-recaptcha-response'];
	}

		// Failed - reCAPTCHA not checked
		if( !$response ) {
?>

			<script>
				alert( "Please check the reCAPTCHA box." );
				history.go( -1 );
			</script>

<?php

		}

		// Success - reCAPTCHA checked
		// Authenticate reCAPTCHA
		$verify = file_get_contents( "https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}&remoteip{$remoteip}" );
		$captcha_success = json_decode($verify);

		// Successful Authentication
//		if( $captcha_success->success==true ) {

			// Check for empty variables ( For bad form submission. )
			if ( empty( $survey ) ||  empty( $name ) ) {
?>
				<script language=javascript>
					alert("Sorry! Something seems to be missing. Please re-submit.");
					history.go(-1);
				</script>

<?php
			}
			else {

				$from = $email;

				// TEST
				if ( in_array( $name, $test ) ){
					$to = "victor@waterworksswim.com";
				}
				else {
					$to = "support@waterworksaquatics.zendesk.com";
				}

				$subject = '[Email Request] ' . $type . ' - ' . $employee;
				$headers = "From: $from\r\n" .
						   "MIME-Version: 1.0\r\n" .
						   "Content-Type: text/html; charset=ISO-8859-\r\n";
				$body = '<html><body>' .
							'<p style="text-align: center"><img src="http://images3.waterworksswim.com/images/emaillogo.png"><p>'.
							'<p style="text-align: center; color: #316595; font-weight: bold">A request has been submitted.</p>' .
							'<table style="margin: 0 auto; width: 300px;">' .
							'<tr style="height: 30px;"><td style="color: #316595; width: 100px;">Requestor Name:</td><td>' .$name. '</td></tr>' .
							'<tr style="height: 30px;"><td style="color: #316595; width: 100px;">Request Type:</td><td><a href="https://wcc.godaddy.com/email?cmd=planlistemail&locale=en-US">' .$type. '</a></td></tr>' .
							'<tr style="height: 30px;"><td style="color: #316595; width: 100px;">Employee\'s Full Name:</td><td> ' .$employee. '</td></tr>' .
							'<tr style="height: 30px;"><td style="color: #316595; width: 100px;">Employee\'s Email Address:</td><td> ' .$email1. '</td></tr>';
							if ( !empty( $forDate ) ){
				$body .=		'<tr style="height: 30px;"><td style="color: #316595; width: 100px;">Forward Until:</td><td> ' .$forDate. '</td></tr>' .
								'<tr style="height: 30px;"><td style="color: #316595; width: 100px;">Forward To:</td><td> ' .$forTo. '</td></tr>';
							}
				$body .=	'<tr style="height: 30px;"><td style="color: #316595; width: 100px;">Due Date:</td><td> ' .$duedate. '</td></tr>' .
							'<tr style="height: 30px;"><td style="color: #316595; width: 100px;">Comments:</td><td> ' .$comments. '</td></tr>' .
							'</table>' .
							'<p style="text-align: center">Submitted on ' .$time. '</p>' .
							'<p style="text-align: center">
								<a href="http://reports.waterworksswim.com/it/email/confirm.php' .
								'?name=' . $name .
								'&email=' . $email .
								'&type=' . $type .
								'&employee=' . $employee .
								'&email1=' . $email1;
								if ( $type == "Forward" ){
				$body .=			'&forDate=' . $forDate;
								}
				$body .=		'">
									<button style="border:none;width:125px;padding:3px;color:white;background-color:#579ae0;">
										Send Confirmation
									</button>
								</a>';
							if ( $type == "Create" ){
				$body .=		'<a href="http://reports.waterworksswim.com/requests/email_adjust.php' .
								'?name=' .$name .
								'&email=' .$email .
								'&type=' .$type .
								'&employee=' .$employee .
								'&email1=' .$email1 .
								'">
									<button style="border:none;width:125px;padding:3px;color:white;background-color:#579ae0;">
										Adjust Email
									</button>
								</a>';
							}
				$body .=	'</p>' .
							'</body></html>';

				//$sent = mail($to, $subject, $body, $headers);
				$sent = emailPrepSend($to, $from, $body, $subject);

				if($sent){

					if ( in_array( $name, $test ) ) {
?>
						<script language=javascript>
							alert( "Test submitted to Jonny." );
						</script>
<?php
					}

					echo "<script>window.location = '/confirm_request.php?url=" .$url. "'</script>";

				}
				else {?>
					<script language=javascript>
						alert("We have encoutered a problem, please try again at a later time");
						history.go(-1);
					</script>
			 <?	}
			}
//		}

		session_destroy();
		exit;
?>
