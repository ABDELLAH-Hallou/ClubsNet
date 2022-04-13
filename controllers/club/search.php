<?php
$searched_array=array();
$mssg='';
$request_method = strtoupper($_SERVER['REQUEST_METHOD']);
$valid = false;
if ($request_method === 'POST' && isset($_POST['GO'])) {
    if (!empty($_POST['searched'])) {
        $search = $db->prepare("SELECT id, name, image, description FROM club WHERE name LIKE :s OR prix LIKE :s OR domain LIKE :s");
        $search->bindValue(':s', '%' . $_POST['searched'] . '%');
        $search->execute();
        $searched_array = $search->fetchAll();
        if (count($searched_array) == 0) {
            $mssg .= 'SORRY ... WE DID NOT FIND ANY CLUBS THAT MATCH '.$_POST['searched'];
        }
        $valid = true;
    }
}
?>