<?php 
function getJoinedClubs($db, $student_id)
{
    $club = $db->prepare('SELECT * FROM `join` WHERE student_id=? order by creation_date desc');
    $club->bindParam(1,$student_id);
    $club->execute();
    $club = $club->fetchAll();
    return $club;
}
function getJoinedStudents($db, $club_id)
{
    $club = $db->prepare('SELECT * FROM `join` WHERE club_id=?');
    $club->bindParam(1,$club_id);
    $club->execute();
    $club = $club->fetchAll();
    return $club;
}
?>
