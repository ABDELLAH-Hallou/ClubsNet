<?php
function deleteJoinOfClub($db, $club_id){
    $join_req = $db->prepare("DELETE FROM `join` WHERE club_id=?");
    $join_req->bindParam(1, $club_id);
    $join_req->execute();
}
?>