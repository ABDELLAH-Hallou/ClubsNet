<?php
function deleteLikesOfPost($db, $post_id){
    $like_req = $db->prepare("DELETE FROM `like` WHERE post_id=?");
    $like_req->bindParam(1, $post_id);
    $like_req->execute();
}
?>