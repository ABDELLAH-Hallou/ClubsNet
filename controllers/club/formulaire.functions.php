<?php
//______________________CHECK EMPTY INPUTS_______________________________

function emptyin($club)
{
	$result=true;
	if(empty($club))
	{
		$result=true;
	}

	else {
        $result=false;
	}
return $result;
}

//______________________INSERT USER TO DB_______________________________

function createdemand($db,$id,$club)
{
	$getclb = $db->prepare("select prix,members from `club` where id = ?");
	$getclb->bindParam(1, $club);
	$getclb->execute();
	$getclb = $getclb->fetch();
	$prix = $getclb['prix'];
	$members = $getclb['members'];
	$members++;
	$pay = $db->prepare("INSERT INTO `payment` (club_id,type,prix,student_id, payment_date) VALUES(?,?,?,?,?)");
    $pay->bindParam(1, $club);
	$type = "paypal";
    $pay->bindParam(2, $type);
    $pay->bindParam(3, $prix);
    $pay->bindParam(4, $id);
    $datenow = date("Y-m-d H:i:s");
    $pay->bindParam(5, $datenow);
    $pay->execute();
	if ($pay) {
		$join = $db->prepare("INSERT INTO `join` (student_id, club_id, creation_date) VALUES(?,?,?)");
		$join->bindParam(1, $id);
		$join->bindParam(2, $club);
		// $datenow = date("Y-m-d H:i:s");
		$join->bindParam(3, $datenow);
		$join->execute();
		if ($join) {
			$clubup = $db->prepare("UPDATE club SET members=? WHERE id=?");
			$clubup->bindParam(1, $members);
			$clubup->bindParam(2, $club);
			$clubup->execute();
			header("location:/profile");

		}

	}
	exit();
}


?>