<?php

	session_start();
	session_unset();

	$survey = "Maintenance Issue";
	$_SESSION['survey'] = $survey;

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Forms/Reports - <?php echo $survey ?></title>

		<!-- Bootstrap 4 CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<!-- Style Sheet for form -->
		<link rel="stylesheet" type="text/css" href="form.css" />
		<!-- Include head php file -->
		<script src="/js/recaptcha.js"></script>
		<script src='https://www.google.com/recaptcha/api.js'></script>
		<script
  src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
  crossorigin="anonymous"></script>


	<head>
	<body>

		<body class="white-background">

	    <!-- Navigation -->
	    <nav class="navbar navbar-light navbar-expand-lg static-top bg-light">
	      <div class="container">
	        <a class="navbar-brand" href="/"><img src="http://images3.waterworksswim.com/images/Mobile/header/logo_wwtest.png"></a>
	        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
	          <span class="navbar-toggler-icon"></span>
	        </button>
	        <div class="collapse navbar-collapse" id="navbarResponsive">
	          <ul class="navbar-nav ml-auto">
	            <li class="nav-item">
	             	<a href="/reports" class="nav-link">Home</a> 
	            </li>
	            <li class="nav-item">
	            	<a href="http://www.waterworksswim.com" class="nav-link">Website</a>
	            </li>
	            <li class="nav-item">
	            	<a href="http://office.waterworksswimonline.com" class="nav-link">System</a>
	            </li>
	          </ul>
	        </div>
	      </div>
	    </nav>
	    <div class="container">
	      <div class="row">
	        <div class="col-lg-12 text-center">
	              <h1 class="mt-3 ww-blue">Report a Maintenance Issue</h1>
	              <p class="lead mt-2">To ensure that your issue is resolved in a timely manner, please provide as many specific details as possible.</p>
	          </div>
	        </div>
	        <div class="row " id="locSelectRow">
	        	<div class="col-lg-6 offset-md-3 mt-3" >
	        		<label for="locSelect">Which Facility would you like to submit an issue for?</label>
					<select class="custom-select" name="locSelect" id="locSelect" required>
						<option value="0" selected disabled>Facility</option>
						<option value="Irvine">Irvine</option>
						<option value="Carlsbad">Carlsbad</option>
						<option value="Highlands Ranch">Highlands Ranch</option>
						<option value="Huntington Beach">Huntington Beach</option>
						<option value="Pasadena">Pasadena</option>
						<option value="San Jose">San Jose</option>
						<option value="Sierra Madre">Sierra Madre</option>
					</select>
	        	</div>
	        </div>

	        <div class="row " id="mainForm" name="mainForm">
				<div class="col-lg-6 offset-md-3 mt-3">

						<!-- <form action="send.php" method="post" name="contact_form">
						  <div class="form-row">
						  	<div class="form-group col-lg-6">
						  		 <label for="Fname">First Name:</label>
						    	<input type="text" class="form-control" id="Fname" name="Fname" placeholder="Enter First Name" required>
						  	</div>
						  	<div class="col">
						  		<label for="Lname">Last Name:</label>
						    	<input type="text" class="form-control" id="Lname" name="Lname" placeholder="Enter Last Name" required>
						  	</div>
						  </div>
						  <div class="form-row">
						  	<div class="form-group col-lg-12">
						  		<label for="email">Email:</label>
						    	<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
						  	</div>
						  </div>
						  <div class="form-row">
						  	<div class="form-group col-lg-12">
						  		<label for="location">Select your the facility you'd like to report an issue for</label>
						  		<select class="custom-select" name="location" id="location" required>
						  			<option selected disabled>Select a Facility</option>
									<option value="Irvine">Irvine</option>
									<option value="Carlsbad">Carlsbad</option>
									<option value="Huntington Beach">Huntington Beach</option>
									<option value="Sierra Madre">Sierra Madre</option>
									<option value="Pasadena">Pasadena</option>
									<option value="San Jose">San Jose</option>
									<option value="Highlands Ranch">Highlands Ranch</option>
						  		</select>
						  	</div>
						  </div>
						  <div class="form-row">
						  	<div class="form-group col-lg-12">
						  		<label for="message">Explain what you are having issues with</label>
    							<textarea class="form-control" id="message" name="message" rows="3" required></textarea>
						  	</div>
						  </div>
						  <div class="form-row">
						  	<div class="form-group col-lg-12">
						  		<div class="g-recaptcha float-left" data-sitekey="6Lc0ZhoTAAAAAKA4LIF9qD4Bg-vfyMa9UYCQ-1FC" data-callback="capenable" data-expired-callback="capdisable"></div>
						  	</div>
						  </div>
						  <div class="form-row">
						  	<div class="form-group col-lg-12">
						  		<input class="btn btn-primary" type="submit" value="Submit" id="submit" disabled="disabled">
						  	</div>
						  </div>
						</form> -->

						<!-- <iframe width="940px" height= "1680px" src= "https://forms.office.com/Pages/ResponsePage.aspx?id=HP1dMjwyakeDQE0BFb9e8Gmw1Gi723RJgjhVKVyVERlUNzRETTc1UUwyOTJSMU81TTkwT0hZVlk0Ny4u&embed=true" frameborder= "0" marginwidth= "0" marginheight= "0" style= "border: none; max-width:100%; max-height:100vh" allowfullscreen webkitallowfullscreen mozallowfullscreen msallowfullscreen> </iframe>
 -->
				</div>
			</div>

			
		</div>


		<!-- Bootstrap JS Files -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

		<script type="text/javascript">
			var $select = $( '#locSelect' );
			var $form = $( '#mainForm' );
			var $locSelectRow = $('#locSelectRow');
			    
			$select.on( 'change', function() {
				switch(this.value){
					case "Irvine":
						window.location.replace("https://forms.office.com/Pages/ResponsePage.aspx?id=HP1dMjwyakeDQE0BFb9e8AgAt1P1CMtKkwaG2mfyeRNUMldXMEhHOVRWSldFUDFORTJLSjNaWlQ3SiQlQCN0PWcu");
						break;
					case "Carlsbad":
						window.location.replace("https://forms.office.com/Pages/ResponsePage.aspx?id=HP1dMjwyakeDQE0BFb9e8AgAt1P1CMtKkwaG2mfyeRNURVFTT0JPU0Q0R1lMRFlHTE44Vk9TMUxTTiQlQCN0PWcu");
						break;
					case "Highlands Ranch":
						window.location.replace("https://forms.office.com/Pages/ResponsePage.aspx?id=HP1dMjwyakeDQE0BFb9e8AgAt1P1CMtKkwaG2mfyeRNUM0IxU0daTlRaNDNDSzdIRU1LVDRIT05KOCQlQCN0PWcu");
						break;
					case "Huntington Beach":
						window.location.replace("https://forms.office.com/Pages/ResponsePage.aspx?id=HP1dMjwyakeDQE0BFb9e8AgAt1P1CMtKkwaG2mfyeRNUQ1BZVkIwUk5ZUTBSME1QRTlIRVA1TklJQyQlQCN0PWcu");
						break;
					case "Pasadena":
						window.location.replace("https://forms.office.com/Pages/ResponsePage.aspx?id=HP1dMjwyakeDQE0BFb9e8AgAt1P1CMtKkwaG2mfyeRNUNEQ1QjlIS0MyNzFaNTFCSFNCRDdVUjRZWiQlQCN0PWcu");
						break;
					case "San Jose":
						window.location.replace("https://forms.office.com/Pages/ResponsePage.aspx?id=HP1dMjwyakeDQE0BFb9e8AgAt1P1CMtKkwaG2mfyeRNURDBaSUNKWDdRVFJFR0U1OU1ZSFZEUVE1VyQlQCN0PWcu");
						break;
					case "Sierra Madre":
						window.location.replace("https://forms.office.com/Pages/ResponsePage.aspx?id=HP1dMjwyakeDQE0BFb9e8AgAt1P1CMtKkwaG2mfyeRNUQTNYNzZENDRWU1EzR0RDRFlETEFROEZXWSQlQCN0PWcu");
						break;
				}


				/*if(this.value == "Irvine"){
					window.location.replace("https://waterworksaquatics.macmms.com/?act=maintenance_service_request");
				}
				if(this.value == "other"){
					$( $locSelectRow ).hide();  
					$( $form ).show(); 
				}*/
			} ).trigger( 'change' );

		</script>
	</body>
</html>
