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
	$f_date =  $_POST['f_date'];
	$BK_TIME = $_POST['BK_TIME'];
	$BK_cameras = $_POST['BK_cameras'];
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
			if ( empty( $survey ) ||  empty( $name ) ) {
?>
				<script language=javascript>
					alert("Sorry! Something seems to be missing. Please re-submit.");
					history.go(-1);
				</script>

<?php
			}

			else {

				$from = "Request@waterworksswim.com";

				// TEST
				if ( in_array( $name, array('test', 'TEST') ) ){
					$to = "jonny@maintenance.waterworksswim.com";
				}
				else {
					$to = "jonny@maintenance.waterworksswim.com, victor@waterworksswim.com";
				}

				$subject = "$survey Submitted";
				$headers="From: $from\r\n" .
						"MIME-Version: 1.0\r\n" .
						"Content-Type: text/html; charset=ISO-8859-\r\n";
				$content = '<html><body>' .
							'<p style="text-align: center"><img src="http://images3.waterworksswim.com/images/emaillogo.png"><p>' .
							'<p style="text-align: center; color: #316595; font-weight: bold">A ' .$survey. ' has been submitted.</p>' .
							'<table style="margin: 0 auto; width: 300px;">' .
							'<tr style="height: 30px;"><td style="color: #316595; width: 75px;">Name:</td><td>' .$first. ' ' .$last. '</td></tr>' .
							'<tr style="height: 30px;"><td style="color: #316595;">Location:</td><td>' .$location. '</td></tr>' .
							'<tr style="height: 30px;"><td style="color: #316595;">Date:</td><td>' .$f_date. '</td></tr>';

							foreach($BK_TIME as $a => $b){
								$content .= '<tr style="height: 30px;"><td style="color: #316595;">Timeframe:</td><td>' . $BK_TIME[$a] . '</td></tr>';
							}

							foreach($BK_cameras as $a => $b){
								$content .= '<tr style="height: 30px;"><td style="color: #316595;">Cameras:</td><td>' . $BK_cameras[$a] . '</td></tr>';
							}

				$content .= '</table>' .
							'<p style="text-align: center">Submitted on ' .$time. '</p>' .
							'</body></html>';
				//$sent = mail($to, $subject, $content, $subject);
				$sent = emailPrepSend($to, $from, $content, $subject);

				if ( in_array( $name, $test ) ) {
?>
					<script language=javascript>
						alert( "Test submitted to Jonny." );
					</script>
<?php
				}

				//For requestor
				$to2 = $email;
				$subject2 = "Your request has been received";
				$sent2 = mail($to2, $subject2, $content, $subject2);

				if($sent){
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
