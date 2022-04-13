<?php
use Cloudinary\Api\Upload\UploadApi;
if (isset($_POST["submit"]))
{

	$nom=$_POST["nom"];
	$prenom=$_POST["prenom"];
	$email=$_POST["email"];
	$num=$_POST["num"];
	$passw=$_POST["passw"];
	$passwr=$_POST["passwr"];
	$levelstudies=$_POST["niveau"];
	$filier=$_POST["filiere"];
	$gender=$_POST["gender"];
	$about =$_POST["about"];
	$filename = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];
    
	
	if(is_uploaded_file($tempname)){
		$folder = (new UploadApi())->upload($file = $tempname, $options = array('public_id' => 'profile/' .$filename));
    }else{
        $folder = "https://res.cloudinary.com/ddnvgwxtz/image/upload/v1649770014/profile/default_itunka.jpg";
    }
	

	require_once 'config/db_connect.php';
	require_once 'inscription.functions.php';

  if(emptyin($nom,$prenom,$email,$num,$passw,$passwr,$levelstudies,$filier,$gender) !== false)
	{
	header("location:/register?error=emptyinputs");
	exit();
	}
	
	if(invalidEmail($email) !== false)
	{
	header("location:/register?error=invalidemail");
	exit();
	}

	if(passnotlong($passw) !== false)
	{
	header("location:/register?error=Passordisshort");
	exit();
	}
	if(pwdMatch($passw,$passwr) !== false)
	{
	header("location:/register?error=Passordunmatch");
	exit();
	}
	if(uidExist($db,$email) !== false)
	{
	header("location:/register?error=usernameexist");
	exit();
	}

    createuser($db,$nom,$prenom,$email,$num,$passw,$levelstudies,$filier,$gender,$folder['url'],$about);

}

else {
	header("location:/register");
}