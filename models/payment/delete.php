<?php
function deletePaymentOfClub($db, $club_id){
    $payment_req = $db->prepare("DELETE FROM payment WHERE club_id=?");
    $payment_req->bindParam(1, $club_id);
    $payment_req->execute();
}
?>