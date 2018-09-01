<?php
require_once("constants.php");

$connection= mysqli_connect(SERVER,USER,PASSWORD,DB);
if(!$connection)
{
    echo "Soe error in connecting " .mysqli_error();
}
?>