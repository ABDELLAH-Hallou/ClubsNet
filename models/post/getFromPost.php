<?php 
function getAllClubPosts($db, $club_id)
{
    $posts = $db->prepare('SELECT * FROM post WHERE club_id=? order by creation_date DESC');
    $posts->bindParam(1,$club_id);
    $posts->execute();
    $posts = $posts->fetchAll();
    return $posts;
}
function getAllPosts($db)
{
    $posts = $db->prepare('SELECT * FROM post order by creation_date DESC');
    $posts->execute();
    $posts = $posts->fetchAll();
    return $posts;
}
?>
