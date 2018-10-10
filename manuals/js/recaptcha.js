/* ReCAPTCHA disable */

			function capenable() {
				$('#submit').prop('disabled', false);
				$("#default").removeAttr('selected');
			}
			
			function capdisable() {
				$('#submit').prop('disabled', true);
				$("#default").attr('selected','selected');
				$('option.remove').hide();//reset every thing 
				$('#location').hide();//reset every thing 
			}
			
			document.addEventListener('domready', function(){
				capdisable();
			});	
	
	
/* Submitting  */

			
			$('input#submit').click(function(){
				function Data(e) {
						
					$(this).removeAttr("value").attr("value", "Submitting...").addClass("sending");							
					
				}
			});