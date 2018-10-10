<?php 
	
	session_start();
	session_unset();

	$survey = "Deck Guard Manager Evaluation Report";
	$_SESSION['survey'] = $survey;
	$_SESSION['email'] = $email;
	$title = $survey;
	$process = "send_deck_guard.php";
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $title; ?></title>
		
		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/head.php"); ?><!-- Viewport, Styling, Scripts -->
		
		<style>
		
			table.eval{
				width: 50%;
				border-collapse: collapse;
				text-align: center;
			}
			
				table.eval td, table.standards td{
					border: 1px solid;
					width: 60px;
					height: 35px;
					padding: 5px 0;
				}
				
				table.eval tr:first-child td{
					border:none;
					vertical-align: bottom;
					height: 20px;
				}
				
					table.eval tr td:nth-child(3n+3) {
						border:none;
						text-align: left;
						padding-left: 10px;
						width: auto;
					}
					
			table.standards{
				border-collapse: collapse;
				text-align: center;
				margin: 0 auto;
				width: 95%;
			}
			
				table.standards tr:first-child td,
				table.standards tr:nth-child(2) td,
				table.standards tr td:first-child,
				table.standards tr td:nth-child(6){
					border: none;
				}
				
				table.standards tr td:first-child,
				table.standards tr td:nth-child(6){
					width: 30%;
				}
				
				table.standards input[type=text],
				div.col input[type=text],
				div.col input{
					outline: 0;
					border: none;
					border-bottom: 1px solid;
				}
				
				table.standards input[type=text]:focus,
				div.col input[type=text]:focus,
				div.col input:focus{
					border-bottom: 2px solid;
					border-color: rgb(136, 177, 212);
					background: rgb(234, 234, 234);
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
	<head>
	<body>
	
		<?php include ($_SERVER['DOCUMENT_ROOT']."/header.php"); ?><!-- #header -->
		
		<div id="content"><!-- #content -->
			<h1><?php echo $title; ?></h1>
			<hr>
			<form action="<?php echo $process; ?>" method="post">
			<fieldset class="row1">
				<div>
					<label>* = Required Field</label>
				</div>
				<div class="col">
					<p>
						<label>*Name</label>
						<br>
						<input type="text" name="name" required/>
					</p>
					<p>
						<label>*Email Address</label>
						<br>
						<input type="text" name="email2" required/>
					</p>

					<?php include "../office/include/locations.php"; ?>

				</div>
				<div class="col">
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
					<p>
						<label>*Deck Guard Name</label>
						<br>
						<input type="text" name="guard" required/>
					</p>
				</div>
			</fieldset>
			<fieldset>
				<legend>
					Please review the following and check the appropriate box
				</legend>
				<table class="eval">
					<tr>
						<td>
							<label>
								Yes
							</label>
						</td>
						<td>
							<label>
								No
							</label>
						</td>
						<td>
							<!-- leave blank -->
						</td>
					</tr>
					<tr>
						<td>
							<input type="radio" name="uniform" value="Yes" required>
						</td>
						<td>
							<input type="radio" name="uniform" value="No">
						</td>
						<td>
							<label>
								Appropiate Uniform
								<br>
								(Shirt, Whistle, Name Tag, Shorts, etc.)
							</label>
						</td>
					</tr>
					<tr>
						<td>
							<input type="radio" name="enforce" value="Yes" required>
						</td>
						<td>
							<input type="radio" name="enforce" value="No">
						</td>
						<td>
							<label>
								Enforcing the rules of the play area
							</label>
						</td>
					</tr>
					<tr>
						<td>
							<input type="radio" name="roaming" value="Yes" required>
						</td>
						<td>
							<input type="radio" name="roaming" value="No">
						</td>
						<td>
							<label>
								Standing up and walking around every 5 minutes
							</label>
						</td>
					</tr>
					<tr>
						<td>
							<input type="radio" name="active" value="Yes" required>
						</td>
						<td>
							<input type="radio" name="active" value="No">
						</td>
						<td>
							<label>
								Active and continuous scanning
								<br>
								(No fixating)
							</label>
						</td>
					</tr>
					<tr>
						<td>
							<input type="radio" name="scanning" value="Yes" required>
						</td>
						<td>
							<input type="radio" name="scanning" value="No">
						</td>
						<td>
							<label>
								Scanning all areas of the play area
							</label>
						</td>
					</tr>
					<tr>
						<td>
							<input type="radio" name="posture" value="Yes" required>
						</td>
						<td>
							<input type="radio" name="posture" value="No">
						</td>
						<td>
							<label>
								Appropriate Posture
							</label>
						</td>
					</tr>
					<tr>
						<td>
							<input type="radio" name="body" value="Yes" required>
						</td>
						<td>
							<input type="radio" name="body" value="No">
						</td>
						<td>
							<label>
								Appropiate Body Language
							</label>
						</td>
					</tr>
					<tr>
						<td>
							<input type="radio" name="shoes" value="Yes" required>
						</td>
						<td>
							<input type="radio" name="shoes" value="No">
						</td>
						<td>
							<label>
								Managing the organization of shoes and objects on the pool deck
							</label>
						</td>
					</tr>
				</table>
				<br>
				<table class="standards">
					<tr>
						<td>
							<h3>
								Criteria
							</h3>
						</td>
						<td colspan="4">
							<h3>
								Rating
							</h3>
						</td>
						<td>
							<h3>
								Comments
							</h3>
						</td>
					</tr>
					<tr>
						<td>
							<!-- Leave blank -->
						</td>
						<td>
							<label>
								N/A
							</label>
						</td>
						<td>
							<label>
								Below
								<br>
								Standard
							</label>
						</td>
						<td>
							<label>
								Meets
								<br>
								Standard
							</label>
						</td>
						<td>
							<label>
								Exceeds
								<br>
								Standards
							</label>
						</td>
						<td>
							<!-- Leave Blank -->
						</td>
					</tr>
					<tr>
						<td>
							Rule Enforcement
							<br>
							Preventative
						</td>
						<td>
							<input type="radio" name="prevent" value="N/A">
						</td>
						<td>
							<input type="radio" name="prevent" value="Below Standard">
						</td>
						<td>
							<input type="radio" name="prevent" value="Meets Standard">
						</td>
						<td>
							<input type="radio" name="prevent" value="Exceeds Standard">
						</td>
						<td>
							<input type="text" name="prevent_com">
						</td>
					</tr>
					<tr>
						<td>
							Rule Enforcement
							<br>
							Attitude
						</td>
						<td>
							<input type="radio" name="attitude" value="N/A" required>
						</td>
						<td>
							<input type="radio" name="attitude" value="Below Standard">
						</td>
						<td>
							<input type="radio" name="attitude" value="Meets Standard">
						</td>
						<td>
							<input type="radio" name="attitude" value="Exceeds Standard">
						</td>
						<td>
							<input type="text" name="attitude_com">
						</td>
					</tr>
					<tr>
						<td>
							Rule Enforcement
							<br>
							Judgement
						</td>
						<td>
							<input type="radio" name="judge" value="N/A" required>
						</td>
						<td>
							<input type="radio" name="judge" value="Below Standard">
						</td>
						<td>
							<input type="radio" name="judge" value="Meets Standard">
						</td>
						<td>
							<input type="radio" name="judge" value="Exceeds Standard">
						</td>
						<td>
							<input type="text" name="judge_com">
						</td>
					</tr>
					<tr>
						<td>
							Rule Enforcement
							<br>
							Understanding
						</td>
						<td>
							<input type="radio" name="understand" value="N/A" required>
						</td>
						<td>
							<input type="radio" name="understand" value="Below Standard">
						</td>
						<td>
							<input type="radio" name="understand" value="Meets Standard">
						</td>
						<td>
							<input type="radio" name="understand" value="Exceeds Standard">
						</td>
						<td>
							<input type="text" name="understand_com">
						</td>
					</tr>
					<tr>
						<td>
							Eye Contact w/
							<br>
							Play Area
						</td>
						<td>
							<input type="radio" name="play" value="N/A" required>
						</td>
						<td>
							<input type="radio" name="play" value="Below Standard">
						</td>
						<td>
							<input type="radio" name="play" value="Meets Standard">
						</td>
						<td>
							<input type="radio" name="play" value="Exceeds Standard">
						</td>
						<td>
							<input type="text" name="play_com">
						</td>
					</tr>
				</table>
				<br>
				<label>
					Immediate Corrective Action Given (if any)
				</label>
				<p>					
					<textarea name="correct" rows="5"></textarea>
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