<?php 
function getAllClubs($db)
{
    $clubs = $db->prepare('SELECT * FROM club ORDER BY members desc');
    $clubs->execute();
    $clubs_array = $clubs->fetchAll();
    return $clubs_array;
}
function getClub($db, $id)
{
    $club = $db->prepare('SELECT * FROM club WHERE id=?');
    $club->bindParam(1,$id);
    $club->execute();
    $club = $club->fetch();
    return $club;
}
function getAllClubsByName($db)
{
    $clubs = $db->prepare('SELECT * FROM club ORDER BY name');
    $clubs->execute();
    $clubs_array = $clubs->fetchAll();
    return $clubs_array;
}
?>
