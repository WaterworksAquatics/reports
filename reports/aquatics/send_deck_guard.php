<?php
header( "Cache-Control: no-cache, must-revalidate" ); // HTTP/1.1
header( "Expires: Mon, 28 Jan 2013 05:00:00 GMT" ); // Date in the past

	$mailSend = $_SERVER['DOCUMENT_ROOT'];
	$mailSend .= "/mail/sendMail.php";
	require $mailSend;

	session_start();
	date_default_timezone_set('America/Los_Angeles');
	$date = date('M d, Y');
	$time = date('h:ia');
	$parts = array();
	$url = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH);
	$survey = $_SESSION['survey'];

	$name = $_POST['name'];
	$email = $_POST['email'];
	$location = $_POST['location'];
	$guard = $_POST['guard'];
	$date1 = $_POST['date1'];
	$time1 = $_POST['time1'];

	$uniform = $_POST['uniform'];
	$enforce = $_POST['enforce'];
	$roaming = $_POST['roaming'];
	$active = $_POST['active'];
	$scanning = $_POST['scanning'];
	$posture = $_POST['posture'];
	$body = $_POST['body'];
	$shoes = $_POST['shoes'];
	$prevent = $_POST['prevent'];
	$prevent_com = $_POST['prevent_com'];
	$attitude = $_POST['attitude'];
	$attitude_com = $_POST['attitude_com'];
	$judge = $_POST['judge'];
	$judge_com = $_POST['judge_com'];
	$understand = $_POST['understand'];
	$understand_com = $_POST['understand_com'];
	$play = $_POST['play'];
	$play_com = $_POST['play_com'];
	$correct = $_POST['correct'];
	$comments = $_POST['comments'];

	date_default_timezone_set('America/Los_Angeles');
	$time = date('F jS, Y, h:ia');

	include ("fetch.php");

	$subject = "$location: $survey submitted";

	$from = "Evaluation@waterworksswim.com";

	$headers = "From: $from\r\n" .
				"MIME-Version: 1.0\r\n" .
				"Content-Type: text/html; charset=ISO-8859-\r\n";
	$body = '<html><body>' .
				'<p style="text-align: center"><img src="http://images3.waterworksswim.com/images/emaillogo.png"><p>' .
				'<p style="text-align: center; color: #316595; font-weight: bold">' .$survey. '</p>' .
				'<p style="text-align: center; color: #316595; font-weight: bold">' .$time. '</p>' .
				'<p style="text-align: center; color: #316595; font-weight: bold">' .$location. '</p>' .
				'<p style="text-align: center; color: #316595; font-weight: bold">Submitted by ' .$name. '</p>' .
				'<table style="margin: 0 auto; width: 200px;">' .
				'<tr><td style="color: #316595; width: 200px;">Deck Guard Name:</td><td>' .$guard. '</td></tr>' .
				'<tr><td style="color: #316595; width: 200px;">Date:</td><td>' .$date1. '</td></tr>' .
				'<tr><td style="color: #316595; width: 200px;">Time:</td><td>' .$time1. '</td></tr>' .
				'</table>' .
				'<table style="margin: 0 auto; width: 500px;">' .
				'<tr style="height: 30px;"><td style="color: #316595; width: 200px;">Appropriate Uniform<br>(Shirt, Whistle, Name Tag, Shorts, etc.):</td><td>' .$uniform. '</td></tr>' .
				'<tr style="height: 30px;"><td style="color: #316595; width: 200px;">Enforcing the rules of the play area:</td><td>' .$enforce. '</td></tr>' .
				'<tr style="height: 30px;"><td style="color: #316595; width: 200px;">Standing up and walking around<br>every 5 minutes.:</td><td>' .$roaming. '</td></tr>' .
				'<tr style="height: 30px;"><td style="color: #316595; width: 200px;">Active and continuous scanning<br>(no fixating):</td><td>' .$active. '</td></tr>' .
				'<tr style="height: 30px;"><td style="color: #316595; width: 200px;">Scanning all areas of play area:</td><td>' .$scanning. '</td></tr>' .
				'<tr style="height: 30px;"><td style="color: #316595; width: 200px;">Appropriate posture:</td><td>' .$posture. '</td></tr>' .
				'<tr style="height: 30px;"><td style="color: #316595; width: 200px;">Appropriate body language:</td><td>' .$body. '</td></tr>' .
				'<tr style="height: 30px;"><td style="color: #316595; width: 200px;">Managing the organization of shoes and objects on the pool deck:</td><td>' .$shoes. '</td></tr>' .
				'<tr style="height: 30px;"><td style="color: #316595; width: 200px;">Rule Enforcement - Preventative:</td><td>' .$prevent. '</td></tr>' .
				'<tr style="height: 30px;"><td style="color: #316595; width: 200px;">Comments:</td><td>' .$prevent_com. '</td></tr>' .
				'<tr style="height: 30px;"><td style="color: #316595; width: 200px;">Rule Enforcement - Attitude:</td><td>' .$attitude. '</td></tr>' .
				'<tr style="height: 30px;"><td style="color: #316595; width: 200px;">Rule Enforcement - Judgement:</td><td> ' .$judge. '</td></tr>' .
				'<tr style="height: 30px;"><td style="color: #316595; width: 200px;">Comments:</td><td>' .$judge_com. '</td></tr>' .
				'<tr style="height: 30px;"><td style="color: #316595; width: 200px;">Rule Enforcement - Understanding:</td><td>' .$understand. '</td></tr>' .
				'<tr style="height: 30px;"><td style="color: #316595; width: 200px;">Comments:</td><td>' .$understand_com. '</td></tr>' .
				'<tr style="height: 30px;"><td style="color: #316595; width: 200px;">Eye contact w/ play area:</td><td> ' .$play. '</td></tr>' .
				'<tr style="height: 30px;"><td style="color: #316595; width: 200px;">Comments:</td><td>' .$judge_com. '</td></tr>' .
				'<tr style="height: 30px;"><td style="color: #316595; width: 200px;">Immediate corrective action given(if any):</td><td>' .$correct. '</td></tr>' .
				'<tr style="height: 30px;"><td style="color: #316595; width: 200px;">Comments:</td><td>' .$comments. '</td></tr>' .
				'</table>' .
				'<p style="text-align: center">Submitted on ' .$time. '</p>' .
				'</body></html>';

		//$sent = mail($to, $subject, $content, $headers); OLD send function using php built in mail
		$sent = emailPrepSend($to, $from, $body, $subject); //New send function using PHP Mailer

		if( $sent ){
			echo "<script>window.location = '/confirm_report.php?url=" .$url. "'</script>";

			$from = 'evaluation@waterworksswim.com';
			$to2 = $email;
			$subject2 = "You submitted a $survey";
			$headers="From: evaluation@waterworksswim.com\r\n";
			$headers2.="MIME-Version: 1.0\r\n";
			$headers2.="Content-Type: text/html; charset=ISO-8859-\r\n";

			//$sent = mail($to2, $subject2, $content, $headers2);
			$sent1 = emailPrepSend($to2, $from, $body, $subject2);
		}
		// Failed
		else { ?>

			<script language=javascript>
				alert("We have encoutered a problem, please try again at a later time");
				history.go(-1);
			</script>

<?php	}

		session_destroy();
		exit;
?>
