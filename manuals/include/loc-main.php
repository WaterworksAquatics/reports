<p>
	<label class="q">*Location</label>
	<br>
	<select id="region" name="region" required>
		<option data-region="default" id="default" value="">Select a Region</option> 
		<option data-region="OC">Orange County</option> 
		<option data-region="SDC">San Diego County</option> 
		<option data-region="LAC">Los Angeles County</option>
		<option data-region="SGV">San Gabriel Valley</option>
		<option data-region="SV">Silicon Valley</option>
		<option data-region="DVR">Denver</option>
	</select>
<?
	if( $title == "View Recipients (Office)" ){
?>
		<select id="location" name="location" onchange='this.form.submit();' required>
<? 
	} 
	else {
?>
			<select id="location" name="location" required>
<?
	}
 ?>
		<option value="" disabled selected>Select a Location</option>
		<!-- Orange County -->
		<option class="OC" value="Huntington Beach">Huntington Beach</option>
		<option class="OC" value="Irvine">Irvine</option>
		<!-- San Diego County -->
		<option class="SDC" value="Carlsbad">Carlsbad</option>
		<!-- Los Angeles County -->
		<option class="LAC" value="Beverly Hills">Beverly Hills</option>
		<!-- San Gabriel Valley -->
		<option class="SGV" value="Pasadena">Pasadena</option>
		<option class="SGV" value="Sierra Madre">Sierra Madre</option>
		<!-- Silicon Valley -->
		<option class="SV" value="San Jose">San Jose</option>>
		<!-- Denver -->
		<option class="DVR" value="Highlands Ranch">Highlands Ranch</option>
	</select>
</p>