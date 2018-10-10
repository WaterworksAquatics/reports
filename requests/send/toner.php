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
	$location = $_POST['location'];
	$printer =  $_POST['printer'];
	$TorD = $_POST['TorD'];
	$comments =  $_POST['comments'];

	$PT = 'https://docs.google.com/spreadsheets/d/1715zwIgP-Z_PMeUpw8xojnpjc6J0f5kuj93nzKqK2sk/edit#gid=1859671240';

	function get_tiny_url($PT)  {
		$ch = curl_init();
		$timeout = 5;
		curl_setopt($ch,CURLOPT_URL,'http://tinyurl.com/api-create.php?url='.$PT);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}

	$PT_tiny = get_tiny_url( $PT );

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
				$from = "IssueReport.IT@waterworksswim.com";

				// Send
				// Test Submission
				if ( in_array( $Fname, $test ) ){
					$to = "jonny@maintenance.waterworksswim.com";
				}
				// Normal Submission
				else{
					$to = "x+521522601293637@mail.asana.com";
				}

				$subject = "[$location] $survey";
				$headers = "From: $from\r\n" .
						   "MIME-Version: 1.0\r\n" .
						   "Content-Type: text/html; charset=ISO-8859-\r\n";
				$body = '<html><body>' .
							'<p>' .
							'Submitted by: ' . $name . ' on ' . $time .
							'<br><br>' .
							'<u>Request</u>' .
							'<br>' .
							'Printer: ' .$printer. '<br>' .
							'What is needed?: ' .$TorD. '<br>' .
							'Comments: <br>' .$comments. '<br>' .
							'<br>' .
							'Printers + Toners Spreadsheet: ' . $PT_tiny .
							'<br>' .
							'Amazon: http://www.amazon.com' .
							'</body></html>';

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
