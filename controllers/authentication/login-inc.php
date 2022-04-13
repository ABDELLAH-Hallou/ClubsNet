<?php
if(isset($_POST["submit"]))
{
    
	$username=$_POST["email"];
	$passw=$_POST["passwd"];

	require_once 'config/db_connect.php';
	require_once 'inscription.functions.php';

    if(emptysi($username,$passw) !== false)
	{
	header("location:/login?error=emptyinputs");
	exit();
	}
	
    loginuser($db,$username,$passw);

}
else
{
	header("location:/login?title2=Se connecter");
}
?>
