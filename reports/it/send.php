<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Mon, 28 Jan 2013 05:00:00 GMT"); // Date in the past

	$mailSend = $_SERVER['DOCUMENT_ROOT'];
	$mailSend .= "/mail/sendMail.php";
	require $mailSend;

	// Form Responses
	session_start();
	date_default_timezone_set( 'America/Los_Angeles' );
	$time = date('M. j, Y @ g:ia');
	$parts = array();
	$url = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH);
	$survey = $_SESSION['survey'];

	// Specific variables
	$name = $_POST['name'];
	$email = $_POST['email'];

	// Testing parameter for "name" field
	$test = array( "test", "Test", "TEST");

	// Compile Questions
	for($i = 0; $i < count($_SESSION["questions"]); $i++){

		$questions[$i] = $_SESSION["questions"][$i];

		$type[$i] = $_SESSION["type"][$i];

		if(isset($_POST['answer'][$i])){
			$answer[$i] = $_POST['answer'][$i];
		}
		else{
			$answer[$i] = "";
		}
		if(isset($_POST['comments'][$i])){
			$comments[$i] = $_POST['comments'][$i];
		}
		if($i == $headnum[0] ){
			$parts[$i] = '<tr><td colspan="2"><b><u>' .$heading[0]. '</u></b></td></tr>
						<tr><td>' .$questions[$i]. '</td><td><b>' .$answer[$i]. '</b></td></tr>';
		}
		elseif($i == $headnum[0] ){
			$parts[$i] = '<tr><td colspan="2"><b><u>' .$heading[1]. '</u></b></td></tr>
					<tr><td>' .$questions[$i]. '</td><td><b>' .$answer[$i]. '</b></td></tr>
					<tr><td><b><dd>' .$comments[$i]. '</dd></b></td></tr>';
		}
		elseif($i == $headnum[0]){
			$parts[$i] = '<tr><td colspan="2"><b><u>' .$heading[2]. '</u></b></td></tr>
						<tr><td>' .$questions[$i]. '</td><td><b>' .$answer[$i]. '</b></td></tr>';
		}
		//outputs date questions
		else{
			$parts[$i] = '<tr><td>' .$questions[$i]. '</td><td><b>' .$answer[$i]. '</b></td></tr>';
		}

		if ($type[$i] == 0){
			$parts[$i] = '<tr><td>' .$questions[$i]. '<b>' .$answer[$i]. '</b></td></tr><br>';
		}

		elseif ( $type[$i] == 1 ){
			// For Camera Server Evaluation
			if( $survey == "Camera Server Evaluation Report" ){
				// If no comments, auto-insert comment
				if( empty( $comments[$i] ) ){
					$parts[$i] = '<p>' .$questions[$i]. '<br><b> No issues with server or cameras. </b><br>';
				}
			}
			else {
				$parts[$i] = '<p>' .$questions[$i]. '<br><b>' .$comments[$i]. '</b><br>';
			}
		}

		elseif( $type[$i] == 2 ){
			// ASANA: If comment is filled for facility, send as ticket to Asana
			if( !empty( $comments[$i] ) ){
				$parts[$i] = '<tr><td>' .$questions[$i]. '<br><b>' .$comments[$i]. '</b></td></tr>
						  <tr><td>Staff member(s) contacted: <b>' .$answer[$i]. '</b><br><br></td></tr>';

				$subject = substr( $comments[$i], 0, 35 );

				$email2 = "IssueReport.IT@waterworksswim.com";
				$to2 = "x+521522601293637@mail.asana.com";
				$subject2 = "[FER - $questions[$i]] $subject";
					if ( strlen( $subject2 ) >= 35 ){
						$subject2 .= "...";
					}
				$headers2 = "From: IssueReport.IT@waterworksswim.com\r\n" .
							 "MIME-Version: 1.0\r\n" .
							 "Content-Type: text/html; charset=ISO-8859-\r\n";
				$body =  '<html><body>' .
								'<p>' .
									'<b>Reported by:</b> '. $answer[$i] .
									'<br><br>' .
									'Issue(s):' .
									'<br>' .
									$comments[$i].
									'<br><br>' .
									'Facility Evaluation Report submitted on ' .$time. ' by ' .$name.'</p>' .
							'</body></html>';

				$sent = emailPrepSend($to2, $email2, $body, $subject2);//New send function using PHP Mailer
				//$sent = mail($to_2, $subject_2, $content, $headers_2);
			}
			else{
				// ASANA: If comment is empty, don't send ticket and report no issue in email.
				$parts[$i] = '<tr><td>' .$questions[$i]. '<br><b> No issues reported.</b></td></tr>
						  <tr><td>Staff member(s) contacted: <b>' .$answer[$i]. '</b><br><br></td></tr>';

			}
		}
	}

	// Email Content
	$top = '<html>
				<body style="width: 600px">
					<table style="width: 100%" border="0">
						<tr>
							<td colspan="2"><center><img src="http://images3.waterworksswim.com/images/emaillogo.png"></center></td>
						</tr>
						<tr>
							<td colspan="2"><center><b><font size="3">' .$survey. '</font></b></center></td>
						</tr>
						<tr>
							<td colspan="2"><center><b><font size="3">' .$time. '</font></b></center></td>
						</tr>
						<br>
						<tr>
							<td colspan="2"><center>Name:&nbsp; <b>' .$name. '</b></center></td>
						</tr>';

	//Closes the HTML email
	$bottom = '	</table>

				</body>
			</html>';
	//breaks $parts array into $parts string
	$partsFinal = implode('', $parts);

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

<?
	}

	// Success - reCAPTCHA checked
	// Authenticate reCAPTCHA
	$verify = file_get_contents( "https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}&remoteip{$remoteip}" );
	$captcha_success = json_decode($verify);

	// Successful Authentication
//		if( $captcha_success->success==true ) {

		// Check for empty variables ( For bad form submission. )
		if ( empty( $survey ) || empty( $name ) ) {
?>
			<script language=javascript>
				alert( "Sorry! Something seems to be missing. Please re-submit." );
				history.go( -1 );
			</script>

<?
		}

		// Form not missing variables - Send Email
		else {

			// Send
			// Test Submissions
			if ( in_array( $name, $test ) ) {
				$to = "jonny@maintenance.waterworksswim.com";
			}
			else {
				//Email Addresses that email is going to
				$to = "victor@waterworksswim.com, jonny@maintenance.waterworksswim.com";
			}

			// Email address that will show up as FROM
			if( empty( $email ) ){
				$email = "Reports.IT@waterworksswim.com";
			}

			//Subject of the email
			$subject = "A $survey has been submitted for $time";
			$headers =  "From: $email\n" .
						"MIME-Version: 1.0\n" .
						"Content-type: text/html; charset=iso-8859-1";

			//Sends email
			//$sent = mail( $to, $subject, $body, $headers );
			$sent = emailPrepSend($to, $email, $body, $subject); //New send function using PHP Mailer

			if( $sent ){

				if( !empty( $email ) ){

					$to = $email;
					$from = "Report.IT@waterworksswim.com";
					$headers =  "From: Report.IT@waterworksswim.com\n" .
								"MIME-Version: 1.0\n" .
								"Content-type: text/html; charset=iso-8859-1";
					$subject = "You have submitted a $survey on $time";
					$sent = emailPrepSend( $to, $from, $body, $subject );

				}

				echo( "<script>location.href = '/confirm_report.php?url=".$url."';</script>" );

			}
			else{
				$space = "\n";
				$ext = "_error_log.txt";
				$log = $site .''.$ext;
				$logHandle = fopen("log/$log", 'a') or die ("cannot create log");
					$message = "$name encountered an error while trying to submit a $survey from ";
					fwrite($logHandle, $message);
					$ip = $_SERVER['REMOTE_ADDR'];
					fwrite($logHandle, $ip);
					fwrite($logHandle, $space);
					$time = date("m/d/y : H:i:s", time()) ;
					fwrite($logHandle, $time);
					fwrite($logHandle, $space);
					fwrite($logHandle, $space);
				fclose($logHandle);
				$name1 = $_POST['name'];
				$name1 = str_replace(' ', '',$name1);
				$ext2 = ".html";
				$file = $name1.$ext2;
				$logHandle = fopen("error/$file", 'a') or die ("cannot create log");

					$ip = $_SERVER['REMOTE_ADDR'];
					fwrite($logHandle, $ip);
					fwrite($logHandle, $space);
					$time = date("m/d/y : H:i:s", time()) ;
					fwrite($logHandle, $time);
					fwrite($logHandle, $space);
					fwrite($logHandle, $body);
					fwrite($logHandle, $space);

				fclose($logHandle);

				$address = "http://forms.waterworksswim.com/survey_office/error/";
				$link = $address.$file;

				$to="victor@waterworksswim.com, jonny@maintenance.waterworksswim.com";

				$subject = "$name encountered an error submitting $survey";
				$message = "$name encountered an error submitting a $survey, the file has been saved and can be viewed by clicking the following link \n \"$link\"";
				$from = "ReportError@it.waterworksswim.com";
				$headers = "From:" . $from;
				//mail($to,$subject,$message,$headers);
				emailPrepSend($to, $from, $message, $subject); //New send function using PHP Mailer

?>
					<script language=javascript>
						alert("We encountered an error with our email server.  However, your document has been saved and submitted to management. We apologize for the inconvenience.");
						window.location = "http://www.waterworksswim.com/"
					</script>
	<?php
			}
		}
//	}


session_destroy();
exit;

?>
