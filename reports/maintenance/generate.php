<?php

     $_SESSION["questions"] = $questions;

     for( $i = 0; $i < count( $questions ); $i++ ){

          $question[$i] = $questions[$i][0];
          $type = $questions[$i][1];
          $_SESSION['type'] = $type;

          // Custom: Create div column
          switch ( $loc ){

               case "irv":
                    switch ( $i ){
                         case 1: case 11: case 21: case 31:
                         case 47: case 54: case 61: case 68:
                              echo "<div class='col'>";
                         break;
                    }
               break;
               case "hb":
                    switch ( $i ){
                         case 1: case 10: case 21: case 25:
                              echo "<div class='col'>";
                         break;
                    }
               break;
               case "bh":
               break;
               default:
                    switch ( $i ){
                         case 1: case 11: case 27: case 34:
                              echo "<div class='col'>";
                         break;
                    }

          }

          switch ( $type ){

               // If $type = 0, 1, or 2, show as <h#>
               case 0:
                    echo "<h2>$question[$i]</h2>";
               break;
               case 1:
                    echo "<h3>$question[$i]</h3>";
               break;
               case 2:
                    echo "<h4>$question[$i]</h4>";
               break;
               default:
                    // Else show question
                    echo "<p><label class='q'>$question[$i]</label><br>";

                    // Show Question Type
                    switch ( $type ){
                         // Text
                         case 3:
                              echo "<input type='text' name='answer[$i]' required>";
                         break;
                         // Number
                         case 4;
                              echo "<input type='number' step='0.01' name='answer[$i]' required>";
                         break;
                         // Radio 1-5
                         case 5;
                              echo "<input type='radio' name='answer[$i]' id='answer[$i]a' value='1'><label for='answer[$i]a' required>1</label> |
                                        <input type='radio' name='answer[$i]' id='answer[$i]b' value='2'><label for='answer[$i]b'>2</label> |
                                        <input type='radio' name='answer[$i]' id='answer[$i]c' value='3'><label for='answer[$i]c'>3</label> |
                                        <input type='radio' name='answer[$i]' id='answer[$i]d' value='4'><label for='answer[$i]d'>4</label> |
                                        <input type='radio' name='answer[$i]' id='answer[$i]e' value='5'><label for='answer[$i]e'>5</label>";
                         break;
                         // Radio 1-10
                         case 6;
                              echo "<input type='radio' name='answer[$i]' id='answer[$i]a' value='1'><label for='answer[$i]a' required>1</label> |
                                        <input type='radio' name='answer[$i]' id='answer[$i]b' value='2'><label for='answer[$i]b'>2</label> |
                                        <input type='radio' name='answer[$i]' id='answer[$i]c' value='3'><label for='answer[$i]c'>3</label> |
                                        <input type='radio' name='answer[$i]' id='answer[$i]d' value='4'><label for='answer[$i]d'>4</label> |
                                        <input type='radio' name='answer[$i]' id='answer[$i]e' value='5'><label for='answer[$i]e'>5</label> |
                                        <input type='radio' name='answer[$i]' id='answer[$i]f' value='6'><label for='answer[$i]f'>6</label> |
                                        <input type='radio' name='answer[$i]' id='answer[$i]g' value='7'><label for='answer[$i]g'>7</label> |
                                        <input type='radio' name='answer[$i]' id='answer[$i]h' value='8'><label for='answer[$i]h'>8</label> |
                                        <input type='radio' name='answer[$i]' id='answer[$i]i' value='9'><label for='answer[$i]i'>9</label> |
                                        <input type='radio' name='answer[$i]' id='answer[$i]j' value='10'><label for='answer[$i]j'>10</label>";
                         break;
                         // Comment
                         case 7;
                              echo "<textarea name='comments[$i]' cols='50' rows='3'></textarea>";
                         break;
                         // Comment - Required
                         case 8;
                              echo "<textarea name='comments[$i]' cols='50' rows='3' required></textarea>";
                         break;
                         // Checkbox - "Good to Go"
                         case 9;
                              echo "<input type='checkbox' name='answer[$i]' id='answer[$i]' value='Good To Go'><label for='answer[$i]'>Good To Go</label>
                                        <br>
                                        <label>Comments</label>
                                        <br>
                                        <textarea name='comments[$i]' id='comments[$i]' cols='75' rows='3'></textarea>";
                         break;

                    }
                    echo "</p>";

          }

          // Custom: Close div column
          switch ( $loc ){

               case "irv":
                    switch ( $i ){
                         case 10: case 20: case 30: case 40: case 53: case 60: case 67: case 74:
                              echo "</div>";
                         break;
                    }
               break;
               case "hb":
                    switch ( $i ){
                         case 9: case 18: case 24: case 30:
                              echo "</div>";
                         break;
                    }
               break;
               case "bh":
               break;
               default:
                    switch ( $i ){

                         case 10: case 20: case 30: case 40:
                              echo "</div>";
                         break;

                    }

          }

     }

?>
