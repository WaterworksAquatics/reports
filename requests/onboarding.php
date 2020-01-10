<?php

	session_start();
	session_unset();

	$survey = "Onboarding Request";
	$_SESSION['survey'] = $survey;
	$process = "process/process.php";
	$_SESSION['email'] = $email;

	//Get user IP address and URL 
	$_SESSION["ip"] = $_SERVER['REMOTE_ADDR'];
	$url = $_SERVER['HTTP_HOST']; 
	// Append the requested resource location to the URL 
	$url .= $_SERVER['REQUEST_URI']; 
	$_SESSION['url'] = $url;


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
		<script>
			//Previous and Next button controls	
				var tabIndex = 0;

				function nav(btnPressed){
					//Next and Previous button Control
					switch(btnPressed){
						case "prev":
							tabIndex--;
							break;
						case "next":
							tabIndex++;
							break;
						case "review":
							tabIndex = 0;
							break;
						case 0:
							tabIndex = 0;
							break;
						case 1:
							tabIndex = 1;
							break;
						case 2:
							tabIndex = 2;
							break;
						case 3:
							tabIndex = 3;
							break;
						default:
							break;
					}
					//Enables or disables prev and next button as needed
					switch(tabIndex){
						case 0:
							$('#prev').prop("disabled", true); 
							$('#next').prop("disabled", false); 
							break;
						case 1:
							$('#prev').prop("disabled", false); 
							break;
						case 2:
							$('#next').prop("disabled", false); 
							break;
						case 3:
							$('#prev').prop("disabled", false); 
							$('#next').prop("disabled", true); 
							break;
						default:
							break;
					}
					//Show next or previous tab
					$("#myTab li:eq("+tabIndex+") a").tab('show');
				}


				function reviewApp(){
					nav("review");
					$("#reviewBtn").hide();
					setTimeout(function(){
					  $("#submitItems").show();
					}, 1000);
					
				}

			//Show Tab 0 on load
		        $(document).ready(function(){ 
			        $("#myTab a").click(function(e){
			            e.preventDefault();
			            $(this).tab('show');
			        });
			    });
		</script>
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
	    <div class="container" id="mainContainer">
	      <div class="row">
	        <div class="col-lg-12 text-center">
	              <h1 class="mt-3 ww-blue">Onboarding Request</h1>
	          </div>
	        </div>

	        <div class="row " id="mainForm" name="mainForm">
				<div class="col-lg-8 offset-md-2 mt-2">

						<form action="<?php echo($process); ?>" method="post" name="contact_form" id="userForm">
						  <div class="form-row">
							  <div class="form-group col-lg-12">					
							  	<ul id="myTab" class="nav nav-tabs">
							        <li class="nav-item justify-content-center">
							            <a href="#requester" class="nav-link active" onclick="nav(0)">Your Information</a>
							        </li>
							        <li class="nav-item">
							            <a href="#hire" class="nav-link" onclick="nav(1)">New Hire information</a>
							        </li>
							        <li class="nav-item">
							            <a href="#training" class="nav-link" onclick="nav(2)">Position and Training</a>
							        </li>
							        <li class="nav-item">
							            <a href="#submittal" class="nav-link" onclick="nav(3)">Submit</a>
							        </li>
							    </ul>
							  </div>
						  </div>

						<div class="tab-content">  
						  <div class="tab-pane fade show active" id="requester">
							  <div class="form-row">
							  	<div class="form-group col-lg-6">
							  		 <label for="Fname">Your First Name:</label>
							    	<input type="text" class="form-control" id="subFname" name="subFname" placeholder="Enter Your First Name" required>
							  	</div>
							  	<div class="col">
							  		<label for="Lname">Your Last Name:</label>
							    	<input type="text" class="form-control" id="subLname" name="subLname" placeholder="Enter Your Last Name" required>
							  	</div>
							  </div>
							  <div class="form-row">
							  	<div class="form-group col-lg-12">
							  		<label for="email">Your Email:</label>
							    	<input type="email" class="form-control" id="subEmail" name="subEmail" placeholder="Enter Your Email" required>
							  	</div>
							  </div>
						  </div>

						  <div class="tab-pane fade" id="hire">
							  <div class="form-row">
							  	<div class="form-group col-lg-6">
							  		 <label for="Fname">New Hire's First Name:</label>
							    	<input type="text" class="form-control" id="Fname" name="Fname" placeholder="Enter First Name" required>
							  	</div>
							  	<div class="col">
							  		<label for="Lname">New Hire's Last Name:</label>
							    	<input type="text" class="form-control" id="Lname" name="Lname" placeholder="Enter Last Name" required>
							  	</div>
							  </div>
							  <div class="form-row">
							  	<div class="form-group col-lg-6">
							  		<label for="email">New Hire's Email:</label>
							    	<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
							  	</div>
							  	<div class="form-group col-lg-6">
							  		<label for="email">New Hire's Phone Number:</label>
							    	<input type="phone" class="form-control" id="phone" name="phone" placeholder="" required>
							  	</div>
							  </div>
							  <div class="form-row">
							  	<div class="form-group col-lg-6">
							  		<label>How did he/she hear about us:</label>
							  		<select class="custom-select" id="aboutUs" name="aboutUs" required>
							  			<option selected disabled>Select</option>
										<option>Craigslist</option>
										<option>Indeed</option>
										<option>Career Fair</option>
										<option>Campus Tabling</option>
										<option>Employee</option>
										<option>Referral</option>
										<option>Word of Mouth</option>
										<option>Glassdoor</option>
										<option>Google Jobs</option>
										<option>Facebook</option>
										<option>Instagram</option>
										<option>Zip Recruiter</option>
										<option>Google Ad</option>
										<option>LinkedIn</option>
										<option>Care.com</option>
										<option>Talent Community</option>
										<option>Walk-In</option>
										<option>Other</option>
							  		</select>
							  	</div>
							  	<div class="form-group col-lg-6 hidden" id="aboutUsBox">
							  		
							  	</div>

							  </div>
							  <div class="form-row">
							  	<div class="form-group col-lg-6">
							  		<label>Region</label>
							  		<select class="custom-select" id="region" name="region" required>
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
							  
							  <div class="form-row">
							  	<div class="form-group col-lg-4">
							  		<label>17 years old or under</label>
							  		<div class="form-check ">
									  <input class="form-check-input" type="radio" name="under17" id="under17yes" value="Yes">
									  <label class="form-check-label" for="under17yes">
									    Yes
									  </label>
									</div>
									<div class="form-check ">
									  <input class="form-check-input" type="radio" name="under17" id="under17yes" value="No">
									  <label class="form-check-label" for="under17yno">
									    No
									  </label>
									</div>
							  	</div>
							  	<div class="form-group col-lg-4 hidden" id="hs">
							  		<label>High School Student</label>
							  		<div class="form-check ">
									  <input class="form-check-input" type="radio" name="hs" id="hsyes" value="Yes">
									  <label class="form-check-label" for="hsyes">
									    Yes
									  </label>
									</div>
									<div class="form-check ">
									  <input class="form-check-input" type="radio" name="hs" id="hsno" value="No">
									  <label class="form-check-label" for="hsno">
									    No
									  </label>
									</div>
							  	</div>	
							  
							  	<div class="form-group col-lg-4 hidden" id="wp">
							  		<label>Final Work Permit Received</label>
							  		<div class="form-check ">
									  <input class="form-check-input" type="radio" name="permit" id="permityes" value="Yes">
									  <label class="form-check-label" for="permityes">
									    Yes
									  </label>
									</div>
									<div class="form-check ">
									  <input class="form-check-input" type="radio" name="permit" id="permitno" value="No">
									  <label class="form-check-label" for="permitno">
									    No
									  </label>
									</div>
							  	</div>
							  </div>
							  <div class="form-row">
							  	<div class="form-group col-lg-12 hidden" id="wpreason">
							  		 <label for="Fname">Reason:</label>
							    	<input type="text" class="form-control" id="wpreason" name="wpreason"  >
							  	</div>		
							  </div>
							   <div class="form-row">
							  	<div class="form-group col-lg-6">
							  		<label>Seasonal Hire</label>
							  		<div class="form-check ">
									  <input class="form-check-input" type="radio" name="seasonal" id="seasyes" value="Yes">
									  <label class="form-check-label" for="seasyes">
									    Yes
									  </label>
									</div>
									<div class="form-check ">
									  <input class="form-check-input" type="radio" name="seasonal" id="seasno" value="No">
									  <label class="form-check-label" for="seasno">
									    No
									  </label>
									</div>
							  	</div>
							  	<div class="form-group col-lg-6 hidden" id="seasonalaval">
							  		 <label for="seasav">Last day available to work</label>
							    	<input type="date" class="form-control" id="seasav" name="seasav" >
							  	</div>		
							  </div>
							  <div class="form-row">
							  	<div class="form-group col-lg-6" >
							  		<label>Time Off Pre-Approved During Interview?</label>
							  		<div class="form-check ">
									  <input class="form-check-input" type="radio" name="timeOff" id="timeOffyes" value="Yes">
									  <label class="form-check-label" for="timeOffyes">
									    Yes
									  </label>
									</div>
									<div class="form-check ">
									  <input class="form-check-input" type="radio" name="timeOff" id="timeOffno" value="No">
									  <label class="form-check-label" for="timeOffno">
									    No
									  </label>
									</div>
							  	</div>
							  	<div class="form-group col-lg-6 hidden" id="timeOffText">
							  		 <label for="timeOffBox">Enter Time Off</label>
							    	<input type="text" class="form-control" id="timeOffBox" name="timeOffBox" >
							  	</div>		
							  </div>
							  
						  </div>
						
						  <div class="tab-pane fade" id="training">
						  	<div class="form-row">
						  		<div class="form-group col-lg-12 " id="startaval">
							  		 <label for="startav">Date available to start training</label>
							    	<input type="date" class="form-control" id="startav" name="startav" >
							  	</div>
						  	</div>
						  	<div class="form-row">
							  	<div class="form-group col-lg-12">
							  		<label>Position</label>
							  		<select class="custom-select" id="position" name="position" required>
							  			<option selected disabled>Select a Position</option>
										<option value="Swim Instructor">Swim Instructor</option>
										<option value="Deck Guard/Lifeguard">Deck Guard/Lifeguard</option>
										<option value="Quality Manager">Quality Manager</option>
										<option value="Site Manager">Site Manager</option>
										<option value="Aquatics Manager">Aquatics Manager</option>
										<option value="Deck Host">Deck Host</option>
										<option value="CEE">CEE</option>
										<option value="Call Center (Relationship) Specialist">Call Center (Relationship) Specialist</option>
										<option value="Call Center (Relationship) Supervisor">Call Center (Relationship) Supervisor</option>
										<option value="Call Center (Relationship) Manager">Call Center (Relationship) Manager</option>
										<option value="Floor/Assistant Manager">Floor/Assistant Manager</option>
										<option value="General Manager">General Manager</option>
										<option value="Other">Other</option>
							  		</select>
							  	</div>
							</div>

						  	<div class="form-row">
							  	<div class="form-group col-lg-12 hidden" id="trackContainer">
							  	</div>
							</div>
						  	<div class="form-row">
							  	<div class="form-group col-lg-6">
							  		<label class="q">*Training Availability</label>
	                            
	                              <div class="form-check">
	  								<input class="form-check-input" type="checkbox" name="days[]" id="availM" class="day" value="Mon" onclick="hoursBox(this.value, this.id);"><label class="form-check-label" for="availM">Monday</label>
								  </div>
	                              <div class="form-check">
	  								<input class="form-check-input" type="checkbox" name="days[]" id="availT" class="day" value="Tue" onclick="hoursBox(this.value, this.id);"><label class="form-check-label" for="availT">Tuesday</label>
								  </div>
	                              <div class="form-check">
	  								<input class="form-check-input" type="checkbox" name="days[]" id="availW" class="day" value="Wed" onclick="hoursBox(this.value, this.id);"><label class="form-check-label" for="availW">Wednesday</label>
								  </div>
	                              <div class="form-check">
	  								<input class="form-check-input" type="checkbox" name="days[]" id="availTh" class="day" value="Thu" onclick="hoursBox(this.value, this.id);"><label class="form-check-label" for="availTh">Thursday</label>
								  </div>
	                              <div class="form-check">
	  								<input class="form-check-input" type="checkbox" name="days[]" id="availF" class="day" value="Fri" onclick="hoursBox(this.value, this.id);"><label class="form-check-label" for="availF">Friday</label>
								  </div>
	                              <div class="form-check">
	  								<input class="form-check-input" type="checkbox" name="days[]" id="availSa" class="day" value="Sat" onclick="hoursBox(this.value, this.id);"><label class="form-check-label" for="availSa">Saturday</label>
								  </div>
	                              <div class="form-check">
	  								<input class="form-check-input" type="checkbox" name="days[]" id="availSu" class="day" value="Sun" onclick="hoursBox(this.value, this.id);"><label class="form-check-label" for="availSu">Sunday</label>
								  </div>
							  	</div>
						  
								<div class="form-group col-lg-6">
								  <div id="avalHours">
								  	
								  </div>
								</div>
							</div>
						  </div>

						
						  <div class="tab-pane fade" id="submittal">
						  	  	<div class="form-group col-lg-12 text-center">
							  		<button type="button" class="btn btn-primary" id="reviewBtn" onclick="reviewApp()">Review Application</button>
							  	</div>

							 <div id="submitItems" class="hidden">
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
							 </div>
						  </div>
						

						  
						  </div>

						  <div class="form-row">
						  	<div class="form-group col-lg-12" id="prevNextNav">
						  		<nav aria-label="Page navigation example">
								  <ul class="pagination justify-content-center">
								    <li class="page-item" >
								      <button type="button" class="btn btn-primary" id="prev" onclick="nav('prev')" disabled>Previous</button>
								    
								      <button type="button" class="btn btn-primary" id="next" onclick="nav('next')">Next</button>
								    </li>
								  </ul>
								</nav>
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
				{display: "Rancho Palos Verdes",value: "Rancho Palos Verdes", name: "locations[]"},
				{display: "West Covina",value: "West Covina", name: "locations[]"},
				{display: "Pasadena",value: "Pasadena", name: "locations[]"},
				{display: "Sierra Madre",value: "Sierra Madre", name: "locations[]"},
				{display: "Diamond Bar",value: "Diamond Bar", name: "locations[]"},
				{display: "La Verne",value: "La Verne", name: "locations[]"},
				{display: "Arcadia",value: "Arcadia", name: "locations[]"}
			];
			var NC = [
				{display: "SF - 20th Ave",value: "SF - 20th Ave", name: "locations[]"},
				{display: "San Jose",value: "San Jose", name: "locations[]"},
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

			//Check if Under 17 question is checked, if yes display HS question
			$('input:radio[name="under17"]').change(
			   function(){
		        if ($(this).val() == 'Yes') {
		            $("#hs").show();
		        }
		        else {
		             $("#hs").hide();
		        }
			 });

			//Check if HS question is checked, if yes display word permit question
			$('input:radio[name="hs"]').change(
			   function(){
		        if ($(this).val() == 'Yes') {
		            $("#wp").show();
		        }
		        else {
		             $("#wp").hide();
		        }
			 });

			//Check if work permit question is checked, if yes display wp reason question
			$('input:radio[name="permit"]').change(
			   function(){
		        if ($(this).val() == 'No') {
		            $("#wpreason").show();
		        }
		        else {
		             $("#wpreason").hide();
		        }
			 });

			//Check if work permit question is checked, if yes display wp reason question
			$('input:radio[name="seasonal"]').change(
			   function(){
		        if ($(this).val() == 'Yes') {
		            $("#seasonalaval").show();
		        }
		        else {
		             $("#seasonalaval").hide();
		        }
			 });

			//Check if work permit question is checked, if yes display wp reason question
			$('input:radio[name="timeOff"]').change(
			   function(){
		        if ($(this).val() == 'Yes') {
		            $("#timeOffText").show();
		        }
		        else {
		             $("#timeOffText").hide();
		        }
			 });
			// //Display and manipulate attributes on Hours boxes
			// function hoursBox(inputID, checkboxID){


			// 	if($("#"+checkboxID).is(":checked")){
			// 		//console.log(checkboxID +" checked");
			// 		$("#availInput"+inputID).prop('required',true);
			// 		$("#availInput"+inputID).show()
					
			// 	}
			// 	else if($("#"+checkboxID).is(":not(:checked)")){
			// 		//console.log(checkboxID +" unchecked");
			// 		$("#availInput"+inputID).prop('required',false);
			// 		$("#availInput"+inputID).val("");
			// 		$("#availInput"+inputID).hide()
					
			// 	}
					
			// };

			function hoursBox(inputID, checkboxID){
				var dayName;

				switch(inputID){
					case "Mon":
						dayName = "Monday";
						break;
					case "Tue":
						dayName = "Tuesday";
						break;
					case "Wed":
						dayName = "Wednesday";
						break;
					case "Thu":
						dayName = "Thursday";
						break;
					case "Fri":
						dayName = "Friday";
						break;
					case "Sat":
						dayName = "Saturday";
						break;
					case "Sun":
						dayName = "Sunday";
						break;
					default:
						break;
				}

				if($("#"+checkboxID).is(":checked")){
					//console.log(checkboxID +" checked");
					$("#avalHours").append("<div class='form-group' id=\"availInput"+checkboxID+"\"><input type='text' class='form-control form-control-sm' name='times[]' id=\"availInput"+inputID+"\" placeholder='Times Available "+dayName+"'></div>");
					
				}
				else if($("#"+checkboxID).is(":not(:checked)")){
					$("#availInput"+checkboxID).remove()

				}
					
			};

			$("#aboutUs").change(function() {
				var select = $("#aboutUs option:selected").val();
				switch (select) {
					case "Career Fair":
						showHowAboutUS("Please list specifics");
						$("#aboutUsBox").show();
						break;
					case "Campus Tabling":
						showHowAboutUS("Please list specifics");
						$("#aboutUsBox").show();
						break;
					case "Employee":
						showHowAboutUS("Please list employee that referred");
						$("#aboutUsBox").show();
						break;
					case "Referral":
						showHowAboutUS("Please list specifics");
						$("#aboutUsBox").show();
						break;
					case "Word of Mouth":
						showHowAboutUS("Please list specifics");
						$("#aboutUsBox").show();
						break;
					case "Talent Community":
						showHowAboutUS("Please list specifics");
						$("#aboutUsBox").show();
						break;
					case "Other":
						showHowAboutUS("Please list specifics");
						$("#aboutUsBox").show();
						break;
					default:
						$("#aboutUsBox").empty();
						$("#aboutUsBox").hide();
						break;
				}
			});

			// Function To List out Cities in Second Select tags
			function showHowAboutUS(aboutText) {

				$("#aboutUsBox").empty(); //To reset cities
				$("#aboutUsBox").append("<label for=\"howAboutUs\">"+ aboutText +"</label> <input class=\"form-control\" type=\"text\" id=\"howAboutUsText\" name=\"howAboutUsText\" required>");
				
			};

			$("#position").change(function() {
				var select = $("#position option:selected").val();
				switch (select) {
					case "Swim Instructor":
						$("#trackContainer").empty();
						$("#trackContainer").append("<label>Training Track</label> <select class=\"custom-select\" id=\"track\" name=\"trainingTrack\" required> <option selected disabled>Select a Training Track</option><option value=\"General Instructor\">General Instructor</option><option value=\"Gym Instructor\">Gym Instructor</option><option value=\"Learn to Swim Under 3\">Learn to Swim/Under 3</option><option value=\"Technique\">Technique</option></select>");
						$("#trackContainer").show();
						break;
					case "Deck Guard/Lifeguard":
						$("#trackContainer").empty();
						$("#trackContainer").append("<label for=\"Fname\">Agreed upon training rate:</label><input type=\"number\" class=\"form-control\" id=\"startingRate\" name=\"startingRate\" placeholder=\"Enter Rate\" required>");
						$("#trackContainer").show();
						break;
					case "Other":
						$("#trackContainer").empty();
						$("#trackContainer").append("<label for=\"Fname\">Enter Other Position:</label><input type=\"text\" class=\"form-control\" id=\"otherPosition\" name=\"otherPosition\" placeholder=\"Other Position\" required>");
						$("#trackContainer").append("<label for=\"Fname\">Agreed upon training rate:</label><input type=\"number\" class=\"form-control\" id=\"startingRate\" name=\"startingRate\" placeholder=\"Enter Rate\" required>");
						$("#trackContainer").show();
						break;
					default:
						$("#trackContainer").empty();
						$("#trackContainer").append("<label for=\"Fname\">Agreed upon training rate:</label><input type=\"text\" class=\"form-control\" id=\"startingRate\" name=\"startingRate\" placeholder=\"Enter Rate\" required><label>Do we need to send a training program offer letter through TalentReef?</label><div class=\"form-check\"><input class=\"form-check-input\" type=\"radio\" name=\"letterTR\" id=\"letterTRyes\" value=\"Yes\"><label class=\"form-check-label\" for=\"letterTRyes\">Yes</label></div><div class=\"form-check\"><input class=\"form-check-input\" type=\"radio\" name=\"letterTR\" id=\"letterTRno\" value=\"No\"><label class=\"form-check-label\" for=\"letterTRno\">No</label></div>");

						$("#trackContainer").show();
						break;
				}
			});

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
	
/* Submitting  */
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
			
		function sendData(){
			showLoading();
			var URL = $("#userForm").attr("action");
			$.ajax({
	                type: "POST",
	                url: "process/process.php",
	                data: $("#userForm").serializeArray(),
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
