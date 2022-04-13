<?php 
function getPostlikes($db, $post_id)
{
    $likes = $db->prepare('SELECT * FROM `like` WHERE post_id=?');
    $likes->bindParam(1,$post_id);
    $likes->execute();
    $likes = $likes->fetchAll();
    return $likes;
}
function getPostlikesFromUser($db, $post_id,$user_id)
{
    $likes = $db->prepare('SELECT * FROM `like` WHERE post_id=? and student_id=?');
    $likes->bindParam(1,$post_id);
    $likes->bindParam(2,$user_id);
    $likes->execute();
    $likes = $likes->fetchAll();
    return $likes;
}
?>