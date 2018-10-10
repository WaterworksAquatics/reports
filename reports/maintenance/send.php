<?php
header( "Cache-Control: no-cache, must-revalidate" ); // HTTP/1.1
header( "Expires: Mon, 28 Jan 2013 05:00:00 GMT" ); // Date in the past

	$mailSend = $_SERVER['DOCUMENT_ROOT'];
	$mailSend .= "/mail/sendMail.php";
	require $mailSend;

	// Form Responses
	session_start();
	date_default_timezone_set('America/Los_Angeles');
	$time = date('F j, Y @ g:ia');
	$parts = array();
	$url = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH);
	$survey = $_SESSION['survey'];

	//Specific variables
	$name = $_POST['name'];
	$location = $_POST['location'];
	$forDate = $_POST['forDate'];

	// Testing Parameter for "Name" field
	$test = array( "test", "Test", "TEST");

	//For "a" v. "an"
	$array = array('A', 'E', 'I', 'O', 'U');

	// Compile Questions
	for($i = 0; $i < count($_SESSION["questions"]); $i++){

		$question[$i] = $_SESSION["questions"][$i][0];

		$type = $_SESSION["questions"][$i][1];

		// Begin: Question
		switch ( $type ){
			case 0:
				$parts[$i] = '=========' . $question[$i] . '=========';
			break;
			case 1:
				$parts[$i] = '===' . $question[$i] . '===';
			break;
			case 2:
				$parts[$i] = '---' . $question[$i] . '---';
			break;
			default:
				$parts[$i] = $question[$i] . '<br>';

		}

		// Middle: Add Answer [+ Comments]
		if( isset( $_POST['answer'][$i] ) ){
			$answer[$i] = $_POST['answer'][$i];
		}
		if( isset( $_POST['comments'][$i] ) ){
			$comments[$i] = $_POST['comments'][$i];
		}

		if ( $type == 7 || $type == 8 ){
			$parts[$i] .= $comments[$i];
		}
		if ( $type == 9 ){

			if ( empty( $answer[$i] ) ){
				$answer[$i] = "No es good";
			}

			$parts[$i] .= $answer[$i]. '<br>Comments:<br>' .$comments[$i];
		}
		elseif ( !empty( $answer[$i] ) ){
			$parts[$i] .= $answer[$i];
		}

		if ( !in_array( $type, array( 0, 1, 2) ) ){
			// End: Add Breaks
			$parts[$i] .= "<br><br>";
		}
		else {
			$parts[$i] .= "<br>";
		}

	}

	// Email Content
	$top = '<html>
				<body>
					<p>
						Submitted by ' . $name . ' @ ' . $time . '
						<br>
						<br>';

	// breaks $parts array into $parts string
	$partsFinal = implode('', $parts);

	//Closes the HTML email
	$bottom = '		</p>
				</body>
			</html>';

	//Adds $top $parts and $bottom
	$bodyFinal = array($top, $partsFinal, $bottom);

	//Breaks $body array into $body String
	$body = implode('',$bodyFinal);

	// End compile

	// reCAPTCHA
	$secret = "6LdARgkTAAAAAKYVAscvAEz5qqF-dRqHF7AP3dMr";
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

				// Send
				// Test Submission
				if ( in_array( $name, $test ) ){
					$to = "jonny@maintenance.waterworksswim.com";
					$asanaT = "x+521255374547802@mail.asana.com";
				}
				// Normal Submission
				else{

					if ( $location == "Irvine" ){
						$asanaT = "x+521255374547802@mail.asana.com";
					}
					elseif ( $location == "Carlsbad" ){
						$asanaT = "x+524314689365027@mail.asana.com";
					}
					elseif ( $location == "Beverly Hills" ){
						$asanaT = "x+519917898056246@mail.asana.com";
					}
					elseif ( $location == "Huntington Beach" ){
						$to = "sender@campsgi.com, rabbinewman@hacds.org";
						$asanaT = "x+526979214346308@mail.asana.com";
					}
					elseif ( $location == "Sierra Madre" ){
						$asanaT = "x+519856452939850@mail.asana.com";
					}
					elseif ( $location == "Pasadena" ){
						$asanaT = "x+519834299162437@mail.asana.com";
					}
					elseif ( $location == "San Jose" ){
						$asanaT = "x+524318690961467@mail.asana.com";
					}
					elseif ( $location == "Highlands Ranch" ){
						$asanaT = "x+524321302705562@mail.asana.com";
					}

				}

				// From
				$email = "no-reply.maint@waterworksswim.com";

				$subject = "[Maintenance Walkthrough] $forDate";

				$headers =  "From: $email\r\n" .
							"MIME-Version: 1.0\r\n" .
							"Content-type: text/html; charset=iso-8859-1\r\n";

				//Sends email
				//$sent = mail($to, $subject, $body, $headers);
				$sent = emailPrepSend($asanaT, $email, $body, $subject);

				if( $sent && ( $counter != 1 ) ){

					if ( in_array( $name, $test ) ) {
?>
						<script language=javascript>
							alert( "Test submitted to Jonny." );
						</script>
<?php
					}

					if ( !empty( $to ) ){
						$sent = emailPrepSend( $to, $email, $body, $subject );
					}

					// Confirmation
					echo( "<script>location.href = '/confirm_report.php?url=".$url."';</script>" );

					session_destroy();
					exit;

					$counter = 1;

				}
				else{

					$space = "\n";
					$ext = "_error_log.txt";
					$log = $site .''.$ext;
					$logHandle = fopen("log/$log", 'a') or die ("cannot create log");
						$message = "$name encountered an error while trying to submit a $survey";
						fwrite($logHandle, $message);
						$ip = $_SERVER['REMOTE_ADDR'];
						fwrite($logHandle, $ip);
						fwrite($logHandle, $space);
						$time = date("m/d/y : H:i:s", time()) ;
						fwrite($logHandle, $time);
						fwrite($logHandle, $space);
						fwrite($logHandle, $space);
					fclose($logHandle);
					$name1 = $_REQUEST['name'];
					$name1 = str_replace(' ', '',$name1);
					$ext2 = ".html";
					$file = $name1.$ext2;
					$logHandle = fopen("error/$file", 'a') or die ("cannot create log");

						$ip = $_SERVER['REMOTE_ADDR'];
						fwrite( $logHandle, $ip );
						fwrite( $logHandle, $space );
						$time = date( "m/d/y : H:i:s", time( ) ) ;
						fwrite( $logHandle, $time );
						fwrite( $logHandle, $space );
						fwrite( $logHandle, "Response Code" );
						fwrite( $logHandle, $space );
						fwrite( $logHandle, $captcha_success->success );
						fwrite( $logHandle, $space );
						fwrite( $logHandle, $body );
						fwrite( $logHandle, $space );

					fclose($logHandle);

					$address = "http://reports.waterworksswim.com/reports/aquatics/error/";
					$link = $address.$file;

					$to="jonny@maintenance.waterworksswim.com";

					$subject = "$name encountered an error submitting $survey";
					$message = "$name encountered an error while submitting a $survey. The report/survey has been saved and can be viewed by clicking on the following link. \n \"$link\"";
					$from = "AquaticReportError@waterworksswim.com";
					$headers = "From:" . $from;
					//mail($to,$subject,$message,$headers);
					emailPrepSend($to, $from, $message, $subject);

		?>
						<script language=javascript>
							alert("We encountered an error with our email server.  However, your document has been saved and submitted to management. We apologize for the inconvenience.");
							window.location = "http://www.waterworksswim.com/"
						</script>
		<?php
				}
			}
//		}


	session_destroy();
	exit;

?>
