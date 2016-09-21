<?php 
    $conn = mysql_connect ("mysql.promessometro.kinghost.net", "promessometro" , "alcino5096" ) or die (mysql_error());
    mysql_select_db("promessometro", $conn) or die (mysql_error());
?>   
<?php
    
        session_start();

        session_destroy();

        header("Location: principal");

          
?>