<?php
//______________________CHECK EMPTY INPUTS_______________________________

function emptyin($nom,$prenom,$email,$gender)
{
	$result=true;
	if(empty($nom) || empty($prenom) || empty($email)|| empty($gender))
	{
		$result=true;
	}

	else {
        $result=false;
	}
return $result;
}
function passexist($passw)
{
	$result=true;
	if (strlen($passw)==0) {
		$result=false;
	}
	else {
        $result=true;
	}
return $result;
}
function passnotlong($passw)
{
	$result=true;
	if (strlen($passw)<=8) {
		$result=true;
	}
	else {
        $result=false;
	}
return $result;
}
function updatestd($db,$id,$nom,$prenom,$email,$tele,$gender,$password,$address,$folder,$about){
	$hashedpwd=password_hash($password,PASSWORD_DEFAULT);
    $student = $db->prepare("UPDATE student set lastname = ?, firstname = ?, tele=?, email=?, password=?, address=?, gender=?,image=?,about=?  where id = ?");
	$student->bindParam(1, $nom);
	$student->bindParam(2, $prenom);
	$student->bindParam(3, $tele);
	$student->bindParam(4, $email);
	$student->bindParam(5, $hashedpwd);
	$student->bindParam(6, $address);
	$student->bindParam(7, $gender);
	$student->bindParam(8, $folder);
	$student->bindParam(9, $about);
	$student->bindParam(10, $id);
	$student->execute();
	header("location:/profile");
	exit();
}
function updatestdnopass($db,$id,$nom,$prenom,$email,$tele,$gender,$address,$folder,$about){
    $student = $db->prepare("UPDATE student set lastname = ?, firstname = ?, tele=?, email=?, address=?, gender=?,image=?,about=?  where id = ?");
	$student->bindParam(1, $nom);
	$student->bindParam(2, $prenom);
	$student->bindParam(3, $tele);
	$student->bindParam(4, $email);
	$student->bindParam(5, $address);
	$student->bindParam(6, $gender);
	$student->bindParam(7, $folder);
	$student->bindParam(8, $about);
	$student->bindParam(9, $id);
	$student->execute();
	header("location:/profile");
	exit();
}
?>