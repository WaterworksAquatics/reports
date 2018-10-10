<?php

     $_SESSION['location'] = "Huntington Beach";

     // Determines what type of question it is
     // Type 0 is H2
     // Type 1 is H3
     // Type 2 is H4
     // Type 3 is Text
     // Type 4 is Number
     // Type 5 is Radio 1-5
     // Type 6 is Radio 1-10
     // Type 7 is Comment
     // Type 8 is Comment - Required
     // Type 9 is Good to Go w/ comment

     $questions = array(
                    /** array( "Question", type ) **/
                    array( "List of Pump Room Issues", 0 ),
                    array( "Small Pool", 1 ),
                    array( "Chemical Levels on BECSys Controller", 2 ),
                    array( "pH", 4 ),
                    array( "CL2 PPM", 4 ),
                    array( "Test Kit Readings", 2 ),
                    array( "pH, Ideal: 7.50<br>Acceptable Range: 7.2-7.8", 4 ),
                    array( "Free Cl2, Ideal: 2.0<br>Acceptable Range: 1.0-4.0", 4 ),
                    array( "Total Cl (no more than 0.4 above free chlorine)", 4 ),
                    array( "Alkalinity, Ideal: 100<br>Acceptable Range: 80-120", 4 ),
                    array( "Big Pool", 1 ),
                    array( "Chemical Levels on BECSys Controller", 2 ),
                    array( "pH", 4 ),
                    array( "CL2 PPM", 4 ),
                    array( "Test Kit Readings", 2 ),
                    array( "pH, Ideal: 7.50<br>Acceptable Range: 7.2-7.8)", 4 ),
                    array( "Free Cl2, Ideal: 2.0<br>Acceptable Range: 1.0-4.0", 4 ),
                    array( "Total Cl (no more than 0.4 above free chlorine)", 4 ),
                    array( "Alkalinity, Ideal: 100<br>Acceptable Range: 80-120", 4 ),
                    array( "What steps were taken on the BECSys Controller?<br>(calibrate pH to 7.4, calibrate Cl2 to 2.4, reset failsafe, etc.)", 7 ),
                    array( "Pump Room Walkthrough", 0 ),
                    array( "Small Pool", 1 ),
                    array( "Filters Pressure", 4 ),
                    array( "Heater Temperatures", 4 ),
                    array( "Heater Set Points", 4 ),
                    array( "Big Pool", 1 ),
                    array( "Filters #1 Pressure", 4 ),
                    array( "Filters #2 Pressure", 4 ),
                    array( "Filters #3 Pressure", 4 ),
                    array( "Heater Temperatures", 4 ),
                    array( "Heater Set Points", 4 ),
                    array( "Chlorine Drum Level", 3 ),
                    array( "Acid Tank/Drum Level", 3 ),
                    array( "Bags of Sodium Bicarbonate (Keep 3 x 50 lb bags ready on site)", 4 ),
                    array( "Bags of Sodium Thiosulfate (Keep 1 x 50 lb bags ready on site)", 4 ),
                    array( "Bags of Soda Ash (Keep 1 x 50 lb bag ready on site)", 4 ),
                    array( "Number of Jugs of Liquid Chlorine (Keep 12 x 1 gal jugs full)", 4 ),
                    array( "Number of Jugs of Liquid Acid (Keep 4 x 1 gal jugs full)", 4 ),
                    array( "List of Pump Room Issues", 0 ),
                    array( "List all issues you noticed during walkthrough. (Leaks, Alarms, etc.)", 7 ),
          );

?>
