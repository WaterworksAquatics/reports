<?php
	header('Content-Type: application/json');
	session_start();
	date_default_timezone_set('America/Los_Angeles');

	$mailSend = $_SERVER['DOCUMENT_ROOT'];
	$mailSend .= "/mail/sendMail.php";
	require $mailSend;

	$time = date('F j, Y @ g:ia');
	$url = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH);

	$ip = $_SERVER['REMOTE_ADDR']; 								//User's IP Address		
	$surveyName = $_SESSION['survey'];	
	$formName;		
	

	function processData($survey){																				
					switch($survey){
						case "New Family Inquiry":
							$formName= "newFamProcess.php";
							break;
						case "Onboarding Request":
							$formName= "onboardingProcess.php";
							break;
						default:
							sendResponse(0);
							break;

					}
					
					require $formName;

					$sent = emailPrepSend($to, $from, $body, $subject, $replyToAdd );
					if($sent){
							sendResponse(1);
						}
					else {
							sendResponse(0);
						} 
	};

			
	// Process server output, populate $response array, write to file, 
	function sendResponse($serverOutput){
		switch($serverOutput){
			case 1:											//1 = application was received by server and written to DB 
				$response['success'] = true;				//Set success to true   (part of $response array)
				$response['receiveStatus'] = "accepted";	//Set receiveStatus as accepted (part of $response array)
					
				echo json_encode($response);				//return $response Array encoded at JSON
				break;
			// case 2:											//2 = Application was found to be a duplicate, not written to DB
			// 	$response['success'] = true;				//Set success to true   (part of $response array) as the application was process by server
			// 	$response['receiveStatus'] = "duplicate";	//Set receiveStatus as duplicate (part of $response array)
			// 	writeToFile($response, $serverOutput);   	//Send Response Array and Server output to writeToFile Function
			// 	echo json_encode($response);					//return $response Array encoded at JSON
			// 	break;
			case 0:											//0 = Error, the server returned an error (no failed message being sent as of 12/19/2016)
				$response['success'] = false;				//Set success to false   (part of $response array) application server ran into an issue
				$response['receiveStatus'] = "error";		//Set receiveStatus as error (part of $response array)
				echo json_encode($response);				//return $response Array encoded at JSON
				break;
		}	
	};

	
	processData($surveyName);

?>