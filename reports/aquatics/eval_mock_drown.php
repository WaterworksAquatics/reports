<?php 
	
	session_start();
	session_unset();

	$survey = "Mock Drowning Evaluation";
	$_SESSION['survey'] = $survey;
	$_SESSION['email'] = $email;
	$title = $survey;
	$process = "send_mock_drown.php";
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $title; ?></title>
		
		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/head.php"); ?><!-- Viewport, Styling, Scripts -->
		
		<style>
		
			div.col input[type=text],
			div.col input{
				outline: 0;
				border: none;
				border-bottom: 1px solid;
			}
			
			div.col input[type=text]:focus,
			div.col input:focus{
				border-bottom: 2px solid;
				border-color: rgb(136, 177, 212);
				background: rgb(234, 234, 234);
				font-weight: bold;
			}
			
			div.col input[type=text]:focus label{
				color: blue;
			}
					
			@media screen and (max-width: 800px) {
				table.eval{
					width: 100%;
				}
			}
			
		</style>
		
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
		  
		<script>
			$(document).ready(function() {
				$("#datepicker").datepicker();
			});
		</script>
		
	</head>
	<body>
	
		<?php include ($_SERVER['DOCUMENT_ROOT']."/header.php"); ?><!-- #header -->
		
		<div id="content"><!-- #content -->
			<h1><?php echo $title; ?></h1>
			<hr>
			<form action="<?php echo $process; ?>" method="post">
				<fieldset>
					<div>
						<label>* = Required Field</label>
					</div>
					<div class="col">
						<p>
							<label>*Evaluating Manager</label>
							<br>
							<input type="text" name="name" required/>
						</p>
						<p>
							<label>*Email Address</label>
							<br>
							<input type="text" name="email" required/>
						</p>

						<?php include "../office/include/locations.php"; ?>
						
						<p>
							<label>*Date</label>
							<br>
							<input type="text" id="datepicker" name="date1" required/>
						</p>
						<p>
							<label>*Time</label>
							<br>
							<input type="text" name="time1" required/>
						</p>
					</div>
					<div class="col">
						<p>
							<label>*Deck Guard Name</label>
							<br>
							<input type="text" name="guard" required/>
						</p>
						<p>
							<label>*Type of Drowning</label>
							<br>
							<select name="type" required/>
								<option></option>
								<option value="Active">Active(Yellow)</option>
								<option value="Passive">Passive(Red)</option>
								<option value="Blind">Blind(Blue)</option>
							</select>
						</p>
						<p>
							<label>*Location in Pool</label>
							<br>
							<input type="text" name="pool_loc" required/>
						</p>
						<p>
							<label>*Volunteering Child</label>
							<br>
							<input type="text" name="volunteer" required/>
						</p>
						<p>
							<label>*Parent/Guardian</label>
							<br>
							<input type="text" name="parent" required/>
						</p>
					</div>
				</fieldset>
				<fieldset>
					<legend>Reaction to Scenario</legend>
					<div class="col">
						<p>
							<label>*How long did it take for the Deck Guard to <u><i>spot</i></u> the victim?</label>
							<br>
							<input type="text" name="spot" style="width:50px; text-align: center;" required/> seconds
						</p>
					</div>
					<div class="col">
						<p>
							<label>*How long did it take for the Deck Guard to <u><i>reach</i></u> the victim?</label>
							<br>
							<input type="text" name="reach" style="width:50px; text-align: center;" required/> seconds
						</p>
					</div>
					<p>
						<label>
							*What could have been done to reach the victim quicker?
						</label>
						<br>
						<textarea name="quicker" rows="5" required></textarea>
					</p>
					<div class="col">
						<p>
							<label>*Did the Deck Guard use proper whistle communication?</label>
							<br>
							<input type="radio" name="whistle" value="Yes" required>Yes
							<br>
							<input type="radio" name="whistle" value="No">No
						</p>
					</div>
					<p id="whistle">
						<label>
							If not, what did they not do correctly?
						</label>
						<br>
						<textarea name="correct" rows="5"></textarea>
					</p>
				</fieldset>
				<fieldset>
					<legend>
						Actions Taken
					</legend>
					<p>
						<label>
							What step(s) were missed in their rescue procedure(if any)?
						</label>
						<br>
						<textarea name="missed" rows="5"></textarea>
					</p>
				</fieldset>
				<fieldset>
					<legend>
						Comments
					</legend>
					<p>
						<textarea name="comments" rows="5"></textarea>
					</p>
				</fieldset>

				<?php include ($_SERVER['DOCUMENT_ROOT']."/include/recaptcha.php"); ?>

			</form>
		</div>
		
		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/help.php"); ?>
		
		<?php include ($_SERVER['DOCUMENT_ROOT']."/footer.php"); ?><!-- #footer -->
		
	</body>
</html>