<?php
include_once('config/db_connect.php');
session_start();
include_once('models/like/getFromLike.php');
function addLike($db, $post, $user)
{
    $like = $db->prepare("INSERT INTO `like` (post_id, student_id) VALUES(?,?)");
    $like->bindParam(1, $post);
    $like->bindParam(2, $user);
    $like->execute();
} 
function deleteLike($db, $user, $post)
{
    $like = $db->prepare("DELETE FROM `like` WHERE post_id=? AND student_id=?");
    $like->bindParam(1, $post);
    $like->bindParam(2, $user);
    $like->execute();
}
if (isset($_POST['liked'])) {
    $postid = $_POST['postid'];
    addLike($db, $postid, $_SESSION['id']);
    $row = getPostlikes($db, $postid);
    $n = count($row);
    echo $n;
    exit();
}
if (isset($_POST['unliked'])) {
    $postid = $_POST['postid'];
    deleteLike($db,  $_SESSION['id'], $postid);
    $row = getPostlikes($db, $postid);
    $n = count($row);
    echo $n;
    exit();
}
?>