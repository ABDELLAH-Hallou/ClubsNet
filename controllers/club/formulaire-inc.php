<?php
if (isset($_POST["submit"]))
{

	$id=intval($_POST["id"]);
	$club=$_POST["club"];

	require 'config/db_connect.php';
	require 'formulaire.functions.php';

  if(emptyin($club) !== false)
	{
	header("location:/join-club?error=emptyinputs:".$club);
	exit();
	}

    createdemand($db,$id,$club);

}

else {
	header("location:/join-club:".$club);
}
?>