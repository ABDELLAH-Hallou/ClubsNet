<?php

if (isset($_POST["delete"]))
{
    $id=$_POST["club"];
	require_once 'config/db_connect.php';
	require_once 'club.functions.php';
	deleteclub($db,$id);
	
}
else 
{
	header("location:/");
}