<?php

//______________________CHECK EMPTY INPUTS_______________________________

function emptyin($nom,$prenom,$email,$num,$passw,$passwr,$levelstudies,$filier,$gender)
{
	$result=true;
	if(empty($nom) || empty($prenom) || empty($email)|| empty($num)||
empty($passw) || empty($passwr) || empty($levelstudies)|| empty($filier)|| empty($gender))
	{
		$result=true;
	}

	else {
        $result=false;
	}
return $result;
}

//______________________CHECK FOR VALID EMAILS_______________________________

function invalidEmail($email) 
{
	$result=true;
	
	if(!filter_var($email,FILTER_VALIDATE_EMAIL))
	{
         $result=true;
	}
	else {
        $result=false;
	}
return $result;
}

//______________________VERIFY IF PASSWORDs MATCHING_______________________________

function pwdMatch($passw,$passwr)
{
	$result=true;
	
	if($passw !== $passwr)
	{
         $result=true;
	}
	else {
        $result=false;
	}
return $result;
}

//______________________PASSWORD LENGHT_______________________________

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

//______________________CHECK IF EMAIL NOT EXIST ALREADY_______________________________

function uidExist($db,$email)
{
	$student = $db->prepare('SELECT * FROM student WHERE email=?');
	$student->bindParam(1,$email);
	$student->execute();
	$student = $student->fetch();
	if($student)
	{
		return $student;
	}else{
		$result=false;
		return $result;
	}

}

//______________________INSERT USER TO DB_______________________________

function createuser($db,$nom,$prenom,$email,$num,$passw,$levelstudies,$filier,$gender,$folder,$about)
{
	$hashedpwd=password_hash($passw,PASSWORD_DEFAULT);
	$student = $db->prepare("INSERT INTO student (`firstname`, `lastname`, `tele`, `email`, `password`, `level`, `major`, `gender`,image, about,`joining_date`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
	$student->bindParam(1, $nom);
	$student->bindParam(2, $prenom);
	$student->bindParam(3, $num);
	$student->bindParam(4, $email);
	$student->bindParam(5, $hashedpwd);
	$student->bindParam(6, $levelstudies);
	$student->bindParam(7, $filier);
	$student->bindParam(8, $gender);
	$student->bindParam(9, $folder);
	$student->bindParam(10, $about);
	$datenow = date("Y-m-d H:i:s");
    $student->bindParam(11, $datenow);
	$student->execute();
	
	header("location:/login");
	exit();
}

//______________________LOG IN_______________________________

function emptysi($email,$passw)
{
	$result=true;
	if(empty($email)|| empty($passw) )
	{
		$result=true;
	}

	else {
        $result=false;
	}
return $result;
}

function loginuser($db,$email,$passw)
{
	$uidexiste=uidExist($db,$email);

	if ($uidexiste === false) {
	header("location:/login?error=wronginfo");
	exit();
	}

	$pwdHashed=$uidexiste["password"];
	$check_pwd=password_verify($passw,$pwdHashed);

	if ($check_pwd === false) {
		header("location:/login?error=wronginfo");
	exit();
	}
	else if ($check_pwd === true) {
		session_start();
		$_SESSION["id"]=$uidexiste["id"];
		$_SESSION["firstname"]=$uidexiste["firstname"];
		$_SESSION["lastname"]=$uidexiste["lastname"];
		$_SESSION["email"]=$uidexiste["email"];
        // header("location:../../public/index.php?userid=".$_SESSION["id"]);
        header("location: /");
	    exit();
	}
}

?>