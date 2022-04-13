<?php
function deletePostsOfClub($db, $club_id){
    $post_del = $db->prepare("DELETE FROM `post` WHERE club_id=?");
    $post_del->bindParam(1, $club_id);
    $post_del->execute();
}
?>