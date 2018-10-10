<?php
header( "Cache-Control: no-cache, must-revalidate" ); // HTTP/1.1
header( "Expires: Mon, 28 Jan 2013 05:00:00 GMT" ); // Date in the past

	$mailSend = $_SERVER['DOCUMENT_ROOT'];
	$mailSend .= "/mail/sendMail.php";
	require $mailSend;

	// Form Responses
	session_start();
	date_default_timezone_set('America/Los_Angeles');
	$date = date('M d, Y');
	$time = date('h:ia');
	$parts = array();
	$url = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH);
	$survey = $_SESSION['survey'];

	// Specific variables
	$name = $_POST['name'];
	$email = $_POST['email'];
	$location = $_POST['location'];
	$date1 = $_POST['date1'];
	$time1 = $_POST['time1'];
	$guard = $_POST['guard'];
	$type = $_POST['type'];
	$pool_loc = $_POST['pool_loc'];
	$volunteer = $_POST['volunteer'];
	$parent = $_POST['parent'];

	$spot = $_POST['spot'];
	$reach = $_POST['reach'];
	$quicker = $_POST['quicker'];
	$whistle = $_POST['whistle'];

	$correct = $_POST['correct'];
	$missed = $_POST['missed'];

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
			if ( empty( $survey ) || empty( $location ) ) {
?>
				<script language=javascript>
					alert( "Sorry! Something seems to be missing. Please re-submit." );
					history.go( -1 );
				</script>

<?php
			}

			// Form not missing variables - Send Email
			else {

				$from = "Evaluation@waterworksswim.com";

				// Send
				// Test Submission
				if ( in_array( $name, $test ) ){
					$to = "jonny@maintenance.waterworksswim.com";
				}
				// Normal Submission
				else {

					include ( "fetch.php" );

				}

				$subject = "$location: $survey submitted";

				$headers = "From: $email\r\n" .
							"MIME-Version: 1.0\r\n" .
							"Content-Type: text/html; charset=ISO-8859-\r\n";
				$body = '<html><body>' .
							'<p style="text-align: center"><img src="http://images3.waterworksswim.com/images/emaillogo.png"><p>' .
							'<p style="text-align: center; color: #316595; font-weight: bold">' .$survey. '</p>' .
							'<p style="text-align: center; color: #316595; font-weight: bold">' .$location. '</p>' .
							'<p style="text-align: center; color: #316595; font-weight: bold">Submitted by ' .$name. '</p>' .
							'<table style="margin: 0 auto; width: 400px;">' .
							'<tr><td style="color: #316595; width: 150px;">Deck Guard:</td><td style="width: 50px;">' .$guard. '</td>' .
							'<td style="color: #316595; width: 150px;">Pool Location:</td><td style="width: 50px;">' .$pool_loc. '</td></tr>' .
							'<tr><td style="color: #316595; width: 150px;">Date:</td><td style="width: 50px;">' .$date1. '</td>' .
							'<td style="color: #316595;">Volunteering Child:</td><td>' .$volunteer. '</td></tr>' .
							'<tr><td style="color: #316595;">Time:</td><td>' .$time1. '</td>' .
							'<td style="color: #316595;">Parent/Guardian:</td><td>' .$parent. '</td></tr>' .
							'<tr><td style="color: #316595;">Type of Drowning:</td><td>' .$type. '</td></tr>' .
							'</table>' .
							'<p><span style="color: #316595;">How long did it take for the Deck Guard to spot the victim?</span><br>' .$spot. ' seconds</p>' .
							'<p><span style="color: #316595;">How long did it take for the Deck Guard to reach the victim?</span><br>' .$reach. ' seconds</p>' .
							'<p><span style="color: #316595;">What could have been done to reach the victim quicker?</span><br>' .$quicker. '</p>' .
							'<p><span style="color: #316595;">Did the Deck Guard use proper whistle communication?</span><br>' .$whistle. '</p>' .
							'<p><span style="color: #316595;">If not, what did they not do correctly?</span><br>' .$correct. '</p>' .
							'<p><span style="color: #316595;">What step(s) were missed in their rescue procedure(if any)?</span><br>' .$missed. '</p>' .
							'<p><span style="color: #316595;">Comments</span><br>' .$comments. '</p>' .
							'<p style="text-align: center">Submitted on ' .$time. '</p>' .
							'</body></html>';

				//$sent = mail($to, $subject, $content, $headers);
				$sent = emailPrepSend($to, $from, $body, $subject); //New send function using PHP Mailer

				$to2 = $email;
				$subject2 = "You submitted a $survey";

				//$sent = mail($to2, $subject2, $content, $headers2);
				$sent1 = emailPrepSend($to2, $from, $body, $subject2);

				if ( in_array( $name, $test ) ) {
?>
					<script language=javascript>
						alert( "Test submitted to Jonny." );
					</script>
<?php
				}

				// Success
				if( $sent && $sent1 && ( $counter != 1 ) ) {

					echo "<script>window.location = '/confirm_report.php?url=" .$url. "'</script>";

					session_destroy();
					exit;

					$counter = 1;

				}
				// Failed
				else { ?>

					<script language=javascript>
						alert("We have encoutered a problem, please try again at a later time");
						history.go(-1);
					</script>

<?php			}
			}
//		}

			session_destroy();
			exit;

?>
