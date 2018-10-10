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
	$url = parse_url( $_SERVER['HTTP_REFERER'], PHP_URL_PATH );
	$survey = $_SESSION['survey'];
	$questions = $_SESSION["questions"];

	//Specific variables
	$location = $_POST['location'];
	$yourLocation = $_POST['yourLocation'];
	$name = $_POST['name'];
	$email2 = $_POST['email2'];

	// Testing Parameter for "Name" field
	$test = array( "test", "Test", "TEST" );

	//For "a" v. "an"
	$array = array( 'A', 'E', 'I', 'O', 'U' );

	// Compile Questions
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
			case 13:
				switch ( $survey ){

					case "Report Customer Concern":
						$parts[$i] .= $answer[$i];
					break;
					default:
						$parts[$i] .= '<span style="padding-left: 25px;">' .$comments[$i]. '</span>';

				}
			default:
				$parts[$i] .= $answer[$i];

		}

		$parts[$i] .= '</b></p>';

	}

	// Switch question 1 & 2 in email
	if ( in_array( $survey , array( "Aquatics Manager Daily Report", "Senior Instructor Daily Report", "Quality Manager Daily Report", "Lead Trainer Report", "Site Manager Report" ) ) ){
		$t = $parts[0];
		$parts[0] = $parts[1];
		$parts[1] = $t;
	}

	$headers =  "From: $email\r\n" .
			  "MIME-Version: 1.0\r\n" .
			  "Content-type: text/html; charset=iso-8859-1\r\n";

	// Email Content
	$top = '<html>
				<body style="max-width:1000px;">
					<table style="max-width: 700px; margin: 0 auto;" border="0">
						<tr>
							<td colspan="2"><center><b><font size="3">';

							// Survey name changes if Customer Concern
							if ( $survey == "Report Customer Concern" ){
	$top .=						$location . ' Customer Concern';
							}
							else {
	$top .=						$survey;
							}

	$top .=					'</font></b></center></td>
						</tr>
						<tr>
							<td colspan="2"><center><b><font size="3">' .$name. '</font></b></center></td>
						</tr>';

						// Include email address if field filled
						if ( !empty( $email2 ) ){
	$top .=					'<tr>
								<td colspan="2"><center><b><font size="3">' .$email2. '</font></center></td>
							</tr>';
						}

						// For customer concern report
						if ( !empty( $yourLocation ) ){
	$top .=					'<tr>
								<td colspan="2"><center><b><font size="3">' .$yourLocation. '</font></center></td>
							</tr>';
						}
						else {
	$top .=				'<tr>
							<td colspan="2"><center><b><font size="3">' .$location. '</font></center></td>
						</tr>';
						}
	$top .= 			'<tr>
							<td colspan="2"><center><b><font size="3">' .$date . ' @ ' . $time . '</font></b></center></td>
						</tr>';

	if ( $survey == "Pool Chemistry Report" ){
		$pool = $_REQUEST['pool'];
		$top = $top . '<tr>
							<td colspan="2"><center>Pool:&nbsp; <b>' .$pool. '</b></center></td>
						</tr>';
	}
	if( in_array( $survey, array( "First Day Shadow Survey", "New Applicant Survey: Play Area Interactions" ) ) ){
		$name_app = $_REQUEST['name_app'];
		$top = $top . '<tr>
							<td colspan="2"><center>Applicant Name:&nbsp; <b>' .$name_app. '</b></center></td>
						</tr>';
	}

	//Closes the HTML email
	$bottom = '			</table>
					<div style="font-size: 7pt; text-align: center;">' .$survey. ' submitted </div>
				</body>
			</html>';

	//breaks $parts array into $parts string
	$partsFinal = implode('', $parts);

	//Adds $top $parts and $bottom
	$bodyFinal = array($top, $partsFinal, $bottom);

	//Breaks $body array into $body String
	$body = implode('', $bodyFinal);

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
				// Test Submissions
				if ( in_array( $name, $test ) ) {

					$to = $email2;
					
				}


				// Normal Submissions
				else {

					include ("fetch.php");

				}

				// From
				$email = "AquaticsReports@waterworksswim.com";

				//Subject of the email "A vs An"
				if ( $survey ==  "Report Customer Concern" ){
						$subject = "[Customer Concern] $location $answer[0] - $date @ $time";
				}
				else {
					$subject = "$location: ";
					if ( in_array( $survey[0], $array ) ) {
						$subject .= "An ";
					}
					else {
						$subject .= "A ";
					}
					$subject .= " $survey has been submitted by $name - $date";
				}

				//Sends email
				//$sent = mail($to, $subject, $body, $headers);
				$sent = emailPrepSend($to, $email, $body, $subject);

				if( $sent && ( $counter != 1 ) ){

					// Email address filled, copy and confirmation
					if( !empty( $email2 ) ){

						$to2 = $email2;

						// Uses "a" v. "an" array at top
						$subject = "Confirmation: You submitted ";
						if ( in_array( $survey[0], $array ) ) {
							$subject .= "an ";
						}
						else{
							$subject .= "a ";
						}
						$subject .= "$survey on $date";

						//$sent = mail($to, $subject, $body, $headers);
						$sent1 = emailPrepSend($to2, $email, $body, $subject);
					}

					if ( in_array( $name, $test ) ) {
?>
						<script language=javascript>
							alert( "Test submitted to Jonny." );
						</script>
<?php
					}

					if ( strpos( $survey, 'Survey' ) !== FALSE ){
						echo("<script>location.href = '/confirm_survey.php?url=".$url."';</script>");
					}
					else {
						echo( "<script>location.href = '/confirm_report.php?url=".$url."';</script>" );
					}

					session_destroy();
					exit;

					$counter = 1;

				}
				else{

					$space = "\n";
					$ext = "_error_log.txt";
					$log = $site . '' . $ext;
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
					$name = $_POST['name'];
					$name = str_replace(' ', '',$name);
					$ext2 = ".html";
					$file = $name.$ext2;
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

					$to="victor@waterworksswim.com, jonny@maintenance.waterworksswim.com";

					$subject = "$name encountered an error submitting $survey";
					$message = "$name encountered an error while submitting a $survey. The report/survey has been saved and can be viewed by clicking on the following link. \n \"$link\"";
					$from = "AquaticReportError@waterworksswim.com";
					$headers = "From:" . $from;
					//mail($to,$subject,$message,$headers);
					emailPrepSend($to,$subject,$message,$headers);

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
