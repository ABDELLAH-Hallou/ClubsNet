<?php
function addToContact($db, $name, $email, $subject, $message){
    $contact = $db->prepare("INSERT INTO contact (usename, email, subject, creation_date, message) VALUES(?,?,?,?,?)");
    $contact->bindParam(1, $name);
    $contact->bindParam(2, $email);
    $contact->bindParam(3, $subject);
    $datenow = date("Y-m-d H:i:s");
    $contact->bindParam(4, $datenow);
    $contact->bindParam(5, $message);
    $contact->execute();
}
?>