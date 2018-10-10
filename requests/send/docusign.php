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
	$name = $_POST['name'];
     $email = $_POST['email'];
     $phone = $_POST['phone'];
     $position = $_POST['position'];
     $locations = $_POST['locations'];
     $under17 = $_POST['under17'];
     $hs = $_POST['hs'];
	$permit = $_POST['permit'];
	$exempt = $_POST['exempt'];
     $seasonal = $_POST['seasonal'];
     $start = $_POST['start'];
     $days = $_POST['days'];
     $times = $_POST['times'];
	$schedule = array_combine( $days, $times );
     $timeoff = $_POST['timeoff'];


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

				// From
				$from = "DocusignRequest@waterworksswim.com";

				// Send
				// Test Submission
				if ( in_array( $name, $test ) ){
					$to = "jonny@maintenance.waterworksswim.com";
				}
				// Normal Submission
				else{
					$to = "kelsey.b@waterworksswim.com, brandee@waterworksswim.com, kim.r@waterworksswim.com";
				}

				$subject = "$survey - $name";
				$headers = "From: $from\r\n" .
						   "MIME-Version: 1.0\r\n" .
						   "Content-Type: text/html; charset=ISO-8859-\r\n";
				$body = '<html><body>
                              <p>
							<b>New Hires Name</b>:
                                   <br>
                                   ' . $name .
                              '</p>
                              <p>
							<b>Email Address</b>:
                                   <br>
                                   ' . $email .
                              '</p>
                              <p>
							<b>Phone Number</b>:
                                   <br>
                                   ' . $phone .
                              '</p>
                              <p>
							<b>Position</b>:
                                   <br>
                                   ' . $position .
                              '</p>
                              <p>
							<b>Location(s)</b>:
							<br>';
                    foreach( $locations as $location ){
                    $body .= 		$location . ", ";
                    }
                    $body .= '</p>
                              <p>
							<b>17 Years Old or Under</b>:
                                   <br>
                                   ' . $under17 .
                              '</p>';
                    if ( $under17 == "Yes" ){
                    $body .=  '<p>
							<b>High School Student</b>:
                                   <br>' . $hs .
                              '</p>';
                    }
				if ( $hs == "Yes" ){
				$body .=  '<p>
							<b>Final Work Permit Received</b>:
							<br>' . $permit .
						'</p>';
				}
				if ( $permit == "No" ){
				$body .=  '<p>
							<b>Work Permit Exempt</b>:
							<br>' . $exempt .
						'</p>';
				}
                    $body .=  '<p>
							<b>Seasonal Hire</b>:
                                   <br>
                                   ' . $seasonal .
                              '</p>
                              <p>
							<b>Available to start training on</b>:
                                   <br>
                                   ' . $start .
                              '</p>
                              <p>
							<b>Training Availability</b>:
                                   <br>';
                    foreach( $schedule as $day => $avail ){
                    $body .=  $day . " @ " . $avail . "<br>";
                    }
                    $body .= '</p>
                              <p>
							<b>Pre-approved Time Off</b>:
                                   <br>
                                   ' . $timeoff .
                              '</p>
                              <p style="text-align:center;font-size:10pt;font-weight:bold;">Submitted on ' . $time . '</p>
						</body></html>';

				//$sent = mail($to, $subject, $body, $headers);
				$sent = emailPrepSend($to, $from, $body, $subject );

				if( $sent && ( $counter != 1 ) ){

					if ( in_array( $name, $test ) ) {
?>
						<script language=javascript>
							alert( "Test submitted to Jonny." );
						</script>
<?php
					}

					echo "<script>window.location = '/confirm_request.php?url=" .$url. "'</script>";

					session_destroy();
					exit;

					$counter = 1;

				}
				else {?>
					<script language=javascript>
						alert("We have encountered a problem, please try again at a later time");
						history.go(-1);
					</script>
			<? }
			}
//		}

		session_destroy();
		exit;
?>
