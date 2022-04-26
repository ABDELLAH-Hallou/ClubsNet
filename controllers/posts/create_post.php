<?php
$ds = DIRECTORY_SEPARATOR; // DIRECTORY_SEPARATOR == '/'
$base_dir = realpath(dirname(__FILE__)  . $ds . '../..') . $ds; // the path which i want to start
require_once("config{$ds}db_connect.php"); // import the db file
require_once("models{$ds}post{$ds}post.php"); // import the post.php file
// session_start();
$valid = false;
$msg = "";
$request_method = strtoupper($_SERVER['REQUEST_METHOD']);
if ($request_method === 'POST' && isset($_POST['post'])) {
        if(!empty($_POST['text'])){
            $msg = createPost($db, $_POST['title'], $_POST['text'], $club['id'], $student['id'], 'file', $_POST['link']);
            $valid = true;     
    }
    $_SESSION['valid'] = $valid;
    header('Location: /club:' . $club['id']);
    exit;
} elseif ($request_method === 'GET') {
    if (isset($_SESSION['valid'])) {
        $valid = $_SESSION['valid'];
        unset($_SESSION['valid']);
    }
}
?>