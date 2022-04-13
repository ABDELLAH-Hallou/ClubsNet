<?php 
$ds = DIRECTORY_SEPARATOR; // DIRECTORY_SEPARATOR == '/'
$base_dir = realpath(dirname(__FILE__)  . $ds . '../..') . $ds; // the path which i want to start
require_once("config{$ds}db_connect.php"); // import the db file
require_once("models{$ds}feedback{$ds}post.php"); // import the post.php file
$valid = false;
$request_method = strtoupper($_SERVER['REQUEST_METHOD']);
if ($request_method === 'POST') {
        if(!empty($_POST['feedback'])){
            addTofeedback($db, $club['id'], $_POST['comment'], $_POST['feedback']);
            $valid = true;
        }
        $_SESSION['valid'] = $valid;
        header('Location: /club:'.$club['id'], true, 303);
        exit;
}elseif($request_method === 'GET'){
    if (isset($_SESSION['valid'])) {
        $valid = $_SESSION['valid'];
        unset($_SESSION['valid']);
    }
}
?>
