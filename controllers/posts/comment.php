<?php
include_once('config/db_connect.php');
session_start();
include_once('models/comment/getFromComment.php');
function addCmmnt($db, $comment, $post, $user)
{
    $cmmnt = $db->prepare("INSERT INTO `comment` (comment, creation_date,post_id, student_id) VALUES(?,?,?,?)");
    $cmmnt->bindParam(1, $comment);
    $datenow = date("Y-m-d H:i:s");
    $cmmnt->bindParam(2, $datenow);
    $cmmnt->bindParam(3, $post);
    $cmmnt->bindParam(4, $user);
    $cmmnt->execute();
} 
function deleteCmmnt($db, $user, $post)
{
    $cmmnt = $db->prepare("DELETE FROM `comment` WHERE post_id=? AND student_id=?");
    $cmmnt->bindParam(1, $post);
    $cmmnt->bindParam(2, $user);
    $cmmnt->execute();
}
if (isset($_POST['comment'])) {
    $postid = $_POST['postid'];
    addCmmnt($db, $_POST['comment'], $postid, $_SESSION['id']);
    $row = getPostComments($db, $postid);
    $n = count($row);
    echo $n;
    exit();
}
?>