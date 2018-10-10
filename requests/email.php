<?php 

	session_start();
	session_unset();

	$survey = "Email Account Request";
	$_SESSION['survey'] = $survey;
	$process = "send/email.php";
	$_SESSION['email'] = $email;
	
	$title = $survey;

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Forms/Reports - <?php echo $title ?></title>
		
		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/head.php"); ?><!-- Viewport, Styling, Scripts -->
		
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
		  
		<script>
			$(document).ready(function() {
				$(".datepicker").datepicker({
					dateFormat: 'MM d, yy ',
					minDate: 1
				});
			});			
		</script>
	</head>
	<body>
	
		<?php include ($_SERVER['DOCUMENT_ROOT']."/header.php"); ?> <!-- #header -->
		
		<div id="content"><!-- #content -->
			<h1><?php echo $title ?></h1>
			<hr>
			<form action="<?php echo $process; ?>" method="post">
			<fieldset>
				<div>
					<label>* = Required Field</label>
				</div>
				<div class="col">
					<p>
						<label class="q">*Your Name</label>
						<br>
						<input type="text" name="name" required/>
					</p>
					<p>
						<label class="q">*Your Email Address</label>
						<br>
						<input type="text" name="email" required/>
					</p>
					<p style="width:100%;" id="rType">
						<label class="q">*Request Type</label>
						<br>
						<input type="radio" name="type" value="Create" id="cre" required><label for="cre">Create</label></input>
						<input type="radio" name="type" value="Delete" id="del" required><label for="del">Delete</label></input>
						<input type="radio" name="type" value="Forward" id="for" required><label for="for">Forward</label></input>
					</p>
				</div>
				<div class="col">
					<p>
						<label class="q">*Employee's Full Name</label>
						<br>
						<input type="text" name="employee" required>
					</p>
					<p>
						<label class="q">*Employee's Email Address</label>
						<br>
						<input type="text" name="email1" id="email1" required/>@waterworksswim.com
					</p>					
					<p id="note">
						<label class="q" style="color:red;">NOTE:</label>
						<br>
						Please be aware that if the email address you are requesting is not available, it will be adjusted in order for your request to be completed.
					</p>
					<p id="forward">
						<label class="q">*Forward Until</label>
						<br>
						<input class="datepicker" name="forDate"/>
						<br><br>
						<label class="q">*Forward To (Separate Addresses w/ Commas)</label>
						<br>
						<textarea name="forTo" rows="3" style="width:85%"></textarea>
					</p>
				</div>
				<p>
					<label class="q" id="duedate">*Due Date</label>
					<br>
					<input class="datepicker" name="duedate" required/>
				</p>
				<p>
					<label class="q">Comments</label>
					<br>
					<textarea name="comments" rows="5"></textarea>
				</p>
			</fieldset>
			
			<?php include ($_SERVER['DOCUMENT_ROOT']."/include/recaptcha.php"); ?>
			
        </form>		
		</div>
		
		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/help.php"); ?>
		
		<?php include ($_SERVER['DOCUMENT_ROOT']."/footer.php"); ?><!-- #footer -->
		
		<script>
		
		$( function (){
			
			var note = $( "#note" );
			var forward = $( "#forward" );
			var forInput = $( "#forward input" );
			
			forward.hide();
			note.hide();
			
			$( "#rType" ).click( function(){
				
				forward.hide();
				forInput.prop('required', false);
				note.hide();
				
				
				if ( $( "#for" ).is( ":checked" ) ){
					
					forward.slideDown();
					forInput.prop('required', true);
					
				}
				else if ( $( "#cre" ).is( ":checked" ) ){
					
					note.slideDown();
					
				}
				else {
					
					forward.slideUp();
					note.slideUp();
					
				}
				
			});
			
		});
		
		</script>		
	</body>
</html>