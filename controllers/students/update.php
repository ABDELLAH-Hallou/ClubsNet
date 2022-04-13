<?php
session_start();
use Cloudinary\Api\Upload\UploadApi;
if (isset($_POST["submit"]))
{
    $id = $_SESSION['id'];
    $nom=$_POST["lastname"];
	$prenom=$_POST["firstname"];
	$email=$_POST["email"];
	$tele=$_POST["tele"];
	$gender=$_POST["gender"];
	$address=$_POST["address"];
	$password=$_POST["password"];
	$about =$_POST["about"];
	$filename = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];
	try{
		require_once 'config/db_connect.php';
		require_once 'student.functions.php';
		require_once 'models/student/getFromStudent.php';
	}catch(Exception $e){
		echo $e->getMessage();
	}
	
	$std= getStudent($db,$id);
	if(is_uploaded_file($tempname)){
		$uploadedFile = (new UploadApi())->upload($file = $tempname, $options = array('public_id' => 'profile/' .$filename));
		$folder = $uploadedFile['url'];
	}else{
        $folder = $std['image'];
    }

	

	if(emptyin($nom,$prenom,$email,$gender) !== false)
	{
		header("location:/profile?error=emptyinputs");
		exit();
	}
	if(passexist($password) !== false){
		if(passnotlong($password) !== false)
		{
			header("location:/profile?error=Passordisshort");
			exit();
		}
		updatestd($db,$id,$nom,$prenom,$email,$tele,$gender,$password,$address,$folder,$about);
	}else{
		updatestdnopass($db,$id,$nom,$prenom,$email,$tele,$gender,$address,$folder['url'],$about);
	}
	
	
}else{
    header("location:/profile");
}
?>