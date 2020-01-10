<?php

	session_start();
	session_unset();

	$survey = "New Family Inquiry";
	$_SESSION['survey'] = $survey;
	$process = "process/process.php";
	$_SESSION['email'] = $email;

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Forms/Reports - <?php echo $survey ?></title>

		
		<!-- Style Sheet for form -->
		<link rel="stylesheet" type="text/css" href="form.css" />
		<!-- Include head php file -->
		<script src='https://www.google.com/recaptcha/api.js'></script>
		<script src="https://code.jquery.com/jquery-3.4.1.min.js"integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		
		<style>
			.toggle {
				display: none;
			}
		</style>

			

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
	             	<a href="/reports" class="nav-link" >Home</a> 
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
	    <div class="container toggle" id="successContainer" >
	    	<div class="row">
	        	<div class="col-lg-12 text-center">
	    			<div class="alert alert-success" role="alert">
	    				<h4 class="alert-heading">Success!</h4>
	    				<p>Thank you, the information you entered has been sucessfully submitted!</p>
	    				<hr>
	    				<p class="mb-0">
	    					<button type="button" class="btn btn-primary btn-sm" onclick="reloadPage();">Submit another inquiry</button>
	    				</p>
	    			</div>
	    		</div>
	    	</div>
	    </div>
	    <div class="container toggle" id="errorContainer" >
	    	<div class="row">
	        	<div class="col-lg-12 text-center">
	    			<div class="alert alert-danger" role="alert">
	    				<h4 class="alert-heading">Something Went Wrong</h4>
	    				<p>We encountered and issue while trying to submit the infomation, please try again</p>
	    				<p>If this is the 2nd time in a row you encountered an issue please submit a ticket so the IT team can look into it.</p>
	    				<hr>
	    				<p class="mb-0">
	    					<button type="button" class="btn btn-primary btn-sm" onclick="reloadPage();">Try Again</button>
	    				</p>
	    			</div>
	    		</div>
	    	</div>
	    </div>
	    <div class="container" id="mainContainer" >
	      <div class="row">
	        <div class="col-lg-12 text-center">
	              <h1 class="mt-3 ww-blue">New Family Inquiry</h1>
	          </div>
	        </div>

	        <div class="row " id="mainForm" name="mainForm">
				<div class="col-lg-8 offset-md-2 mt-2">

						<form action="<?php echo($process); ?>" method="post" name="contact_form" id="contactForm">
						  
						
						 
							  <div class="form-row">
							  	<div class="form-group col-lg-6">
							  		 <label for="Fname">Client First Name:</label>
							    	<input type="text" class="form-control" id="subFname" name="subFname" placeholder="Enter Client's First Name" required>
							  	</div>
							  	<div class="col">
							  		<label for="Lname">Client Last Name:</label>
							    	<input type="text" class="form-control" id="subLname" name="subLname" placeholder="Enter Client's Last Name" required>
							  	</div>
							  </div>
							  <div class="form-row">
							  	<div class="form-group col-lg-12">
							  		<label for="subPhone">Client Phone Number:</label>
							    	<input type="tel" class="form-control" id="subPhone" name="subPhone" placeholder="Enter Phone" required>
							  	</div>
							  </div>
							 <div class="form-row">
							  	<div class="form-group col-lg-6">
							  		<label>Region</label>
							  		<select class="custom-select" id="region" required>
							  			<option selected disabled>Select a Region</option>
										<option>Orange County</option>
										<option>San Diego County</option>
										<option>Los Angeles County</option>
										<option>Northern California</option>
										<option>Denver</option>
							  		</select>
							  	</div>
							  	<div class="form-group col-lg-6">
							  		<label >Location</label>
							  		<div class="form-check" id="facility">
							  			<!-- Dependent Region option field -->
							  		</div>
							  	</div>
							  </div>
							   <div class="form-group">
							    <label for="textArea1">Additional comments</label>
							    <textarea class="form-control" id="textArea1" rows="3" name="textArea1" placeholder="Optional"></textarea>
							  </div>
							 
						  	  <div class="form-row">
							  	<div class="form-group col-lg-12 ">
							  		<div class="g-recaptcha float-left" data-sitekey="6Lc0ZhoTAAAAAKA4LIF9qD4Bg-vfyMa9UYCQ-1FC" data-callback="capenable" data-expired-callback="capdisable"></div>
							  	</div>
							  </div>
							  <div class="form-row">
							  	<div class="form-group col-lg-12">
							  		<div id="subBtn">
							  			<input class="btn btn-primary" value="Submit" id="submit" disabled="disabled" onclick="sendData()">
							  		</div>
							  	</div>
							  </div>
							
  
						  
						</form>
				</div>
			</div>

			
		</div>



		<script type="text/javascript">
			
			var OC = [
				{display: "Huntington Beach",value: "Huntington Beach", name: "locations[]"},
				{display: "Irvine",value: "Irvine", name: "locations[]"},
				{display: "Anaheim Hills",value: "Anaheim Hills", name: "locations[]"},
				{display: "Yorba Linda",value: "Yorba Linda", name: "locations[]"}
			];
			var SDC = [
				{display: "Carlsbad",value: "Carlsbad", name: "locations[]"},
				{display: "Sorrento Valley",value: "Sorrento Valley", name: "locations[]"},
				{display: "Poway",value: "Poway", name: "locations[]"},
				{display: "Temecula",value: "Temecula", name: "locations[]"}
			];
			var LAC = [
				{display: "Culver City",value: "Culver City", name: "locations[]"},
				{display: "Torrance",value: "Torrance", name: "locations[]"},
				{display: "Alhambra",value: "Alhambra", name: "locations[]"},
				{display: "West Covina",value: "West Covina", name: "locations[]"},
				{display: "Pasadena",value: "Pasadena", name: "locations[]"},
				{display: "Sierra Madre",value: "Sierra Madre", name: "locations[]"},
				{display: "Diamond Bar",value: "Diamond Bar", name: "locations[]"}
			];
			var NC = [
				{display: "20th Avenue",value: "20th Avenue", name: "locations[]"},
				{display: "San Jose Bascom",value: "San Jose Bascom", name: "locations[]"},
				{display: "Brokaw",value: "Brokaw", name: "locations[]"},
				{display: "Almaden",value: "Almaden", name: "locations[]"},
				{display: "Sunnyvale",value: "Sunnyvale", name: "locations[]"},
				{display: "Hayward",value: "Hayward", name: "locations[]"},
				{display: "Blossom Hill",value: "Blossom Hill", name: "locations[]"}
			];
			var DVR = [
				{display: "Highlands Ranch",value: "Highlands Ranch", name: "locations[]"}
			];

			$("#region").change(function() {
				var select = $("#region option:selected").val();
				switch (select) {
					case "Orange County":
						locSelect(OC);
						break;
					case "San Diego County":
						locSelect(SDC);
						break;
					case "Los Angeles County":
						locSelect(LAC);
						break;
					case "Northern California":
						locSelect(NC);
						break;
					case "Denver":
						locSelect(DVR);
						break;
					default:
						$("#facility").empty();
						$("#facility").append("<option>Select Location</option>");
						break;
				}
			});

			// Function To List out Cities in Second Select tags
			function locSelect(arr) {

				$("#facility").empty(); //To reset cities
				$(arr).each(function(i) { //to list cities
					var value = arr[i].value.replace( ' ', '_' );
					$("#facility").append("<div class=\"form-check\"> <input class=\"form-check-input\" type=\"checkbox\" value=" + value + " id=" + value +" name=" + arr[i].name + " ><label class=\"form-check-label\" for=" + value + ">" + arr[i].display + "</label></div>");
				});
			};

			

			/* ReCAPTCHA disable */

			function capenable() {
				$('#submit').prop('disabled', false);
				$("#default").removeAttr('selected');

				$("#prev").hide();
				$("#next").hide();
			}
			
			function capdisable() {
				$('#submit').prop('disabled', true);
				$("#default").attr('selected','selected');
			}
			
			document.addEventListener('domready', function(){
				capdisable();
			});	

			function reloadPage(){
				location.reload();
			}
			function receivedStatus(status){
				switch(status){
					case 1:
						console.log("received 1");
						$("#mainContainer").hide(); 
	                	$("#successContainer").show();
	                	break;
	                case 0:
	                	console.log("RECEIVED 2");
	                	$("#mainContainer").hide(); 
	                	$("#errorContainer").show();
	                	break;
				}
			}

			function showLoading(){
				$("#subBtn").empty();
				$("#subBtn").append("<div class=\"spinner-grow text-primary\" role=\"status\"><span class=\"sr-only\">Loading...</span></div>");
			}
	
	
/* Submitting  */

			
		function sendData(){
			showLoading();
			var URL = $("#contactForm").attr("action");
			$.ajax({
	                type: "POST",
	                url: "process/process.php",
	                data: $("#contactForm").serializeArray(),
	                dataType: "json",
	                success: function( data, textStatus, jQxhr ){
	                	
	                	switch(data.receiveStatus){
	                		case "accepted":
	                			console.log("worked");
	                			receivedStatus(1);
	                			break;
	                		case "error":
	                			console.log("error");
	                			receivedStatus(0);
	                			break;
	                		default:
	                			reloadpage();
	                		}
					
	                	  console.log(data, jQxhr);
	                },
	                error: function( jqXhr, textStatus, errorThrown, xhr ){
	                	setTimeout(receivedStatus(0), 3000);
	                    console.log( "error....." + textStatus + "        " + errorThrown  +"           " +jqXhr);
	                    console.warn(xhr)
	                }
	                	
	        }); 
		}

		</script>
		<!-- Bootstrap 4 CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</body>
</html>
