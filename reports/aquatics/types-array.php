<?php

	//Determines what type of question it is
	//Type 0  - Name Box
	//Type 1  - Y/N w/ Comment
	//Type 2  - # Answer (1 - 10)
	//Type 3  - Day of Week
	//type 4  - Comment
	//Type 5  - Thinking About It
	//Type 6  - Lesson Type
	//Type 7  - Y/N/Sometimes
	//Type 8  - Y/N w/o Comment
	//Type 9  - Phone
	//Type 10 - Time of Day
	//Type 11 - Echo Question
	//Type 12 - Indented N/A, Y or No radio
	//Type 13 - Indented Comment
	//Type 14  - # Answer (1 - 5)

	for( $i = 0; $i < count( $questions ); $i++ ){

		$question[$i] = $questions[$i][0];
		$type = $questions[$i][1];
		$_SESSION['type'] = $type;

		switch ( $type ) {
			case 12: case 13:
				echo "<div class='indent'>";
			break;
		}

		// Auto Add opening <p> tag and question
		echo "<p><label class='q'>$question[$i]</label><br>";

		// Add question input
		switch ( $type ){

			// If $type = 0, 1, or 2, show as <h#>
			case 0:
				echo "<input type='text' name='answer[$i]'>";
			break;
			case 1:
				echo "<input type='radio' name='answer[$i]' id='answer[$i]a' value='Yes'><label for='answer[$i]a'>Yes</label><br>
					  <input type='radio' name='answer[$i]' id='answer[$i]b' value='No'><label for='answer[$i]b'>No</label><br>
					  <label>Comments:</label><br>
					  <textarea name='comments[$i]' id='comments[$i]' cols='30' rows='2'></textarea>";
			break;
			case 2:
				echo "<input type='radio' name='answer[$i]' id='answer[$i]a' value='1'><label for=\"answer[$i]a\">1</label> |
					  <input type='radio' name='answer[$i]' id='answer[$i]b' value='2'><label for=\"answer[$i]b\">2</label> |
					  <input type='radio' name='answer[$i]' id='answer[$i]c' value='3'><label for=\"answer[$i]c\">3</label> |
					  <input type='radio' name='answer[$i]' id='answer[$i]d' value='4'><label for=\"answer[$i]d\">4</label> |
					  <input type='radio' name='answer[$i]' id='answer[$i]e' value='5'><label for=\"answer[$i]e\">5</label> |
					  <input type='radio' name='answer[$i]' id='answer[$i]f' value='6'><label for=\"answer[$i]f\">6</label> |
					  <input type='radio' name='answer[$i]' id='answer[$i]g' value='7'><label for=\"answer[$i]g\">7</label> |
					  <input type='radio' name='answer[$i]' id='answer[$i]h' value='8'><label for=\"answer[$i]h\">8</label> |
					  <input type='radio' name='answer[$i]' id='answer[$i]i' value='9'><label for=\"answer[$i]i\">9</label> |
					  <input type='radio' name='answer[$i]' id='answer[$i]j' value='10'><label for=\"answer[$i]j\">10</label>
					  <br>
					  <label>Comments</label>
					  <br>
					  <textarea name='comments[$i]' cols='75' rows='3'></textarea>";
			break;
			case 3:
				echo "<input type='checkbox' name='days[]' id='answer[$i}a' value='Monday'><label for='answer[$i]a'>Monday</label><br>
					  <input type='checkbox' name='days[]' id='answer[$i]b' value='Tuesday'><label for='answer[$i]b'>Tuesday</label><br>
					  <input type='checkbox' name='days[]' id='answer[$i]c' value='Wednesday'><label for='answer[$i]c'>Wednesday</label><br>
					  <input type='checkbox' name='days[]' id='answer[$i]d' value='Thursday'><label for='answer[$i]d'>Thursday</label><br>
					  <input type='checkbox' name='days[]' id='answer[$i]e' value='Friday'><label for='answer[$i]e'>Friday</label><br>
					  <input type='checkbox' name='days[]' id='answer[$i]f' value='Saturday'><label for='answer[$i]f'>Saturday</label><br>
					  <input type='checkbox' name='days[]' id='answer[$i]g' value='Sunday'><label for='answer[$i]g'>Sunday</label>";
			break;
			case 4:
				echo "<label>Comments</label><br>
					  <textarea name='comments[$i]' cols='75' rows='3'></textarea>";
			break;
			case 5:
				echo "<input type='checkbox' name='answer[$i]' id='answer[$i]a' value='Yes'><label for='answer[$i]a'>Yes</label><br>
					  <input type='checkbox' name='answer[$i]' id='answer[$i]b' value='Thinking about it'><label for='answer[$i]b'>Thinking about it</label><br>
					  <input type='checkbox' name='answer[$i]' id='answer[$i]c' value='No'><label for='answer[$i]c'>No</label>";
			break;
			case 6:
				echo "<input type='checkbox' name='answer[$i]' id='answer[$i]a' value='Beginner'><label for='answer[$i]a'>Beginner</label><br>
					  <input type='checkbox' name='answer[$i]' id='answer[$i]b' value='Intermediate'><label for='answer[$i]b'>Intermediate</label><br>
					  <input type='checkbox' name='answer[$i]' id='answer[$i]c' value='Advanced'><label for='answer[$i]c'>Advanced</label>";
			break;
			case 7:
				echo "<input type='checkbox' name='answer[$i]' id='answer[$i]a' value='Yes'><label for='answer[$i}a'>Yes</label><br>
					  <input type='checkbox' name='answer[$i]' id='answer[$i]b' value='Sometimes'><label for='answer[$i}b'>Sometimes</label><br><input type='checkbox' name='answer[$i]' id='answer[$i]c' value='Never'><<label for='answer[$i}c'>Never</label>";
			break;
			case 8:
				echo "<input type='radio' name='answer[$i]' id='answer[$i]a' value='Yes'><label for='answer[$i}a'>Yes</label><br>
					  <input type='radio' name='answer[$i]' id='answer[$i]b' value='No'><label for='answer[$i}b'>No</label>";
			break;
			case 9:
				echo "<input type='text' name='answer[$i]'>";
			break;
			case 10:
				echo "<input type='checkbox' name='answer[$i]' id='answer[$i]a' value='Morning'>Morning<br>
					  <input type='checkbox' name='answer[$i]' id='answer[$i]b' value='Afternoon'>Afternoon<br>
					  <input type='checkbox' name='answer[$i]' id='answer[$i]c' value='Evening'>Evening";
			break;
			case 11:
				echo "";
			break;
			case 12:
				echo "<input type='radio' name='answer[$i]' id='answer[$i]a' value='N/A'><label for='answer[$i]a'>N/A</label><br>
					<input type='radio' name='answer[$i]' id='answer[$i]b' value='Yes'><label for='answer[$i]b'>Yes</label><br>
					<input type='radio' name='answer[$i]' id='answer[$i]c' value='No'><label for='answer[$i]c'>No</label>";
			break;
			case 13:
				echo "<input type='radio' name='answer[$i]' id='answer[$i]a' value='1'><label for=\"answer[$i]a\">1</label> |
					  <input type='radio' name='answer[$i]' id='answer[$i]b' value='2'><label for=\"answer[$i]b\">2</label> |
					  <input type='radio' name='answer[$i]' id='answer[$i]c' value='3'><label for=\"answer[$i]c\">3</label> |
					  <input type='radio' name='answer[$i]' id='answer[$i]d' value='4'><label for=\"answer[$i]d\">4</label> |
					  <input type='radio' name='answer[$i]' id='answer[$i]e' value='5'><label for=\"answer[$i]e\">5</label>
					  <br>
					  <label>Comments</label>
					  <br>
					  <textarea name='comments[$i]' id='comments[$i]' cols='75' rows='3'></textarea>";
			break;
			case 14:
				echo "<input type='date' name='answer[$i]'>";
			break;

		}

		// Auto add closing </p> tag
		echo "</p>";

		switch ( $type ) {
			case 12: case 13:
				echo "</div>";
			break;
		}

	}


?>
