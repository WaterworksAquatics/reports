<?php

     $location = "Beverly Hills";

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
               array( "Chemical Levels", 2 ),
               array( "pH", 4 ),
               array( "HRR", 4 ),
               array( "Test Kit Readings", 2 ),
               array( "pH", 4 ),
               array( "Free Cl", 4 ),
               array( "Total Cl", 4 ),
               array( "Alkalinity", 4 ),
               array( "Test Reagent Inventory", 1 ),
               array( "DPDxF", 4 ),
               array( "DPDxT", 4 ),
               array( "Phenol Red", 4 ),
               array( "Alkaphot", 4 ),
               array( "Pump Room Walkthrough", 0 ),
               array( "Filter 1 Pressure", 4 ),
               array( "Filter 2  Pressure", 4 ),
               array( "Filter 3 Pressure", 4 ),
               array( "Heater Temperatures", 4 ),
               array( "Heater Set Points", 4 ),
               array( "Chlorine Drum Level", 3 ),
               array( "Acid Carboy Level", 3 ),
               array( "Bags of Sodium Bicarbonate", 4 ),
               array( "Bags of Sodium Thiosulfate", 4 ),
               array( "Bags of Soda Ash", 4 ),
               array( "Number of Jugs of Liquid Chlorine (KEEP FULL)", 4 ),
               array( "Number of Jugs of Liquid Acid (KEEP FULL)", 4 ),
               array( "List of Pump Room Issues", 0 ),
               array( "List all issues you noticed during walkthrough. (Leaks, Weird Noises/Ghosts, Alarms, etc.)", 7 ),
               array( "Facility Walkthrough", 0 ),
               array( "Pool Area", 1 ),
               array( "How does the water look?<br><label>(1 = Caca de toro, 5 = Chingon)</label>", 5 ),
               array( "How does the pool floor look? Vacuum now if needed.<br><label>(1 = Caca de toro, 5 = Chingon)</label>", 5 ),
               array( "How does the pool deck look?<br><label>(1 = Caca de toro, 5 = Chingon)</label>", 5 ),
               array( "Check: All pool cleaning equipment. List anything needed.", 9 ),
               array( "List all issues you noticed from the pool area", 7 ),
               array( "Restrooms", 1 ),
               array( "How do the restrooms look?<br><label>(1 = Caca de toro, 5 = Chingon)</label>", 5 ),
               array( "Check: All sinks, toilets, showers are working. If not, please explain.", 9 ),
               array( "Check: All stainless steel. Polish if needed.", 9 ),
               array( "List all issues you noticed in the restrooms", 7 )
     );

?>
