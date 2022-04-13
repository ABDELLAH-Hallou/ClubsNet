<?php
function addTofeedback($db, $club_id, $comment, $feedback){
    $feedback_req = $db->prepare("INSERT INTO feedback (club_id, comment, feedback, feedback_date) VALUES(?,?,?,?)");
    $feedback_req->bindParam(1, $club_id);
    $feedback_req->bindParam(2, $comment);
    $feedback_req->bindParam(3, $feedback);
    $datenow = date("Y-m-d H:i:s");
    $feedback_req->bindParam(4, $datenow);
    $feedback_req->execute();
}
?>