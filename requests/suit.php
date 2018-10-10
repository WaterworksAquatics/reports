<?php 

	session_start();
	session_unset();

	$survey = "New Suit Request";
	$_SESSION['survey'] = $survey;
	$process = "send/suit.php";
	$_SESSION['email'] = $email;
	
	$title = $survey;
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Forms/Reports - <?php echo $title ?></title>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/head.php"); ?><!-- Viewport, Styling, Scripts -->
		
	</head>
	<body>
	
		<?php include ($_SERVER['DOCUMENT_ROOT']."/header.php"); ?> <!-- #header -->
		
		<div id="content"><!-- #content -->
			<h1><?php echo $title ?></h1>
			<hr>
			<form action="<?php echo $process; ?>" method="post" autocomplete="off">
				<fieldset>
					<div>
						<label>* = Required Field</label>
					</div>
					<div class="col">
						<p>
							<label>*First Name</label>
							<br>
							<input type="text" name="first" required/>
						</p>
						<p>
							<label>*Last Name</label>
							<br>
							<input type="text" name="last" required/>
						</p>
						<p>
							<label>*Email Address</label>
							<br>
							<input type="text" name="email" required/>
						</p>
					</div>
					<div class="col">
					
						<?php include "../reports/aquatics/include/locations.php"; ?>
						
						<p>
							<label>*Reason</label>
							<br>
							<input type="text" name="reason" required></input>
						</p>
						<div class="col">
							<p id="gender">
								<label>*Gender</label>
								<br>
								<input type="radio" name="gender" value="Male" id="male" required><label for="male">Male</label></input>
								<input type="radio" name="gender" value="Female" id="female"><label for="female">Female</label></input>
							</p>
						</div>
						<div class="col">
							<div class="col wide">
								<p id="size">
									<label for="size">*Size</label>
									<br>
									<select class="male">
										<option></option>
										<option value="Small">Small</option>
										<option value="Medium">Medium</option>
										<option value="Large">Large</option>
										<option value="X Large">X Large</option>
										<option value="XX Large">XX Large</option>
									</select>
									<select class="female">
										<option></option>
										<option value="26">26</option>
										<option value="28">28</option>
										<option value="30">30</option>
										<option value="32">32</option>
										<option value="34">34</option>
										<option value="36">36</option>
										<option value="38">38</option>
										<option value="40">40</option>
										<option value="42">42</option>
										<option value="44">44</option>
									</select>
								</p>
							</div>
							<div class="col wide">
								<p id="type">
									<label for="type" class="female">*Type</label>
									<br>
									<select name="type" class="female">
										<option></option>
										<option value="Thin Strap">Thin Strap</option>
										<option value="Wide Strap">Wide Strap</option>
										<option value="No Preference">No Preference</option>
									</select>
								</p>
							</div>
						</div>
					</div>				
					<p style="text-align: center;">
						<button type="button" id="sizechart">Size Chart</button>
					</p>
					<div id="chart">
						<table class="male">
							<tr>
								<td>Trunk Size</td>
								<td>Small</td>
								<td>Medium</td>
								<td>Large</td>
								<td>X Large</td>
								<td>XX Large</td>
							<tr>
							<tr>
								<td>Waist</td>
								<td>30 - 31.5</td>
								<td>32 - 34</td>
								<td>34.5 - 36</td>
								<td>36.5 - 38.5</td>
								<td>39 - 41</td>
							</tr>
						</table>
						<table class="female">
							<tr>
								<td>Suit Size</td>
								<td>26</td>
								<td>28</td>
								<td>30</td>
								<td>32</td>
								<td>34</td>
								<td>36</td>
								<td>38</td>
								<td>40</td>
								<td>42</td>
								<td>44</td>
							<tr>
							<tr>
								<td>Bust</td>
								<td>31</td>
								<td>32</td>
								<td>33</td>
								<td>34</td>
								<td>35</td>
								<td>36</td>
								<td>37.5</td>
								<td>39</td>
								<td>40.5</td>
								<td>42.5</td>
							</tr>
							<tr>
								<td>Waist</td>
								<td>23</td>
								<td>24</td>
								<td>25</td>
								<td>26</td>
								<td>27</td>
								<td>28</td>
								<td>29.5</td>
								<td>31</td>
								<td>32.5</td>
								<td>34.5</td>
							</tr>
							<tr>
								<td>Hip</td>
								<td>33.5</td>
								<td>34.5</td>
								<td>35.5</td>
								<td>36.5</td>
								<td>37.5</td>
								<td>38.5</td>
								<td>40</td>
								<td>41.5</td>
								<td>43</td>
								<td>45</td>
							</tr>
							<tr>
								<td>Torso</td>
								<td>54.5</td>
								<td>56</td>
								<td>57.5</td>
								<td>59</td>
								<td>60.5</td>
								<td>62</td>
								<td>63.5</td>
								<td>65</td>
								<td>66.5</td>
								<td>68</td>
							</tr>
						</table>
					</div>
				</fieldset>
				<fieldset>
					<legend>Acknowledgement</legend>
					<div id="ack">
						<p>
							<input type="checkbox" id="acknowledge">
						</p>
						<p>
							I understand that this suit request does not guarantee that I will receive the exact type of suit that I am requesting. The Employee Experience Team will fill the request on a first-come, first-served basis and within the limitations of our inventory.
						</p>
					</div>
				</fieldset>
			
			<?php include ($_SERVER['DOCUMENT_ROOT']."/include/recaptcha.php"); ?>
			
			</form>		
		</div>
		
		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/help.php"); ?>
		
		<?php include ($_SERVER['DOCUMENT_ROOT']."/footer.php"); ?><!-- #footer -->
		
		<script>
			//M v. F sizes			
			$('#gender').change(function(){
				
				$('#chart').hide();
				$('#size, #sizechart').show();
				
				if($('#male').is(':checked')){
					$('.female').hide();
					$('.male').show();
					$('select.male').attr('required', true).attr('name', 'size');
					$('select.female').removeAttr('required name');
				}
				else if($('#female').is(':checked')){
					$('.male').hide();
					$('.female').show();
					$('select.female').eq(0).attr('name', 'size').attr('required', true);
					$('select.female').eq(1).attr('name', 'type').attr('required', true);
					$('#type').show();
					$('select.male').removeAttr('required name');
				}
			});
			
			//Size Chart				
			$('button#sizechart').click(function(){
				$('#chart').slideToggle(300);
			});
		
			//Disable submit until acknowledge selected
			$("input[type=submit]").attr('disabled', 'disabled').addClass('disabled');
			
			$("#acknowledge").change(function(){
				if($(this).is(':checked')){
					$("input[type=submit]").removeAttr('disabled class')
				}
				else{
					$("input[type=submit]").attr('disabled', 'disabled').addClass('disabled');
				}
			});
					
		</script>
	</body>
</html>