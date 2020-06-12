<?php

define('SERVIDOR','localhost');
define('DATABASE','streaming');
define('USER','root');
define('PASSWORD','eresmiaangel9');

$db=mysqli_connect(SERVIDOR,USER,PASSWORD,DATABASE);
if ($db->connect_errno) 
    {
        echo "Fall� la conexi�n ".$db->connect_error."<br/>";
    }
?>