<?php

define('SERVIDOR','localhost:33065');
define('DATABASE','proyecto');
define('USER','root');
define('PASSWORD','1506');

$db=mysqli_connect(SERVIDOR,USER,PASSWORD,DATABASE);
if ($db->connect_errno) 
    {
        echo "Fall� la conexi�n ".$db->connect_error."<br/>";
    }
?>