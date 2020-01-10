<?php					
					// Submitter Info
					 $subFname = $_POST['subFname'];
					 $subLname = $_POST['subLname'];
				     $subEmail = $_POST['subEmail'];
				     //Hiree Info
				     $fName = $_POST['Fname'];
				     $lName = $_POST['Lname'];
				     $email = $_POST['email'];
				     $phone = $_POST['phone'];
				     $phone = $_POST['phone'];
				     $aboutUs = $_POST['aboutUs'];
				     $aboutUsBox = $_POST['howAboutUsText'];
				     $under17= $_POST['under17'];
				     $locations = $_POST['locations'];
				     $region= $_POST['region'];
				     $hs= $_POST['hs'];
				     $permit= $_POST['permit'];
				     $wpReason= $_POST['wpreason'];
				     $seasonal= $_POST['seasonal'];
				     $seasAv= $_POST['seasav'];
				     $startAv= $_POST['startav'];
				     $timeOff= $_POST['timeOff'];
				     $timeOffBox= $_POST['timeOffBox'];
				     $position= $_POST['position'];
				     $trainingTrack= $_POST['trainingTrack'];
				     $startingRate= $_POST['startingRate'];
				     $otherPosition = $_POST['otherPosition'];
				     $letterTR= $_POST['letterTR'];
				     $days= $_POST['days'];
				     $times= $_POST['times'];
				     $surveyName = $_SESSION['survey'];

				     $ip = $_SESSION['ip'];
				     $url = $_SESSION['url'];


					//Format About Us section and text box for email output
				     $howAboutUsOutput;
				     	 switch ($aboutUs){
				     	 	case "Career Fair":
				     	 		$howAboutUsOutput = "<li>How did he/she hear about us: <b>".$aboutUs."</b></li><li>Specifics: <b>".$aboutUsBox."</b></li>";
				     	 		break;
							case "Campus Tabling":
								$howAboutUsOutput = "<li>How did he/she hear about us: <b>".$aboutUs."<b/></li><li>Specifics: <b>".$aboutUsBox."</b></li>";
								break;
							case "Employee":
								$howAboutUsOutput = "<li>How did he/she hear about us: <b>".$aboutUs."</b></li><li>Employee that referred: <b>".$aboutUsBox."</b></li>";
								break;
							case "Referral":
								$howAboutUsOutput = "<li>How did he/she hear about us: <b>".$aboutUs."</b></li><li>Specifics: <b>".$aboutUsBox."</b></li>";
								break;
							case "Word of Mouth":
								$howAboutUsOutput = "<li>How did he/she hear about us: <b>".$aboutUs."</b></li><li>Specifics: <b>".$aboutUsBox."</b></li>";
								break;
							case "Talent Community":
								$howAboutUsOutput = "<li>How did he/she hear about us: <b>".$aboutUs."</b></li><li>Specifics: <b>".$aboutUsBox."</b></li>";
								break;
							case "Other":
								$howAboutUsOutput = "<li>How did he/she hear about us: <b>".$aboutUs."</b></li><li>Specifics: <b>".$aboutUsBox."</b></li>";
								break;
							default:
								$howAboutUsOutput = "<li>How did he/she hear about us: <b>".$aboutUs."</b></li>";
								break;

						 }
				     

				     //Breakdown location array and format for output
				     $positionOutput;
				     switch ($position){
				     	case "Swim Instructor":
				     		$positionOutput = "<li>Training Track: <b>".$trainingTrack."</b></li>";
				     		break;
				     	case "Deck Guard/Lifeguard":
				     		$positionOutput = "<li>Agreed upon training rate: <b>".$startingRate."</b></li>";
				     		break;
				     	case "Other":
				     		$positionOutput = "<li>Position Entered: <b>".$otherPosition."</b></li><li>Agreed upon training rate: <b>".$startingRate."</b></li>";
				     		break;
				     	default:
				     		$positionOutput = "<li>Agreed upon training rate: <b>".$startingRate."</b></li><li>Do we need to send a training program offer letter through TalentReef? <b>".$letterTR."</b></li>";
				     		break;

				     }
				    

				    //Breakdown location array and format for output
				    $locationsOutput;
				    if(isset($locations)){
				    	
				    	if (is_array($locations)){
				    		foreach($locations as $loc){
				     		$locationsOutput .= "<li><b>".$loc."</b></li>";
				    		}
				    	}
				    	else{
				    		$locationsOutput .= "<li><b>".$locations."</b></li>";
				    	}
				    	
					$locationsOutput = str_replace("_"," ",$locationsOutput);
				    }
				    

					//Training Availablity breakdown and formatting
					$trainingAvalOutput;
					if(is_array($days) && is_array($times)){
						foreach($days as $index => $day){
							$trainingAvalOutput .= "<li><b>".$day.": ".$times[$index]."</b></li>";
	
						}
						
					}
					else{
						$trainingAvalOutput .= "<li><b>".$days.": ".$times."</b></li>";
					}

					//Questions about 17 and under
					$ageQuestions;
					if($under17 == "Yes"){
						$ageQuestions = '<li>17 years old or under: <b>'.$under17.'</b></li><li>High School Student: <b>'.$hs.'</b></li>';

						if($hs == "Yes"){
							$ageQuestions .= '<li>Final Work Permit Received: <b>'.$permit.'</b></li>';
							if($permit == "No"){
								$ageQuestions .='<li>Reason: <b>'.$wpReason.'</b></li>';
							}
						}

					}
					else{
					 	$ageQuestions = '<li>17 years old or under: <b>'.$under17.'</b></li>';
					 }

					//Check is last day is set to yes and add followup question
					$seasonLastDay;
					if($seasonal == "Yes"){
						$seasonLastDay = "<li>Last day available to work: <b>".$seasAv."</b></li>";
					}

					$approvedTimeOff;
					if($timeOff == "Yes"){
						$approvedTimeOff = '<li>Time Off Pre-Approved During Interview: <b>'.$timeOff.'</b></li>';
						$approvedTimeOff .='<li>Time Off: <b>'.$timeOffBox.'</b></li>';
					}
					else{
						$approvedTimeOff = '<li>Time Off Pre-Approved During Interview: <b>'.$timeOff.'</b></li>';
					}


					$todaysDate = date("l F Y jS");
					$todaysTime = date("h:i A");
					

				    $from = "requests@waterworksswim.com";
					$to = "kelsey.b@waterworksswim.com, brandee@waterworksswim.com, kim.r@waterworksswim.com";
					if(!empty($subEmail)){
						$to .=", ".$subEmail;
						$replyToAdd = $subEmail;
						if($subEmail == "victor@waterworksswim.com"){
							$to = $subEmail;
						}
					}

					//TESTING CHANGE

								

					$subject = $surveyName;
					$headers = "From: $from\r\n" .
								"MIME-Version: 1.0 \r\n" .
								"Content-type: text/html; charset=iso-8859-1\r\n";

					$body = '			<html>
										  <head>
										    <meta name="viewport" content="width=device-width" />
										    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
										    <title>'.$surveyName.'</title>
										    <style>
										      /* -------------------------------------
										          GLOBAL RESETS
										      ------------------------------------- */
										      
										      /*All the styling goes here*/
										      
										      img {
										        border: none;
										        -ms-interpolation-mode: bicubic;
										        max-width: 100%; 
										      }

										      body {
										        background-color: #f6f6f6;
										        font-family: sans-serif;
										        -webkit-font-smoothing: antialiased;
										        font-size: 14px;
										        line-height: 1.4;
										        margin: 0;
										        padding: 0;
										        -ms-text-size-adjust: 100%;
										        -webkit-text-size-adjust: 100%; 
										      }

										      table {
										        border-collapse: separate;

										        mso-table-lspace: 0pt;
										        mso-table-rspace: 0pt;
										        width: 100%; }
										        table td {
										          font-family: sans-serif;
										          font-size: 14px;
										          vertical-align: top; 
										      }

										      /* -------------------------------------
										          BODY & CONTAINER
										      ------------------------------------- */

										      .body {
										        background-color: #f6f6f6;
										        width: 100%; 
										      }

										      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
										      .container {
										        display: block;
										        margin: 0 auto !important;
										        /* makes it centered */
										        max-width: 750px;
										        padding: 10px;
										        width: 750px; 
										      }

										      /* This should also be a block element, so that it will fill 100% of the .container */
										      .content {
										        box-sizing: border-box;
										        display: block;
										        margin: 0 auto;
										        max-width: 750px;
										        padding: 10px; 
										      }

										      /* -------------------------------------
										          HEADER, FOOTER, MAIN
										      ------------------------------------- */
										      .main {
										        background: #ffffff;
										        border-radius: 3px;
										        width: 100%; 
										      }

										      .wrapper {
										        box-sizing: border-box;
										        padding: 20px; 
										      }

										      .content-block {
										        padding-bottom: 10px;
										        padding-top: 10px;
										      }

										      .footer {
										        clear: both;
										        margin-top: 10px;
										        text-align: center;
										        width: 100%; 
										      }
										        .footer td,
										        .footer p,
										        .footer span,
										        .footer a {
										          color: #999999;
										          font-size: 12px;
										          text-align: center; 
										      }
										      .center {
												  display: block;
												  margin-left: auto;
												  margin-right: auto;
												  width: 50%;
												}
											   .tab { 
											   	  margin-left: 40px; 
											   	}

										      /* -------------------------------------
										          TYPOGRAPHY
										      ------------------------------------- */
										      h1,
										      h2,
										      h3,
										      h4 {
										        color: #000000;
										        font-family: sans-serif;
										        font-weight: 400;
										        line-height: 1.4;
										        margin: 0;
										        margin-bottom: 30px; 
										      }

										      h1 {
										        font-size: 35px;
										        font-weight: 300;
										        text-align: center;
										        text-transform: capitalize; 
										      }

										      p,
										      ul,
										      ol {
										        font-family: sans-serif;
										        font-size: 14px;
										        font-weight: normal;
										        margin: 0;
										        margin-bottom: 15px; 
										      }
										        p li,
										        ul li,
										        ol li {
										          list-style-position: inside;
										          margin-left: 5px; 
										      }

										      a {
										        color: #3498db;
										        text-decoration: underline; 
										      }
										      .debugInfo{
										      	font-size: 8px;
										      	font-weight: small;
										      }

										      /* -------------------------------------
										          BUTTONS
										      ------------------------------------- */
										      .btn {
										        box-sizing: border-box;
										        width: 100%; }
										        .btn > tbody > tr > td {
										          padding-bottom: 15px; }
										        .btn table {
										          width: auto; 
										      }
										        .btn table td {
										          background-color: #ffffff;
										          border-radius: 5px;
										          text-align: center; 
										      }
										        .btn a {
										          background-color: #ffffff;
										          border: solid 1px #3498db;
										          border-radius: 5px;
										          box-sizing: border-box;
										          color: #3498db;
										          cursor: pointer;
										          display: inline-block;
										          font-size: 14px;
										          font-weight: bold;
										          margin: 0;
										          padding: 12px 25px;
										          text-decoration: none;
										          text-transform: capitalize; 
										      }

										      .btn-primary table td {
										        background-color: #3498db; 
										      }

										      .btn-primary a {
										        background-color: #3498db;
										        border-color: #3498db;
										        color: #ffffff; 
										      }

										      /* -------------------------------------
										          OTHER STYLES THAT MIGHT BE USEFUL
										      ------------------------------------- */
										      .last {
										        margin-bottom: 0; 
										      }

										      .first {
										        margin-top: 0; 
										      }

										      .align-center {
										        text-align: center; 
										      }

										      .align-right {
										        text-align: right; 
										      }

										      .align-left {
										        text-align: left; 
										      }

										      .clear {
										        clear: both; 
										      }

										      .mt0 {
										        margin-top: 0; 
										      }

										      .mb0 {
										        margin-bottom: 0; 
										      }

										      .preheader {
										        color: transparent;
										        display: none;
										        height: 0;
										        max-height: 0;
										        max-width: 0;
										        opacity: 0;
										        overflow: hidden;
										        mso-hide: all;
										        visibility: hidden;
										        width: 0; 
										      }

										      .powered-by a {
										        text-decoration: none; 
										      }

										      hr {
										        border: 0;
										        border-bottom: 1px solid #f6f6f6;
										        margin: 20px 0; 
										      }

										      /* -------------------------------------
										          RESPONSIVE AND MOBILE FRIENDLY STYLES
										      ------------------------------------- */
										      @media only screen and (max-width: 620px) {
										        table[class=body] h1 {
										          font-size: 28px !important;
										          margin-bottom: 10px !important; 
										        }
										        table[class=body] p,
										        table[class=body] ul,
										        table[class=body] ol,
										        table[class=body] td,
										        table[class=body] span,
										        table[class=body] a {
										          font-size: 16px !important; 
										        }
										        table[class=body] .wrapper,
										        table[class=body] .article {
										          padding: 10px !important; 
										        }
										        table[class=body] .content {
										          padding: 0 !important; 
										        }
										        table[class=body] .container {
										          padding: 0 !important;
										          width: 100% !important; 
										        }
										        table[class=body] .main {
										          border-left-width: 0 !important;
										          border-radius: 0 !important;
										          border-right-width: 0 !important; 
										        }
										        table[class=body] .btn table {
										          width: 100% !important; 
										        }
										        table[class=body] .btn a {
										          width: 100% !important; 
										        }
										        table[class=body] .img-responsive {
										          height: auto !important;
										          max-width: 100% !important;
										          width: auto !important; 
										        }
										      }

										      /* -------------------------------------
										          PRESERVE THESE STYLES IN THE HEAD
										      ------------------------------------- */
										      @media all {
										        .ExternalClass {
										          width: 100%; 
										        }
										        .ExternalClass,
										        .ExternalClass p,
										        .ExternalClass span,
										        .ExternalClass font,
										        .ExternalClass td,
										        .ExternalClass div {
										          line-height: 100%; 
										        }
										        .apple-link a {
										          color: inherit !important;
										          font-family: inherit !important;
										          font-size: inherit !important;
										          font-weight: inherit !important;
										          line-height: inherit !important;
										          text-decoration: none !important; 
										        }
										        #MessageViewBody a {
										          color: inherit;
										          text-decoration: none;
										          font-size: inherit;
										          font-family: inherit;
										          font-weight: inherit;
										          line-height: inherit;
										        }
										        .btn-primary table td:hover {
										          background-color: #34495e !important; 
										        }
										        .btn-primary a:hover {
										          background-color: #34495e !important;
										          border-color: #34495e !important; 
										        } 
										      }


										    </style>
										  </head>
										  <body class="">
										    <span class="preheader">'.$surveyName.'</span>
										    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
										      <tr>
										        <td>&nbsp;</td>
										        <td class="container">
										          <div class="content">

										            <!-- START CENTERED WHITE CONTAINER -->
										            <table role="presentation" class="main">

										              <!-- START MAIN CONTENT AREA -->
										              <tr>
										                <td class="wrapper">
										                  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
											                <th>
											                  <img src="https://www.waterworksswim.com/content/images/branding/footer-logo-wave-small.png" alt="Waterworks Logo" class="center">
											                  <p><h2 class="center">'.$surveyName.'</h2></p>
											                </th>
										                    <tr>
										                      <td>

										                      	<p>Submitted by '.$subFname.' '.$subLname.'</p>
											                    <div class="tab">
											                        <p>New Hire\'s Information</p>
											                        <ul>
											                          <li>First Name: <b>'.$fName.'</b></li>
											                          <li>Last Name: <b>'.$lName.'</b></li>
											                          <li>Email: <b>'.$email.'</b></li>
											                          <li>Phone Number: <b>'.$phone.'</b></li>
											                          '.$howAboutUsOutput.'
											                          <li>Location</li>
											                          	<ul>
											                          		'.$locationsOutput.'
											                          	</ul>
											                          '.$ageQuestions.'	
											                          <li>Seasonal Hire: <b>'.$seasonal.'</b></li>	
											                          '.$seasonLastDay.'
											                          '.$approvedTimeOff.'
											                        </ul>
											                        <p>Position and Training</p>
											                        <ul>
											                        	<li>Position: <b>'.$position.'</b></li>
											                        	'.$positionOutput.'
											                        	<li>Date available to start training: <b>'.$startAv.'</b></li>
											                        	<li>Training Availability:</li>
											                        		<ul>'.$trainingAvalOutput.'</ul>
											                        </ul>
											                    </div> 
											                    <p class="center">Submitted on '.$todaysDate.' at '.$todaysTime.'</p>
											                    

											                  </td>
										                    </tr>
										                  </table>
										                </td>
										              </tr>

										            <!-- END MAIN CONTENT AREA -->
										            </table>
										            <!-- END CENTERED WHITE CONTAINER -->

										            <!-- START FOOTER -->
										            <div class="footer">
										              <table role="presentation" border="0" cellpadding="0" cellspacing="0">
										                <tr>
										                  <td class="content-block">
										                    <span class="apple-link">Waterworks Aquatics, 25 Waterworks Way, Irvine CA 92618</span><br />
										                    <span class="apple-link">IP Address: '.$ip.'<br /> URL: '.$url.'</span>
										                  </td>
										                </tr>
										                
										              </table>
										            </div>
										            <!-- END FOOTER -->

										          </div>
										        </td>
										        <td>&nbsp;</td>
										      </tr>
										    </table>
										  </body>
										</html>';
?>