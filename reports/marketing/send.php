<?php
header( "Cache-Control: no-cache, must-revalidate" ); // HTTP/1.1
header( "Expires: Mon, 28 Jan 2013 05:00:00 GMT" ); // Date in the past

	$mailSend = $_SERVER['DOCUMENT_ROOT'];
	$mailSend .= "/mail/sendMail.php";
	require $mailSend;

	// Form Responses
	session_start();

	date_default_timezone_set( 'America/Los_Angeles' );
	$date = date( 'M. j, Y' );
	$time = date( 'g:ia' );
	$parts = array();
	$url = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH);
	$survey = $_SESSION['survey'];

	//Specific variables
	$department = $_POST["department"];
	// UID for P2P
	if( $survey == "Peer to Peer" ) {
		$uid = $_SESSION['uid'];
		$private = $_POST['private'];
	}
	$location = $_POST['location'];
	$name = $_POST['name'];
	$email2 = $_POST['email2'];

	// Testing Parameter for "Name" field
	$test = array( "test", "Test", "TEST" );

	// For "a" v. "an"
	$array = array( 'A', 'E', 'I', 'O', 'U' );

	// Compile questions
	for( $i = 0; $i < count( $_SESSION["questions"] ); $i++ ) {

		$questions[$i] = $_SESSION["questions"][$i][0];
		$type = $_SESSION["questions"][$i][1];

		if( isset( $_POST['answer'][$i] ) ) {
			$answer[$i] = $_POST['answer'][$i];
		}
		else {
			$answer[$i] = "";
		}
		if( isset( $_POST['comments'][$i] ) ) {
			$comments[$i] = $_POST['comments'][$i];
		}

		$parts[$i] = '<p>' .$questions[$i]. '<br><b>';

		//outputs date questions
		switch ( $type ){

			case 1: case 2:
				$parts[$i] .= $answer[$i]. '</b><br>Comments:<br><b>' .$comments[$i];
			break;
			case 4:
				$parts[$i] .= $comments[$i];
			break;
			case 8:
				$parts[$i] .= $dayweek;
			break;
			case 12:
				$parts[$i] .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $answer[$i];
			break;
			default:
				$parts[$i] .= $answer[$i];

		}

		$parts[$i] .= '</b></p>';
		
	}

	// Email Content
	$top = '<html>
			<body style="max-width: 650px; margin: 0 auto;">
				<p style="text-align: center; font-weight: bold"><span style="color: #316595;">' . $survey . '</span><br>' .
			 		$location . '<br>' .
			 		$date . ' @ ' . $time .'<br>
			 		Name: ' . $name . '<br>';

	// Closes the HTML email
	$bottom = '	</p>
				<div style="font-size: 7pt; text-align:center;">' .$survey. ' submitted </div>
			</body>
		</html>';

	// breaks $parts array into $parts string
	$partsFinal = implode( '', $parts );

	// Adds $top $parts and $bottom
	$bodyFinal = array( $top, $partsFinal, $bottom );

	// Breaks $body array into $body String
	$body = implode( '',$bodyFinal );

	// End compile

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
			if ( empty( $survey ) || empty( $location ) ) {
?>
					<script language=javascript>
						alert( "Sorry! Something seems to be missing. Please re-submit." );
						history.go( -1 );
					</script>

<?php
			}

            // Form not missing variables - Send email
			else {

				// Send
				// Test Submissions
				if ( in_array( $name, $test ) ) {
					$to = "jonny@maintenance.waterworksswim.com";
				}

				// Normal Submissions
				else {
					include ( "fetch.php" );
				}

				$from = "MarketingReports@waterworksswim.com";

				// Subject of the email "A vs An"
				$subject = "$location: ";
				if ( in_array( $survey[0], $array ) ) {
					$subject .= "An ";
				}
				else {
					$subject .= "A ";
				}
				$subject .= " $survey has been submitted for $date";

				$headers =  "From: $from\n" .
							"MIME-Version: 1.0\n" .
							"Content-type: text/html; charset=iso-8859-1";

				// Sends email
				//$sent = mail( $to, $subject, $body, $headers );
				$sent = emailPrepSend($to, $from, $body, $subject);

				if( $sent ){

					// Email address filled, copy and confirmation
					if( !empty( $email2 ) ){
						$to2 = $email2;
						$headers =  "From: $from\n" .
									"MIME-Version: 1.0\n" .
									"Content-type: text/html; charset=iso-8859-1";
						// Uses "a" v. "an" array at top
						$subject2 = "Confirmation: You submitted ";
						if ( in_array( $survey[0], $array ) ) {
							$subject2 .= "an ";
						}
						else{
							$subject2 .= "a ";
						}
						$subject2 .= "$survey on $date";
						//$sent = mail( $to, $subject, $body, $headers );
						$sent1 = emailPrepSend( $to2, $from, $body, $subject2 );
					}

					if ( in_array( $name, $test ) ) {
?>
						<script language=javascript>
							alert( "Test submitted to Jonny." );
						</script>
<?php
					}

					if ( strpos( $survey, 'Survey' ) !== FALSE ){
						//header ( "Location: /confirm_survey.php" );
						echo( "<script>location.href = '/confirm_survey.php?url=".$url."';</script>" );
					}
					else {
						//header ( "Location: /confirm_report.php" );
						echo( "<script>location.href = '/confirm_report.php?url=".$url."';</script>" );
					}

					session_destroy();
					exit;

					$counter = 1;

				}
				else {

					 $space = "\n";
						$ext = "_error_log.txt";
						$log = $site .''.$ext;
						$logHandle = fopen( "log/$log", 'a' ) or die ( "cannot create log" );
						$message = "$name encountered an error while trying to submit a $survey from ";
						fwrite( $logHandle, $message );
						$ip = $_SERVER['REMOTE_ADDR'];
						fwrite( $logHandle, $ip );
						fwrite( $logHandle, $space );
						$time = date( "m/d/y : H:i:s", time( ) ) ;
						fwrite( $logHandle, $time );
						fwrite( $logHandle, $space );
						fwrite( $logHandle, $space );
						fclose( $logHandle );
						$name1 = $name;
						$name1 = str_replace( ' ', '', $name1 );
						$ext2 = ".html";
						$file = $name1.$ext2;
						$logHandle = fopen( "error/$file", 'a' ) or die ( "cannot create log" );

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

							fclose( $logHandle );

						$address = "http://reports.waterworksswim.com/reports/office/error/";
						$link = $address . $file;
							$to = "victor@waterworksswim.com, jonny@maintenance.waterworksswim.com";
							$subject = "$name encountered an error submitting $survey";
							$message = "$name encountered an error while submitting a $survey. The report/survey has been saved and can be viewed by clicking on the following link. \n \"$link\"";
							$from = "OfficeReportError@waterworksswim.com";
							$headers = "From:" . $from;
							//mail( $to,$subject,$message,$headers );
							emailPrepSend( $to, $from, $message, $subject );

			?>
							<script language=javascript>
								alert( "We encountered an error with our email server.  However, your document has been saved and submitted to management. We apologize for the inconvenience." );
								window.location = "http://www.waterworksswim.com/"
							</script>

			<?php
					}

				session_destroy();
				exit;
			}
//		}

		// Failed Authentication - Save Submission


	session_destroy();
	exit;

?>
