<?php
use Cloudinary\Api\Upload\UploadApi;
if (isset($_POST["submit"]))
{

	$nom=$_POST["nom"];
	$domaine=$_POST["domaine"];
	$tags=$_POST["tags"];
	
	$president=$_POST["president"];
	$price=$_POST["price"];
	$clubname=$_POST["clubname"];
	$insta=$_POST["insta"];
	$link=$_POST["link"];
	$wtsp=$_POST["wtsp"];
	$twttr=$_POST["twttr"];
	$message=$_POST["message"];

	$filename = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];
    
	if(is_uploaded_file($tempname)){
		$folder = (new UploadApi())->upload($file = $tempname, $options = array('public_id' => 'clubs/' .$filename));
    }else{
        header("location:/new-club?error=noimage");
		exit();
    }

	require_once 'config/db_connect.php';
	require_once 'club.functions.php';

	if(emptyinp($nom,$domaine,$price,$message) !== false)
	{
		header("location:/new-club?error=emptyinputs");
		exit();
	}
	addclub($db,$nom,$domaine,$president,$price,$clubname,$wtsp,$insta,$link,$twttr,$message,$folder['url'],$tags,$tempname);
	
}
else 
{
	header("location:/new-club");
}