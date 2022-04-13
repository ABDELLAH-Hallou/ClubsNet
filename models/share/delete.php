<?php
function deleteShareOfPost($db, $post_id){
    $share_req = $db->prepare("DELETE FROM `share` WHERE post_id=?");
    $share_req->bindParam(1, $post_id);
    $share_req->execute();
}
?>