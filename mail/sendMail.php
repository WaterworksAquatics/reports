<?php
require 'mailer/PHPMailerAutoload.php';

function emailPrepSend($to, $from, $body, $subject, $replyToAdd="n" ,$name='Waterworks Aquatics'){

	$mail = new PHPMailer;

	//$mail->SMTPDebug = 2;

	$mail->isSMTP();                                     	// Set mailer to use SMTP
	$mail->Host = 'smtp-relay.gmail.com';  					// Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               	// Enable SMTP authentication
	$mail->Username = 'debug@waterworksswim.com';           // SMTP username
	$mail->Password = 'mamaSita321';                        // SMTP password
	$mail->SMTPSecure = 'tls';                            	// Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    	// TCP port to connect to

	$mail->setFrom( $from, $name);

	if($replyToAdd != "n"){
		$mail->addReplyTo($replyToAdd);
	}

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
	$ext = "_error_log.txt";
	$log = 'Email'.$ext;
	$logHandle = fopen("log/$log", 'a') or die ("cannot create log");
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





 ?>
