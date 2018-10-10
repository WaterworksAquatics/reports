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
	$first = $_POST['first'];
	$last = $_POST['last'];
	$email = $_POST['email'];
	$location = $_POST['location'];
	$reason =  $_POST['reason'];
	$gender =  $_POST['gender'];
	$size = $_POST['size'];
	$type = $_POST['type'];

	$norcal = array( 'San Jose', '20th Avenue', 'Sunnyvale', 'Hayward', 'North San Jose', 'Almaden' );
	$denver = array( 'Highlands Ranch' );

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
			session_destroy();
			exit;
		}

		// Success - reCAPTCHA checked
		// Authenticate reCAPTCHA
		$verify = file_get_contents( "https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}&remoteip{$remoteip}" );
		$captcha_success = json_decode($verify);

		// Successful Authentication
//		if( $captcha_success->success==true ) {

			// Check for empty variables ( For bad form submission. )
			if ( empty( $survey ) ||  empty( $first ) ) {
?>
				<script language=javascript>
					alert("Sorry! Something seems to be missing. Please re-submit.");
					history.go(-1);
				</script>

<? 			}

			else {

				$from = "Request@waterworksswim.com";

				// TEST
				if ( in_array( $first, $test ) ){
					$to = "jonny@maintenance.waterworksswim.com";
				}
				else {

					// Submitted
					$to = "cindysupport@waterworksswim.com, kelsey.b@waterworksswim.com";

					if ( in_array( $location, $norcal ) ) {
						$to .= ", lia@waterworksswim.com, kim.r@waterworksswim.com";
					}
					elseif ( $location == "Highlands Ranch" ) {
						$to .= ", brooklyn@waterworksswim.com";
					}
					else {
						$to .= ", brooklyn@waterworksswim.com, nancy@waterworksswim.com";
					}
				}

				$subject = "$survey Submitted";
				$headers = "From: $from\r\n" .
						   "MIME-Version: 1.0\r\n" .
						   "Content-Type: text/html; charset=ISO-8859-\r\n";
				$body = '<html><body style="padding: 5px; max-width: 800px; margin: 0 auto;"><div style="background: white; padding: 10px; margin: 15px; border-radius: 10px;">' .
							'<p style="text-align: center"><img src="http://images3.waterworksswim.com/images/emaillogo.png"><p><hr>' .
							'<p style="text-align: center; color: #316595; font-weight: bold">' .$survey. '</p>' .
							'<table style="margin: 0 auto; width: 300px;">' .
							'<tr style="height: 30px;"><td style="color: #316595; width: 75px;">Name:</td><td>' .$first. ' ' .$last. '</td></tr>' .
							'<tr style="height: 30px;"><td style="color: #316595;">Email:</td><td>' .$email. '</td></tr>' .
							'<tr style="height: 30px;"><td style="color: #316595;">Location:</td><td>' .$location. '</td></tr>' .
							'<tr style="height: 30px;"><td style="color: #316595;">Reason:</td><td>' .$reason. '</td></tr>' .
							'<tr style="height: 30px;"><td style="color: #316595;">Gender:</td><td>' .$gender. '</td></tr>' .
							'<tr style="height: 30px;"><td style="color: #316595;">Size:</td><td>' .$size. '</td></tr>';
							if($gender == "Female"){
								$body .= '<tr style="height: 30px;"><td style="color: #316595;">Type:</td><td>' .$type. '</td></tr>';
							}
				$body .= '</table>' .
							'<p style="text-align: center; font-size: 8pt; color: #969595">Submitted on ' .$time. '</p>' .
							'</div></body></html>';

				//$sent = mail($to, $subject, $content, $headers);
				$sent = emailPrepSend($to, $from, $body, $subject);

				if($sent){

					// Email Receipt
					$to2 = $email;

					$subject2 = "You submitted a $survey";

					$body2 = '<html><body style="padding: 5px; max-width: 800px; margin: 0 auto;"><div style="background: white; padding: 10px; margin: 15px; border-radius: 10px;">' .
								'<p style="text-align: center"><img src="http://images3.waterworksswim.com/images/emaillogo.png"><p><hr>' .
								'<p style="text-align: center; color: #316595; font-weight: bold">Your ' .$survey. '</p>' .
								'<table style="margin: 0 auto; width: 300px;">' .
								'<tr style="height: 30px;"><td style="color: #316595; width: 75px;">Name:</td><td>' .$first. ' ' .$last. '</td></tr>' .
								'<tr style="height: 30px;"><td style="color: #316595;">Location:</td><td>' .$location. '</td></tr>' .
								'<tr style="height: 30px;"><td style="color: #316595;">Gender:</td><td>' .$gender. '</td></tr>' .
								'<tr style="height: 30px;"><td style="color: #316595;">Size:</td><td>' .$size. '</td></tr>';
								if($gender == "Female"){
									$body2 .= '<tr style="height: 30px;"><td style="color: #316595;">Type:</td><td>' .$type. '</td></tr>';
								}
					$body2 .= '</table>' .
								'<p style="text-align: center; font-size: 8pt; color: #969595">Submitted on ' .$time. '</p>' .
								'</body></html>';

					//$sent = mail($to2, $subject2, $content2, $headers2);
					$sent = emailPrepSend($to2, $from, $body2, $subject2);

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
			<? }
			}
//		}

		session_destroy();
		exit;
?>
