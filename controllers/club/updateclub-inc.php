<?php
use Cloudinary\Api\Upload\UploadApi;
if (isset($_POST["submit"]))
{

	$nom=$_POST["nom"];
	$tags=$_POST["tags"];
    $clubID=$_POST["clubID"];
	$domaine=$_POST["domaine"];
	$president=$_POST["president"];
	$price=$_POST["price"];
	$clubname=$_POST["clubname"];
	$insta=$_POST["insta"];
	$link=$_POST["link"];
	$wtsp=$_POST["wtsp"];
	$twttr=$_POST["twttr"];
	$description=$_POST["description"];
	$linkOfImage = $_POST["linkOfImage"];

	$filename = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];
    
	require_once 'config/db_connect.php';
	require_once 'club.functions.php';
	require_once 'models/club/getFromClub.php';
	
	$club= getClub($db,$clubID);

	if(is_uploaded_file($tempname)){
		$data = (new UploadApi())->upload($file = $tempname, $options = array('public_id' => 'clubs/' .$filename));
		$folder = $data['url'];
	}else{
        $folder = $club['image'];
    }

	

	if(emptyinp($nom,$domaine,$price,$description) !== false)
	{
		header("location:/edit-club?error=emptyinputs");
		exit();
	}
	updateclub($db,$nom,$domaine,$president,$price,$clubname,$wtsp,$insta,$link,$twttr,$description,$clubID,$folder,$tags,$tempname);
	
}
else 
{
	header("location:/edit-club");
}