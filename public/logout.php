<?php 
   $conn = mysql_connect ("localhost", "root" , "" ) or die (mysql_error());
    mysql_select_db("promessometro", $conn) or die (mysql_error());
?>   
<?php
    
        session_start();

        session_destroy();

        header("Location: principal");

          
?>