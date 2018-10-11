<?php
recordToLog("sendMail.php Loaded!");

$rootDir = $_SERVER['DOCUMENT_ROOT'];
/*	$mailSend .= "/mail/sendMail.php";
	require $mailSend;*/
	$phpmailer = $rootDir . "/mail2/src/PHPMailer.php";
	require $phpmailer;

	date_default_timezone_set('America/Los_Angeles');

function emailPrepSend($to, $from, $body, $subject, $name='Waterworks Aquatics'){

	$mail = new PHPMailer;

	

	$mail->isSMTP();   										// Set mailer to use SMTP 
	$mail->SMTPDebug = 2;    
	$mail->Host = 'smtp.sendgrid.net';  					// Specify main and backup SMTP servers 
	$mail->Port = 587;                                    	// TCP port to connect to                     	
	$mail->SMTPAuth = true;                               	// Enable SMTP authentication
	$mail->Username = 'apikey';           					// SMTP username
	$mail->Password = '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';                        // SMTP password
	$mail->SMTPSecure = 'tls';                            	// Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    	// TCP port to connect to

	$mail->setFrom($from, $name);



	$toArray = (explode(",", $to));
	foreach ($toArray as $addressTo){
		$mail->addAddress($addressTo);
	}
	   														// Add a recipient

	$mail->isHTML(true);                                  	// Set email format to HTML

	$mail->Subject = $subject;
	$mail->Body    = $body;

 	if(!$mail->send()) {
	    writeToLog($mail->ErrorInfo);
	    return 0;
	} else {
	   	 return 1;
	}


}

function writeToLog($error){

	$space = "\n";
	$docRoot = $_SERVER['DOCUMENT_ROOT'];
	$log = $docRoot . '/log/Email_Log.txt'
	$logHandle = logFile($log);
		$message = "Error: ";
		fwrite($logHandle, $message);
		fwrite($logHandle, $error);
		fwrite($logHandle, $space);
		$ip = $_SERVER['REMOTE_ADDR'];

		fwrite($logHandle, $ip);
		fwrite($logHandle, $space);
		$time = date("m/d/y : H:i:s", time()) ;
		fwrite($logHandle, $time);
		fwrite($logHandle, $space);
		fwrite($logHandle, $space);
	fclose($logHandle);

}

function logFile($log){
	$myfile = $log;
	if (file_exists($myFile)) {
	  $fh = fopen($myFile, 'a');
	} else {
	  $fh = fopen($myFile, 'w');
	}
	return $fh;
}





 ?>
