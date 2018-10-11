<?php if($title != "Email Request"){
	?>
	<div class="g-recaptcha" data-sitekey="6LfW_wMTAAAAABBd6BsYzrxNyAqt3ogOrGtH20Lm" data-callback="capenable" data-expired-callback="capdisable"></div>
	<div><input id="submit" type='submit' name='Submit' value='Submit' disabled="disabled"></div>
<?php }
	else{ ?>
	<div style="clear: both; margin: 5px 0; float: right;" class="g-recaptcha" data-sitekey="6LfW_wMTAAAAABBd6BsYzrxNyAqt3ogOrGtH20Lm" data-callback="capenable" data-expired-callback="capdisable"></div>
	<div style="clear: both; margin: 5px 10px; float: right;">
		<input id="submit" class="submit" type="submit" value="Submit &raquo;" disabled="disabled"/>
	</div>
<?php }?>