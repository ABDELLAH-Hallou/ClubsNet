<?php 
function getStudent($db, $id)
{
    $student = $db->prepare('SELECT * FROM student WHERE id=?');
    $student->bindParam(1,$id);
    $student->execute();
    $student = $student->fetch();
    return $student;
}
function getAllStudent($db)
{
    $student = $db->prepare('SELECT * FROM student order by joining_date desc');
    $student->execute();
    $student = $student->fetchAll();
    return $student;
}
?>
