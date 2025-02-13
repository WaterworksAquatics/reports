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

	// Specific variables
	$Fname = ucwords( $_POST['Fname'] );
	$Lname = ucwords( $_POST['Lname'] );
	$email = $_POST['email'];
	$location = $_POST['location'];
	$message = $_POST['message'];
	$task = substr($message, 0, 35);
	$asanaS = str_replace(' ', '%20', $task);
	// Pool Issue
	$pool = $_POST['pool'];

	// Create Tiny URL for Follow-up Email link
	$fup = 'https://mail.google.com/mail/u/0/?view=cm&fs=1&to=' . $email . '&su=IT%20Issue%20Follow-up:%20' . $asanaS;

	function get_tiny_url($fup)  {
		$ch = curl_init();
		$timeout = 5;
		curl_setopt($ch,CURLOPT_URL,'http://tinyurl.com/api-create.php?url='.$fup);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}

	$fup_tiny = get_tiny_url( $fup );

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

			//Check for empty variables (For bad form submission.)
			if ( empty( $Fname ) || empty( $Lname ) || empty( $location ) ) {
?>
				<script language=javascript>
					alert("Sorry! Something seems to be missing. Please re-submit.");
					history.go(-1);
				</script>

<?php
			}

			// Form not missing variables
			else {

				if ( $survey == "IT Issue" ){

					// From
					$from = $email;

					// Send
					// Test Submission
					if ( in_array( $Fname, $test ) ){
						$to = "jonny@maintenance.waterworksswim.com";
					}
					// Normal Submission
					else{
						if ( !empty( $email ) ){
							$to = $email;
						}
					}

					$asana = "support@waterworksaquatics.zendesk.com";

				}
				elseif ( $survey == "Maintenance Issue" || $survey == "Pool Issue" ){

					// From
					$from = "no-reply.maint@waterworksswim.com";

					// Send
					// Test Submission
					if ( in_array( $Fname, $test ) ){
						$to = "jonny@maintenance.waterworksswim.com, lawrence@maintenance.waterworksswim.com";
						$asana = "x+521255374547802@mail.asana.com";
					}
					// Normal Submission
					else{
						$allFacs = "victor@waterworksswim.com, lawrence@maintenance.waterworksswim.com, jonsupport@waterworksswim.com, toddsupport@waterworksswim.com, timsupport@waterworksswim.com";
						switch ($survey) {
							case 'Maintenance Issue':
								if ($location == "Irvine"){
									$processEmail = "x+521255374547802@mail.asana.com";
								}
								elseif ($location == "Carlsbad"){
									$processEmail = "x+524314689365027@mail.asana.com";
								}
								elseif ($location == "Beverly Hills"){
									$processEmail = "x+519917898056246@mail.asana.com";
								}
								elseif ($location == "Huntington Beach"){
									$processEmail = "x+526979214346308@mail.asana.com";
								}
								elseif ($location == "Sierra Madre"){
									$processEmail = "x+519856452939850@mail.asana.com";
								}
								elseif ($location == "Pasadena"){
									$processEmail = "x+519834299162437@mail.asana.com";
								}
								elseif ($location == "San Jose"){
									$processEmail = "x+524318690961467@mail.asana.com";
								}
								elseif ($location == "Highlands Ranch"){
									$processEmail = "x+524321302705562@mail.asana.com";
								}
									break;
							case 'Pool Issue':
								if ($location == "Irvine"){
									$processEmail =  $allFacs . ", david@waterworksswim.com";
								}
								elseif ($location == "Carlsbad"){
									$processEmail = $allFacs . ", justin@waterworksswim.com";
								}
								elseif ($location == "Beverly Hills"){
									$processEmail = $allFacs;
								}
								elseif ($location == "Huntington Beach"){
									$processEmail = $allFacs . ", jeff@waterworksswim.com";
								}
								elseif ($location == "Sierra Madre"){
									$processEmail = $allFacs . ", ricardo@waterworksswim.com";
								}
								elseif ($location == "Pasadena"){
									$processEmail = $allFacs . ", ally@waterworksswim.com";
								}
								elseif ($location == "San Jose"){
									$processEmail = $allFacs . ", michelle@waterworksswim.com";
								}
								elseif ($location == "Highlands Ranch"){
									$processEmail = $allFacs . ", david@waterworksswim.com";
								}
									break;
							default:
								# code...
								break;
						}
					}
				}

				// Email Content
				if ( !empty( $pool ) ){
					$subject = "[$location: $pool] $task";
				}
				else {
					$subject = "[$location] $task";
				}
				if ( strlen( $task ) >= 35){
					$subject .= "...";
				}

				$headers = "From: $from\r\n" .
							"MIME-Version: 1.0\r\n" .
							"Content-Type: text/html; charset=ISO-8859-\r\n";
				$body = '<html><body>' .
								'<p>' .
									'Submitted by: '. $Fname .' '. $Lname .' on ' .$time.
									'<br><br>';
								if ( !empty( $pool ) ){
				$body .=  			'Pool:' .
									'<br>' .
									$pool .
									'<br>';
								}
				$body .=  			'Issue:' .
									'<br>' .
									$message;
								if ( !empty( $email ) ){
				$body .=				'<br><br>' .
									'---' .
									'<br><br>' .
									'Send Follow-Up Response: (' . $fup_tiny . ')';
								}

				$body .=		'</p>' .
							'</body></html>';
			    $fullName = $Fname . $Lname;

				$sent = emailPrepSend( $processEmail, $from, $body, $subject, $fullName );

				// Success
				if( $sent && ( $counter != 1 ) ){

					echo "<script>window.location = '/confirm_report.php?url=" .$url. "'</script>";

					$counter = 1;

				}

				// Failed
				else { ?>

					<script language=javascript>
						alert("We have encountered a problem, please try again at a later time");
						history.go(-1);
					</script>

<?php			}
			}
//		}

		session_destroy();
		exit;
?>
