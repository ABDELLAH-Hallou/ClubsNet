<?php 
function getPostComments($db, $post_id)
{
    $comments = $db->prepare('SELECT * FROM comment WHERE post_id=?');
    $comments->bindParam(1,$post_id);
    $comments->execute();
    $comments = $comments->fetchAll();
    return $comments;
}
?>