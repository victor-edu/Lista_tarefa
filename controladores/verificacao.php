<?php

session_start();

if(!isset($_SESSION["id"]))
{
header("Location:http://localhost:8000/#paralogin");
exit;
}
?>