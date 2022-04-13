<?php 
$ds = DIRECTORY_SEPARATOR; // DIRECTORY_SEPARATOR == '/'
$base_dir = realpath(dirname(__FILE__)  . $ds . '../..') . $ds; // the path which i want to start
require_once("config{$ds}db_connect.php"); // import the db file
require_once("models{$ds}contact{$ds}post.php"); // import the post.php file
// session_start();
$valid = false;
$msg="";
$request_method = strtoupper($_SERVER['REQUEST_METHOD']);
if ($request_method === 'POST') {
        if(!empty($_POST['message'])){
            addToContact($db, $_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message']);
            $valid = true;
        }else{
            $msg .= 'your email is not sent';
        }
        $_SESSION['valid'] = $valid;
        $_SESSION['msg'] = $msg;
        header('Location: /contact', true, 303);
        exit;
}elseif($request_method === 'GET'){
    if (isset($_SESSION['valid'])) {
        $valid = $_SESSION['valid'];
        unset($_SESSION['valid']);
    }
    if (isset($_SESSION['msg'])) {
        $msg = $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
}
function function_alert($message) {
    echo "<script>alert('$message');</script>";
}
if($valid){
    function_alert("your email is sent");
}
if($msg!="")
{
    function_alert($msg);
}
?>
