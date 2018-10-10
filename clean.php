<?php

  $path = 'emp_app_log/';

  if ( $handle = opendir( $path ) ) {

     while ( false !== ( $file = readdir( $handle ) ) ) {

        if ( ( time()-filectime( $path.$file ) ) >= ( 86400 * 14 ) ){

           if (preg_match('/\.txt$/i', $file)) {

              unlink($path.$file);

           }

        }

     }

   }
?>
