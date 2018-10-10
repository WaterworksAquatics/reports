<?php 

	session_start();
	session_unset();

	$survey = "Email Account - Adjust";
	$_SESSION['survey'] = $survey;
	$process = "../it/email/adjust.php";
	$_SESSION['email'] = $email;
	
	$title = $survey;
	
	// Forwarded from original request
	$name = $_GET['name'];
	$type = $_GET['type'];
	$employee = $_GET['employee'];
	$email = $_GET['email'];
	$email1 = $_GET['email1'];
		$email1 = str_replace( "@waterworksswim.com", "", $email1 );
	
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
			$(".datepicker").datepicker();
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
					<div class="col">
						<p>
							<label class="q">*Requestor's Name</label>
							<br>
							<input type="text" name="name" value="<? echo "$name"; ?>" required readonly>
						</p>
						<p>
							<label class="q">*Requestor's Email Address</label>
							<br>
							<input type="text" name="email" value="<? echo "$email"; ?>" required readonly>
						</p>
						<p style="width:100%;" id="rType">
							<label class="q">*Request Type</label>
							<br>						
							<input type="radio" name="type" value="Create" id="cre" required checked="checked"><label for="cre">Create</label></input>
							<input type="radio" name="type" value="Delete" id="del" required disabled><label for="del">Delete</label></input>
							<input type="radio" name="type" value="Forward" id="for" required disabled><label for="for">Forward</label></input>
						</p>
					</div>
					<div class="col">
						<p>
							<label class="q">*Employee's Full Name</label>
							<br>
							<input type="text" name="employee" value="<? echo "$employee"; ?>" required readonly>
						</p>
						<p>
							<label class="q">*Employee's Email Address</label>
							<br>
							<input type="text" name="email1" id="email1" value="<? echo "$email1"; ?>" required/>@waterworksswim.com
						</p>
					</div>
				</fieldset>
				
				<?php include ($_SERVER['DOCUMENT_ROOT']."/include/recaptcha.php"); ?>
				
			</form>		
		</div>
		
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