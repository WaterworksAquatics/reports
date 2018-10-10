<?php 
	
	//Determines what type of question it is
	//Type 0 is Name Box
	//type 1 is Comment
	//type 2 is Comment w/ Staff
	//Type 3 is Yes or No
	//Type 4 is Yes or No W/ Comment
	
	for($i = 0; $i < count($questions); $i++){
		$counter = $type[$i];
			
		//Decides what type of question it is and it outputs it	
		
		//EX.: Type 2 is Yes or No
		
	//Type 0 is Name Box
		if($counter == 0){
			echo "<p><label>$questions[$i]</label>
				<br>
				<input type='text' name='answer[$i]' id='answer[$i]'></p>";
			}	//end of elseif
			
	//Type 1 is Comment
		elseif($counter == 1){
			echo "<p>
				<label>$questions[$i]</label><br />
				<textarea name='comments[$i]' id='comments[$i]' cols='50' rows='3'></textarea>
				</p>";
		}//end of elseif
			
	//Type 2 is Comment w/ Staff
		elseif($counter == 2){
			echo "<p><label>$questions[$i]</label><br />
					<textarea name='comments[$i]' id='comments[$i]' cols='50' rows='3'></textarea>
					<br>
					<label>Staff member(s) contacted: </label><input type='text' name='answer[$i]' id='answer[$i]' required>
				</p>";
		}//end of elseif
		
	//Type 3 is Yes or No
		elseif($counter == 3){	
			echo "<p><label>$questions[$i]</label>
					<br>
					<input type='radio' name='answer[$i]' id='answer[$i]' value='Yes'>Yes
					<br>
					<input type='radio' name='answer[$i] id='answer[$i]' value='No'>No
				</p>";	
		}//end of elseif
			
	//Type 4 is Yes or No W/ Comment
		elseif($counter == 4){	
			echo "<p><label>$questions[$i]</label>
				<br>
				<input type='radio' name='answer[$i]' id='answer[$i]' value='Yes'>Yes
				<br>
				<input type='radio'	name='answer[$i]' id='answer[$i]' value='No'>No
				<br>
				Comments:
				</br >
				<textarea name='comments[$i]' id='comments[$i]' cols='30' rows='2'></textarea>
				</p>";	
		}//end of elseif
			
	}//End of for
?>