<?php
header( "Cache-Control: no-cache, must-revalidate" ); // HTTP/1.1
header( "Expires: Mon, 28 Jan 2013 05:00:00 GMT" ); // Date in the past

	$mailSend = $_SERVER['DOCUMENT_ROOT'];
	$mailSend .= "/mail/sendMail.php";
	require $mailSend;

	// Form Responses
	session_start();
	date_default_timezone_set( 'America/Los_Angeles' );
	$date = date( 'M d, Y' );
	$time = date('g:ia');
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
	$test = array( "test", "Test", "TEST");

	// For "a" v. "an"
	$array = array( 'A', 'E', 'I', 'O', 'U' );

	// Compile questions
	for( $i = 0; $i < count( $_SESSION["questions"] ); $i++ ) {


		$questions[$i] = $_SESSION["questions"][$i];
		$type[$i] = $_SESSION["type"][$i];

		if( isset( $_POST['answer'][$i] ) ) {
			$answer[$i] = $_POST['answer'][$i];
		}
		else {
			$answer[$i] = "";
		}
		if( isset( $_POST['comments'][$i] ) ) {
			$comments[$i] = $_POST['comments'][$i];
		}
		// outputs date questions
		elseif( $i == 8 ) {
			$parts[$i] = '<tr><td>' .$questions[$i]. '</td><td><b>' . $dayweek . '</b></td></tr>';
		}
		else {
			$parts[$i] = '<tr><td>' .$questions[$i]. '</td><td><b>' .$answer[$i]. '</b></td></tr>';
		}
		if( in_array( $survey, array( "Question of the Week", "Feedback Survey" ) ) ) {
			$parts[$i] = '<tr><td colspan="2">' .$questions[$i]. '</td></tr>
			<tr><td><b>' . $answer[$i]. '</b></td><td><b><dd>' .$comments[$i]. '</dd></b></td></tr>';
		}
		else {
			if( $type[$i] == 1 && $i != 4 ) {
				$parts[$i] = '<tr><td>' .$questions[$i]. '</td><td><b>' . $answer[$i]. '</b></td></tr>
				<tr><td><b><dd>' .$comments[$i]. '</dd></b></td></tr>';
			}
			elseif ( $type[$i] == 4 ) {
					$parts[$i] = '<tr><td>' .$questions[$i]. '</td></tr>
					<tr><td><b><dd>' .$comments[$i]. '</dd></b></td></tr>';
			}
			elseif ( $type[$i] == 11 ) {
				$parts[$i] = '<tr><td>' .$questions[$i]. '</td></tr>
							<tr><td><b><dd>' .$comments[$i]. '</dd></b></td></tr>';
			}
		}
	}

	// Email Content
	$top = '<html>
				<body style="max-width:1000px;">
					<table style="max-width: 700px" border="0">
						<tr>
							<td colspan="2" style="text-align: center;"><b><font size="3">' .$survey. '</font></b></td>
						</tr>';
	if ( $survey != "Report Party Leads" ){
	$top .=				'<tr>
							<td colspan="2" style="text-align: center;"><b><font size="3">' .$location. '</font></td>
						</tr>';
	}
	$top .=				'<tr>
							<td colspan="2" style="text-align: center;"><b><font size="3">' .$date . ' @ ' . $time . '</font></b></td>
						</tr>
						<br />
						<tr>
							<td colspan="2" style="text-align: center;">Name:&nbsp; <b>' .$name. '</b></td>
						</tr>';

		// Adds UID to the body of the email
		if( $survey == "Peer to Peer" ) {

			$top2 = '<tr><td colspan="2" style="text-align: center;">User ID:&nbsp; <b>' .$uid. '</b></td></tr>';

			if( $_SESSION['dept'] == "O" ) {
				$top2 .= '<tr><td colspan="2" style="text-align: center;">Department:&nbsp; <b>Office</b></td></tr>';
			}
				elseif( $_SESSION['dept'] == "A" ) {
					$top2 .= '<tr><td colspan="2" style="text-align: center;">Department:&nbsp; <b>Aquatics</b></td></tr>';
				}

			$top = $top . $top2;
		}

		// Add question of the Week or feedback survey department
		if( in_array( $survey, array( "Question of the Week", "Feedback Survey" ) ) ) {

			$top2 = '<tr><td colspan="2" style="text-align: center;">Department:&nbsp; <b>' .$department. '</b></td></tr>';

			$top = $top . $top2 . '<br>';
		}

	// Closes the HTML email
	$bottom = '		</table>
					<br>
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

			if ( $survey == "Question of the Week" && empty( $department ) ){
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
				// <------------- TALK TO JONNY BEFORE EDITING ------------->
					include ( "fetch.php" );
				}

				// From
				if ( $department == 'Aquatics' ) {
					$from = "AquaticsReports@waterworksswim.com";
				}
					elseif ( $department == 'Maintenance/IT' ) {
						$from = "MaintenanceReports@waterworksswim.com";
					}
				else {
					$from = "OfficeReports@waterworksswim.com";
				}

				if ( $survey == "Report Party Leads" ){
					$subject = "A party lead has been submitted for $answer[3]";
				}
				else {
					// Subject of the email "A vs An"
					$subject = "$location: ";
					if ( in_array( $survey[0], $array ) ) {
						$subject .= "An ";
					}
					else {
						$subject .= "A ";
					}
					$subject .= " $survey has been submitted by $name - $date";
				}

				$headers =  "From: $from\n" .
							"MIME-Version: 1.0\n" .
							"Content-type: text/html; charset=iso-8859-1";

				// Sends email

				// Check for empty variables ( For bad form submission. )
				if ( empty( $survey ) ) {
?>
					<script language=javascript>
						alert( "Sorry! Something seems to be missing. Please re-submit." );
						history.go( -1 );
					</script>

<?php
				}
				else {

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
							$sent = emailPrepSend( $to2, $from, $body, $subject2 );
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
				}
			}
//		}

	session_destroy();
	exit;

?>
