<?php
//______________________EMPTY INPUTS_______________________________

function emptyinp($nom,$domaine,$price,$message)
{ 
	$result=true;
	if(empty($nom) || empty($domaine) ||
		empty($price) || empty($message))
	{
		$result=true;
	}

	else {
		$result=false;
	}
	return $result;
}

//______________________ ADD CLUB _______________________________

function addclub($db,$nom,$domaine,$president,$price,$clubname,$wtsp,$insta,$link,$twttr,$message,$folder,$tags,$tempname)
{
	$members=0;
	$club = $db->prepare("INSERT INTO club (name,image,domain,members,facebook,whatsapp,instagram,linkedin,twitter,prix,tags,description,president,creation_date) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $club->bindParam(1, $nom);
    $club->bindParam(2, $folder);
    $club->bindParam(3, $domaine);
    $club->bindParam(4, $members);
    $club->bindParam(5, $clubname);
    $club->bindParam(6, $wtsp);
    $club->bindParam(7, $insta);
    $club->bindParam(8, $link);
    $club->bindParam(9, $twttr);
    $club->bindParam(10, $price);
    $club->bindParam(11, $tags);
    $club->bindParam(12, $message);
    $club->bindParam(13, $president);
    $datenow = date("Y-m-d H:i:s");
    $club->bindParam(14, $datenow);
    $club->execute();
	$club = $club->fetch();
	require_once 'formulaire.functions.php';
	createdemand($db,$president,$db->lastInsertId());
	exit();
	
}
function updateclub($db,$nom,$domaine,$president,$price,$clubname,$wtsp,$insta,$link,$twttr,$description,$clubID,$folder,$tags,$tempname)
{
	$club = $db->prepare("UPDATE club SET name=?,image=?,domain=?,facebook=?,whatsapp=?,instagram=?,linkedin=?,twitter=?,prix=?,tags=?,description=?,president=? WHERE id=?");
	$club->bindParam(1, $nom);
	$club->bindParam(2, $folder);
	$club->bindParam(3, $domaine);
	$club->bindParam(4, $clubname);
	$club->bindParam(5, $wtsp);
	$club->bindParam(6, $insta);
	$club->bindParam(7, $link);
	$club->bindParam(8, $twttr);
	$club->bindParam(9, $price);
	$club->bindParam(10, $tags);
	$club->bindParam(11, $description);
	$club->bindParam(12, $president);
	$club->bindParam(13, $clubID);
	$club->execute();
	move_uploaded_file($tempname, $folder);
	$club = $club->fetch();
	header("location:/club:".$clubID);
	exit();
}
function deleteclub($db,$id)
{
	require_once("models/feedback/delete.php");
	require_once("models/payment/delete.php");
	require_once("models/join/delete.php");
	require_once("models/post/getFromPost.php");
	require_once("models/post/delete.php");
	require_once("models/like/delete.php");
	require_once("models/comment/delete.php");
	require_once("models/share/delete.php");
	deleteFeedbackOfClub($db, $id);
	deletePaymentOfClub($db, $id);
	deleteJoinOfClub($db, $id);
	$posts = getAllClubPosts($db, $id);
	foreach($posts as $post){
		deleteLikesOfPost($db, $post['id']);
		deleteCommentsOfPost($db, $post['id']);
		deleteShareOfPost($db, $post['id']);
	}
	deletePostsOfClub($db, $id);
	$club = $db->prepare("DELETE FROM club WHERE id=?");
	$club->bindParam(1, $id);
	$club->execute();
	header("location:/");
	exit();
}
?>

