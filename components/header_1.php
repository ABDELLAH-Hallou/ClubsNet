<?php
include('config/db_connect.php');
include('models/student/getFromStudent.php');
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="description" content="ensam casablanca extracurricular activities, In parallel to technical training and scientific research, We offer a range of cultural, sporting, entrepreneurial, and social
                        activities recognizing the invaluable contribution of the latter in guaranteeing
                        professional integration. favorable to Gadz'arts wanting to be versatile and open to the
                        socio-cultural and socio-economic world.">
    <title>ClubsNet</title>

    <!-- bootstrap 4.6.0 -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <!-- js requirements -->
    <!-- <script src="assets/js/scrolling.js"></script> -->
    <!-- <script src="assets/js/jquery.js"></script> -->
    <!-- icons bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="static/images/favicon.png">
    
    <link href="assets/css/footer.css" rel="stylesheet" type="text/css">
    <style>
        .username {
            position: absolute;
            right: 0;
        }

        @media all and (max-width: 991px) {
            .username {
                position: static;
                right: auto;
            }
        }
    </style>
