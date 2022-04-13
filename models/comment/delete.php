<?php
function deleteCommentsOfPost($db, $post_id){
    $comment_req = $db->prepare("DELETE FROM `comment` WHERE post_id=?");
    $comment_req->bindParam(1, $post_id);
    $comment_req->execute();
}
?>