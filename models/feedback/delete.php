<?php
function deleteFeedbackOfClub($db, $club_id){
    $feedback_req = $db->prepare("DELETE FROM feedback WHERE club_id=?");
    $feedback_req->bindParam(1, $club_id);
    $feedback_req->execute();
}
?>