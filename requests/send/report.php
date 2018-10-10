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
	$chkbox = $_POST['chk'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$report = $_POST['report'];
	$locations = $_POST['locations'];
	$specific = $_POST['specific'];
	$question = $_POST['question'];
	$type = $_POST['type'];
	$recipients = $_POST['recipients'];
	$position = $_POST['position'];
	$nopos = $_POST['nopos'];
	$comments = $_POST['comments'];
	$c = 1;

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

				$from = "ReportRequest@waterworksswim.com";

				// TEST
				if ( in_array( $name, $test ) ){
					$to = "jonny@maintenance.waterworksswim.com";
				}

				else {
					$to = "jonny@maintenance.waterworksswim.com, victor@waterworksswim.com";
				}

				$subject = 'New Report Request: ' .$report. '';
				$headers = "From: $from\r\n" .
							"MIME-Version: 1.0\r\n" .
							"Content-Type: text/html; charset=ISO-8859-\r\n";
				$content = '<html><body>' .
							'<p style="text-align: center"><img src="http://images3.waterworksswim.com/images/emaillogo.png"><p>' .
							'<p style="text-align: center; color: #316595; font-weight: bold">A ' .$survey. ' has been submitted.</p>' .
							'<table style="margin: 0 auto; width: 300px;">' .
							'<tr style="height: 30px;"><td style="color: #316595; width: 100px;">Requestor:</td><td>' .$name. '</td></tr>' .
							'<tr style="height: 30px;"><td style="color: #316595; width: 100px;">Report Name:</td><td>$survey = "'.$report.'";</td></tr>';

								if ($locations == "specific") {
									$content .= '<tr style="height: 30px;"><td style="color: #316595; width: 100px;">Locations:</td><td>' .$specific. '</td></tr>';
								}
								else {
									$content .= '<tr style="height: 30px;"><td style="color: #316595; width: 100px;">Locations:</td><td>' .$locations. '</td></tr>';
								}

				$content .= '</table>' .
							'<div>' .
							'<h1 style="font-size: 10pt;font-weight: bold;color: rgb(142, 142, 142);">Questions</h1>'.
							'<p>$questions = array( <br>';

							$questions = array_combine( $question, $type );
							$tab = str_repeat("&nbsp;", 20);
							foreach( $questions as $question => $type ){

								$content .=  $tab . ' array( "' . $question . '", ' . $type . ' ),<br>';

							}

				$content .= ');</p></div>' .
							'<p><h1 style="font-size: 10pt;font-weight: bold;color: rgb(142, 142, 142);">Recipients</h1>' . $recipients . '</p>';

							if(!empty($position)){
								$content .=	'<p><h1 style="font-size: 10pt;font-weight: bold;color: rgb(142, 142, 142);">Position:</h1> ' . $position . '</p>';
							}
								else{
									$content .= '<p><h1 style="font-size: 10pt;font-weight: bold;color: rgb(142, 142, 142);">Position:</h1> ' . $nopos . '</p>';
								}

				$content .= '<p><h1 style="font-size: 10pt;font-weight: bold;color: rgb(142, 142, 142);">Comments:</h1> ' . $comments. '</p>' .
							'</body></html>' .
							'<p style="text-align: center">Submitted on ' .$time. '</p>';

				//$sent = mail($to, $subject, $content, $headers);
				$sent = emailPrepSend($to, $from, $content, $subject);

				if ( in_array( $name, $test ) ) {
?>
					<script language=javascript>
						alert( "Test submitted to Jonny." );
					</script>
<?php
				}

				if($sent){
					echo "<script>window.location = '/confirm_request.php?url=" .$url. "'</script>";
				}
				else {?>
					<script language=javascript>
						alert("We have encoutered a problem, please try again at a later time");
						history.go(-1);
					</script>
				<?}
			}
//		}

		session_destroy();
		exit;
?>
