<?php
use Cloudinary\Api\Upload\UploadApi;
function createPost($db, $title, $text, $club_id, $student_id, $file, $link){
    $post = $db->prepare("INSERT INTO post (title, post, creation_date, media, club_id, student_id) VALUES(?,?,?,?,?,?)");
    $post->bindParam(1, $title);
    $post->bindParam(2, $text);
    $datenow = date("Y-m-d H:i:s");
    $post->bindParam(3, $datenow);

    $filename = $_FILES[$file]["name"];
    $tempname = $_FILES[$file]["tmp_name"];

    if(is_uploaded_file($tempname) && (!empty($link))){
        $uploadRes = (new UploadApi())->upload($file = $tempname, $options = array('public_id' => 'post/' .$filename));
        $folder = $uploadRes['url'];
        $arr_media = array('link'=>$link,'media'=>$folder);
        $media = implode("|-@-|", $arr_media);
        $post->bindParam(4, $media);
    }elseif(is_uploaded_file($tempname)){
        $uploadRes = (new UploadApi())->upload($file = $tempname, $options = array('public_id' => 'post/' .$filename));
        $folder = $uploadRes['url'];
        $post->bindParam(4, $folder);
    }else{
        $post->bindParam(4, $link);
    }
    
    $post->bindParam(5, $club_id);
    $post->bindParam(6, $student_id);
    $post->execute();

}
?>